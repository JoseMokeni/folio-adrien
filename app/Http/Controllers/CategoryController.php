<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CategoryController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return the index view
        $catgories = Category::where('user_id', Auth::id())->get();
        return view('category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //return the create view
        return view ('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        //handle create form submission

        $request = request()->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create([
            'name' => $request->name ,
            'user_id' => auth::id(), // Assuming you want to associate the category with the authenticated user
        ]);

        return redirect()->route('category.index')->with('success', 'Categorie créer avec succès.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
        if ($category->user_id != null && $category->user_id != Auth::id()){
            abort(403, 'Action interdite' );
        }

        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //display category

        $this->authorize('update', $category);
        return view('category.edit', compact ('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //update the specified resource in storage
        $request = request()->validate([
            'name' => 'required|string|max:255'
        ]);

        $category->update([
            'name' => $request->name ,
        ]);

        return redirect()->route('category.index')->with('success', 'Categorie mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // delete the category
        $this->authorize('delete',  $category);
        $category->delete();

        return redirect()->route ('category.index')->with('success', 'Categorie supprimée avec succès.');
    }
}
