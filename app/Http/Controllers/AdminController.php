<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Traffic;

class AdminController extends Controller
{
    public function home()
    {
        $data['title']          = 'Home';
        $data['allVisitors']    = Traffic::count();

        return view('pages.home', $data);
    }

    public function category()
    {
        $data['title']  = 'Category';

        return view('pages.category.index', $data);
    }

    public function createCategory()
    {
        $data['title']  = 'Input Category';

        return view('pages.category.create', $data);
    }

    public function saveCategory(Request $request)
    {
        $isCreated = Category::create($request->except('_token'));

        if(!$isCreated) return redirect()->back()->with([
            'success'   => false,
            'message'   => 'Error, something went wrong!'
        ]);

        return redirect('/category')->with([
            'success'   => true,
            'message'   => 'Success, Category was created.'
        ]);
        
    }

    public function product()
    {
        $data['title']  = 'Product';

        return view('pages.product.index', $data);
    }

    public function createProduct()
    {
        $data['title']  = 'Input Product';

        return view('pages.product.create', $data);
    }

    public function editProduct($id)
    {
        $data['title']      = 'Edit Product';
        $data['product']    = Product::find($id);
        $data['categories'] = Category::all();

        return view('pages.product.edit', $data);
    }

    public function updateProduct(Request $request)
    {
        $data       = [];
        $product    = Product::find($request->id);
        $price      = (int)$request->price;
        $dstPath        = 'assets/product/';
        $dstPathPreview = 'assets/product/preview/';

        $previews   = $request->file('image_previews');
        $image      = $request->file('image_temp');
        $imageThumb = $request->file('image_thumb_temp');

        if($previews) {
            foreach($previews as $i => $preview) {
                $previewName = $request->title . '-' . \Carbon\Carbon::now()->format('d-m-Y') . '-' . \Str::random(8) . '.' . $preview->getClientOriginalExtension();
                $preview->move($dstPathPreview, $previewName);

                $data['image_detail_' . $i] = $previewName;
            }

            $request->request->add($data);
        }

        if($image || $imageThumb) {
            $imageName      = $request->title . '-' . \Carbon\Carbon::now()->format('d-m-Y') . '-' . \Str::random(8) . '.' . $image->getClientOriginalExtension();
            $imageThumbName = $request->title . '-thumbnail-' . \Carbon\Carbon::now()->format('d-m-Y') . '-' . \Str::random(8) . '.' . $imageThumb->getClientOriginalExtension();

            $image->move($dstPath, $imageName);
            $imageThumb->move($dstPath, $imageThumbName);

            $request->request->add([
                'image'         => $imageName,
                'image_thumb'   => $imageThumbName
            ]);
        }

        $request->request->remove('price');
        $request->request->add([
            'price' => $price
        ]);

        $isUpdated = Product::where('id', $product->id)->update($request->except('_token', 'image_previews', 'image_temp', 'image_thumb_temp'));

        if(!$isUpdated) return redirect()->back()->with([
            'success'   => false,
            'message'   => 'Error, something went wrong!'
        ]);

        return redirect('/product')->with([
            'success'   => true,
            'message'   => 'Success, Product was created.'
        ]);
        
    }

    public function saveProduct(Request $request)
    {
        $data = [];
        $price = (int)$request->price;
        $dstPath        = 'assets/product/';
        $dstPathPreview = 'assets/product/preview/';

        $previews   = $request->file('image_previews');
        $image      = $request->file('image_temp');
        $imageThumb = $request->file('image_thumb_temp');

        if($previews) {
            foreach($previews as $i => $preview) {
                $previewName = $request->title . '-' . \Carbon\Carbon::now()->format('d-m-Y') . '-' . \Str::random(8) . '.' . $preview->getClientOriginalExtension();
                $preview->move($dstPathPreview, $previewName);

                $data['image_detail_' . $i] = $previewName;
            }
        }

        $imageName      = $request->title . '-' . \Carbon\Carbon::now()->format('d-m-Y') . '-' . \Str::random(8) . '.' . $image->getClientOriginalExtension();
        $imageThumbName = $request->title . '-thumbnail-' . \Carbon\Carbon::now()->format('d-m-Y') . '-' . \Str::random(8) . '.' . $imageThumb->getClientOriginalExtension();

        $image->move($dstPath, $imageName);
        $imageThumb->move($dstPath, $imageThumbName);

        $request->request->remove('price');
        $request->request->add([
            'price'         => $price,
            'image'         => '/assets/product/'.$imageName,
            'image_thumb'   => '/assets/product/preview/'.$imageThumbName
        ]);
        $request->request->add($data);

        $isCreated = Product::create($request->except('_token', 'image_previews', 'image_temp', 'image_thumb_temp'));

        if(!$isCreated) return redirect()->back()->with([
            'success'   => false,
            'message'   => 'Error, something went wrong!'
        ]);

        return redirect('/product')->with([
            'success'   => true,
            'message'   => 'Success, Product was created.'
        ]);
        
    }

    public function deleteProduct($id) 
    {
        $product    = Product::where('id', $id)->delete();

        if($product) return redirect('/product')->with([
            'success'   => true,
            'message'   => 'Product was deleted.'
        ]);

        return redirect('/product')->with([
            'success'   => true,
            'message'   => 'Error, something went wrong!'
        ]);
    }
}
