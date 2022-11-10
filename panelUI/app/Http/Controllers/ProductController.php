<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // To return all the Products
    public function show()
    {
        $product = Product::latest();

        return view('pages.products')->with([
            'products' => $product->paginate(10)
        ])->with('successMessage', "Product Successfully Created.");
    }

    public function create()
    {
        return view('productcrud.create');
    }

    // To create a Product
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:5',
            'description' => 'required|min:10',
        ]);

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'amount' => $request->amount
        ]);

        if ($product) {
            return redirect('/dashboard/products')->with('successMessage', "Product Successfully Created.");
        }
        else {
            return redirect('/dashboard/products')->with('errorMessage', "Some Error Occurred.");
        }
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('productcrud.edit', [
            'product' => $product
        ]);
    }

    // To update a Product's detail
    public function update(Request $request, Product $product)
    {
        $validate = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'amount' => 'required'
        ]);

        $poidocument = $request->file('productImg');

        if (!empty($poidocument)) {
            $poiImg = time() . '_1.' . $poidocument->getClientOriginalExtension();
            $path = public_path() . '/admin/images';
            $poidocument->move($path, $poiImg);
        } else {
            $poiImg = $product->productImg;
        }

        $updated = $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'amount' => $request->amount,
            'productImg' => $poiImg,
        ]);

        if ($updated) {
            return redirect('/dashboard/products')->with('successMessage', "Product Successfully Updated.");
        } else {
            return redirect('/dashboard/products')->with('errorMessage', "Some Error Occurred.");
        }

    }

    // To delete a Product
    public function delete(Product $product)
    {
        $deleted = $product->delete();

        if ($deleted) {
            return redirect('/dashboard/products')->with('successMessage', "Product Successfully Deleted.");
        } else {
            return redirect('/dashboard/products')->with('errorMessage', "Some Error Occurred.");
        }
    }
}
