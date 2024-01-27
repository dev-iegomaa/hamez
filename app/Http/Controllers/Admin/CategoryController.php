<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CategoryRequest;
use App\Http\Requests\Admin\Category\DeleteCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::select(['id', 'title'])->get();
        return view('admin.pages.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.pages.category.form');
    }

    public function store(CategoryRequest $request)
    {
        Category::create([
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar
            ]
        ]);
        toast('Category Was Created Successfully', 'success');
        return redirect(route('admin.category.index'));
    }

    public function delete(DeleteCategoryRequest $request)
    {
        Category::select('id')->find($request->id)->delete();
        toast('Category Was Deleted Successfully', 'success');
        return back();
    }

    public function edit($id)
    {
        $category = Category::select('id', 'title')->find(base64_decode($id));
        if ($category) {
            return view('admin.pages.category.form', compact('category'));
        }
        toast('Sorry, Can\'t Category Found', 'error');
        return back();
    }

    public function update(CategoryRequest $request)
    {
        Category::find($request->id)->update([
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar
            ]
        ]);
        toast('Category Was Updated Successfully', 'success');
        return redirect(route('admin.category.index'));
    }
}
