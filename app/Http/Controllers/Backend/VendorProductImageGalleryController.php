<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\VendorProductImageGalleryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImageGallery;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class VendorProductImageGalleryController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, VendorProductImageGalleryDataTable $dataTable)
    {
        $product = Product::findOrFail($request->product);

        return $dataTable->render("vendor.product.image-gallery.index", compact("product"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'images.*' => ['required', 'image', 'max:2048'],
        ]);

        $imagePaths = $this->uploadMultiImage($request, 'images', 'uploads');

        foreach ($imagePaths as $path) {
            $productImageGallery = new ProductImageGallery();

            $productImageGallery->images = $path;
            $productImageGallery->product_id = $request->product_id;

            $productImageGallery->save();
        }

        toastr('Uploaded Successfully!', 'success');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $image = ProductImageGallery::findOrFail($id);

        $this->deleteImage($image->images);

        $image->delete();

        return response([
            'status' => 'success',
            'message' => 'Image Deleted Successfullty!'
        ]);
    }
}
