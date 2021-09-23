<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use App\Imports\ProductsImport;
use DataTables;
use File;
use Excel;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = [];
        if ($request->ajax()) {
            $data = Product::join('categories', 'products.cat_id', 'categories.id')
                    ->select('products.id','products.prodname','products.details','products.price','products.image','categories.name')
                    ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<div class="form-group">
                    <a href="'.route('products.edit',$row->id).'" class="link btn btn-outline-success">Edit</a> <a href="'.route('products.destroy',$row->id).'" class="link btn btn-outline-danger">Delete</a>
                    </div>';
                    
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('products.index')->with('products',$products);
    }

    public function create()
    {
        $categories = Category::all();
        // $category->name;
        // dd($categories);
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
    //    dd($request);
        $request->validate([
            'prodname'=>'required',
            'details'=>'required',
            'price'=>'required',
            // 'image' => 'required',
            'cat_id' => 'required',
        ]);

        if ($request->hasFile('image')) {
            //
            $image = $request->file('image');
            $path = public_path('image');
            $name = time().rand(1, 99999) . "." . $image->getClientOriginalExtension();
            $image->move($path, $name);
            // dd($path);
        }

        $product = new Product();
        $product->prodname = $request->prodname;
        $product->details = $request->details;
        $product->price = $request->price;
        $product->image = isset($name) ? $name : "";
        $product->cat_id = $request->cat_id;
        // dd($product);
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product has been added successfully');
    }

    public function edit($id)
    {   
        $products = Product::find($id);
        // dd($id);
        // dd($products->image);
        $categories = Category::get();
        return view('products.edit', compact('products', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // dd($id);
        $request->validate([
            'prodname'=>'required',
            'details'=>'required',
            'price'=>'required',
            'cat_id'=>'required',
        ]);
        
        if ($request->hasFile('image')) {
            //
            $image = $request->file('image');
            $path = public_path('image');
            $name = time().rand(1, 99999) . "." . $image->getClientOriginalExtension();
            $image->move($path, $name);
            // dd($path);
        }

        $products = Product::where('id', $id)->first();
        $products->prodname = $request->prodname;
        $products->details = $request->details;
        $products->price = $request->price;
        $products->image = isset($name) ? $name : "";
        $products->cat_id = $request->cat_id;
        // dd($products);
        $products->save();

        return redirect()->route('products.index')->with('success', 'Product has been updated successfully');
    }

    public function destroy($id)
    {
        $products = Product::where('id', $id)->delete();

        return redirect()->route('products.index')->with('success', 'Product has been deleted successfully');
    }

    public function Import()
    {
        Excel::import(new ProductsImport, request()->file('file'));
        return back();
    }   
}
