<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function addProduct()
    {
        return view('add-product');
    }

    public function storeProduct(Request $request)
    {
        $name = $request->name;
        $productcode = $request->productcode;
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);

        $product = new Product();
        $product->name = $name;
        $product->productcode = $productcode;
        $product->profileimage = $imageName;
        $product->save();
        return back()->with('product_added','Товар добавлен');
    }

    public function products()
    {
        $products = Product::all();
        return view('all-products',compact('products'));
    }

    public function editProduct($id)
    {
        $product = Product::find($id);
        return view('edit-product',compact('product'));
    }

    public function updateProduct(Request $request)
    {
        $name = $request->name;
        $productcode = $request->productcode;
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);
        
        $product = Product::find($request->id);
        $product->name = $name;
        $product->productcode = $productcode;
        $product->profileimage = $imageName;
        $product->save();
        return back()->with('product_updated','Товар изменён');
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        unlink(public_path('images').'/'.$product->profileimage);
        $product->delete();
        return back()->with('product_deleted','Товар успешно удалён');
    }
}
