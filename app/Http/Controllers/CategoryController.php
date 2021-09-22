<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $category = [];
        if ($request->ajax()) {
            $data = Category::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){

                    $btn = '<div class="form-group">
                    <a href="'.route('category.edit',$row->id).'" class="link btn btn-outline-success">Edit</a> <a href="'.route('category.destroy',$row->id).'" class="link btn btn-outline-danger">Delete</a>
                    </div>';
                    
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('category.index')->with('category',$category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=> 'required',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect()->route('category.index')->with('success', 'Category has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, $id)
    {
        //
        $category = Category::find($id);
        // dd($category);
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category, $id)
    {
        //
        $request->validate([
            'name' => 'required',
        ]);

        $category = Category::where('id', $id)->first();
        $category->name = $request->name;
        $category->save();

        return redirect()->route('category.index')->with('success', 'Category has been updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, $id)
    {
        //
        $category = Category::where('id', $id)->delete();

        return redirect()->route('category.index')->with('success', 'Category has been deleted successfully');
    }
}
