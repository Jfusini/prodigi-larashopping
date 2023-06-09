<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        foreach($categories as $index => $category){
            $count[$index] = Post::where('category_id', $category->id)->count();;
        }
        return view('categories.index', compact("categories", "count"));
    }
    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "name"=>'required'
        ]);
        Category::create([
            "name"=>$validated['name'],
            "description"=> $request->description,
        ]);
        return redirect(route('categories.index'))->with('message', 'Categoria creata con successo');
    }

    public function show(Categories $categories)
    {
        return view('category.show', ["category"=>$category]);
    }
    public function edit(Categories $categories)
    {
        return view('category.edit',["category"=>$category]);
    }

    public function update(Request $request, Categories $categories)
    {
        //
    }

    public function destroy(Categories $categories)
    {
        //
    }
}
