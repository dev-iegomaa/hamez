<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\CategoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryInterface
{

    public function index()
    {
        $categories = Category::select(['id', 'title'])->get();
        confirmDelete(__('Delete Category !'), __('Are you sure you want to delete?'));
        return view('admin.pages.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.pages.category.form');
    }

    public function store($request)
    {
        Category::create([
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar
            ]
        ]);
        toast(__('Category Was Created Successfully'), 'success');
        return redirect(route('admin.category.index'));
    }

    public function delete($id)
    {
        Category::select('id')->find(base64_decode($id))->delete();
        toast(__('Category Was Deleted Successfully'), 'success');
        return back();
    }

    public function edit($id)
    {
        $category = Category::select('id', 'title')->find(base64_decode($id));
        if ($category) {
            return view('admin.pages.category.form', compact('category'));
        }
        toast(__("Sorry, Can't Category Found"), 'error');
        return back();
    }

    public function update($request)
    {
        Category::find($request->id)->update([
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar
            ]
        ]);
        toast(__('Category Was Updated Successfully'), 'success');
        return redirect(route('admin.category.index'));
    }
}
