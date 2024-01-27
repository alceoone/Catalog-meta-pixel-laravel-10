<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImageProduct;
use App\Models\Product;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductImageController extends Controller
{
    public function storeImageProduct(Request $request)
    {

        $request->validate([
            'typeFile' => 'required',
            'idProduct' => 'required',
            'featured_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->typeFile == 'local') {
            if ($request->hasFile('featured_images')) {
                foreach ($request->file('featured_images') as $index => $image) {
                    $originalName = $image->getClientOriginalName();

                    $filenameWithoutExtension = pathinfo($originalName, PATHINFO_FILENAME);

                    $uuid = Str::uuid();

                    $shortUuid = substr($uuid, 0, 8);

                    $currentDate = now()->format('Ymd');

                    $uniq = '-' . $shortUuid . $currentDate;

                    $imageName = Str::slug($filenameWithoutExtension);

                    $fileLocation = 'uploads/product';

                    $nameInLocation = $imageName . $uniq . '.' . $image->getClientOriginalExtension();

                    $image->storeAs($fileLocation, $nameInLocation, 'public');

                    ImageProduct::create([
                        'product_id' => $request->idProduct,
                        'image_name' => $imageName,
                        'type' => $request->typeFile,
                        'image_path' => Storage::url($fileLocation . '/' . $nameInLocation),
                        'number_list' => ImageProduct::where('product_id', $request->idProduct)->max('number_list') + 1,
                    ]);
                }
                return redirect()->route('admin.product.edit', $request->idProduct);
            }
        } else {
            ImageProduct::create([
                'product_id' => $request->idProduct,
                'image_name' => $request->title,
                'type' => $request->typeFile,
                'image_path' => $request->url,
                'number_list' => ImageProduct::where('product_id', $request->idProduct)->max('number_list') + 1,
            ]);

            return redirect()->route('admin.product.edit', $request->idProduct);
        }
    }

    public function deleteImage($id){
        $imageProduct = ImageProduct::find($id);

        // Check if the image exists
        if (!$imageProduct) {
            return redirect()->back()->with('error', 'Image not found.');
        }

        // Delete the image file from storage
        $imagePath = public_path($imageProduct->image_path);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        // Delete the ImageProduct record
        $imageProduct->delete();

        return redirect()->back()->with('success', 'Image deleted successfully.');
  
    }

}
