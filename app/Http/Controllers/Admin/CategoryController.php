<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\CategoryRequest;

/* what does Category Controller to?
 * - create a new category
 * - edit an existing category
 * - delete an existing category
 * - list categories
 */

class CategoryController extends Controller
{
   
    public function index(): View
    {
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    public function create(): View
    {
        return view('admin.categories.create');
    }

    public function store(CategoryRequest $request): RedirectResponse
    {
        Category::create($request->validated());

        return redirect()->route('admin.categories.index')->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }

/*    public function edit(Category $category): View
    {
        return view('admin.categories.edit', compact('category'));
    }
*/

    public function show(Category $category): View
    {
        return view('admin.categories.show', compact('category'));
    }

    public function edit(Category $category): View
    {
        return view('admin.categories.edit', compact('category'));
    }


    public function update(CategoryRequest $request, Category $category): RedirectResponse
    {
        $category->update($request->validated());

        return redirect()->route('admin.categories.index')->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();


        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }

/*  Entfernt zuviel nicht ?

Unterschied zu mass destroy? 

public function show(Category $category): View
    {
        return view('admin.categories.show', compact('category'));
    }
    
   public function destroyAll(): RedirectResponse
    {
        Category::truncate();

        return back()->with([
            'message' => 'successfully deleted all !',
            'alert-type' => 'danger'
        ]);
    }
*/
    public function massDestroy()
    {
        Category::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
}
