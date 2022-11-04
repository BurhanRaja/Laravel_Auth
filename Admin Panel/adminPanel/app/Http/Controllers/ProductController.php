<?php

namespace App\Http\Controllers;

use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // To return all the Products
    public function show()
    {
        $product = Product::all();
        $monthDate[] = [];
        foreach ($product as $key => $value) {
            $month = $value->created_at->format('M');
            $monthDate[$key] = $month;
        }

        // $monthDate;

        $products = Product::select('id', 'created_at')
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->created_at)->format('m'); // grouping by months
            });

        $productmcount = [];
        $productArr = [];

        foreach ($products as $key => $value) {
            $productmcount[(int)$key] = count($value);
        }

        $monthAll = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        for ($i = 0; $i < 12; $i++) {
            if (!empty($productmcount[$i])) {
                $productArr[$i] = $productmcount[$i];
            } else {
                $productArr[$i] = 0;
            }
        }

        return view('panel.pages.Product')->with([
            'products' => $product
        ])->with(['productArr'=> $productArr]);
    }

    public function create()
    {
        return view('panel.pages.productcrud.createProduct');
    }

    // To create a Product
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:5',
            'description' => 'required|min:10'
        ]);

        $poidocument = $request->file('productImg');

        if (!empty($poidocument)) {
            $poiImg = time() . '_1.' . $poidocument->getClientOriginalExtension();
            $path = public_path() . '/admin/images';
            $poidocument->move($path, $poiImg);
        } else {
            $poidocument = '';
        }

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'productImg' => $poiImg
        ]);

        return redirect('/dashboard/products');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('panel.pages.productcrud.editProduct', [
            'product' => $product
        ]);
    }

    // To update a Product's detail
    public function update(Request $request, Product $product)
    {
        $validate = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $poidocument = $request->file('productImg');

        if (!empty($poidocument)) {
            $poiImg = time() . '_1.' . $poidocument->getClientOriginalExtension();
            $path = public_path() . '/admin/images';
            $poidocument->move($path, $poiImg);
        } else {
            $poiImg = $product->productImg;
        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'productImg' => $poiImg
        ]);

        return redirect('/dashboard/products');
    }

    // To delete a Product
    public function delete(Product $product)
    {
        $product->delete();
        return redirect('/dashboard/products');
    }
}
