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
         $categories = Category::whereNull('user_id')
                                     ->orWhere('user_id', Auth::id())->paginate(6);
        return view('category.index',compact ('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        //handle create form submission

        $data = $request->validated();

        Category::create([
            'name' => $data['name'] ,
            'user_id' => Auth::id(), // Assuming you want to associate the category with the authenticated user
        ]);

        return redirect()->route('category.index')->with('success', 'Categorie créer avec succès.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
        $this->authorize('view',$category);

        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $this->authorize('update', $category);
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //update the specified resource in storage
        $data = $request->validated();

        $category->update([
            'name' => $data['name'],
        ]);

        return redirect()->route('category.index')->with('success', 'Categorie mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // delete the category
        $user = Auth::user();
        if ($user->can('delete', $category)) {
            $category->delete();
            return redirect()->route('category.index')->with('success', 'Categorie supprimée avec succès.');
        }

        return redirect()->route('category.index')->with('error', 'Vous n\'êtes pas autorisé à supprimer cette catégorie.');
    }
}
