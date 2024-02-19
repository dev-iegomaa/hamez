<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\CategoryInterface;
use App\Http\Traits\ImageTrait;
use App\Models\Category;

class CategoryRepository implements CategoryInterface
{
    const PATH = 'category';
    use ImageTrait;
    public function index()
    {
        $categories = Category::select(['id', 'title', 'image', 'icon'])->get();
        confirmDelete(__('Delete Category !'), __('Are you sure you want to delete?'));
        return view('admin.pages.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.pages.category.form');
    }

    public function store($request)
    {
        $imageName = $this->uploadImage($request->image, self::PATH);
        Category::create([
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar
            ],
            'image' => $imageName,
            'icon' => $request->icon
        ]);
        toast(__('Category Was Created Successfully'), 'success');
        return redirect(route('admin.category.index'));
    }

    public function delete($id)
    {
        $category = Category::select(['id', 'image'])->find(base64_decode($id));
        unlink(public_path($category->image));
        $category->delete();
        toast(__('Category Was Deleted Successfully'), 'success');
        return back();
    }

    public function edit($id)
    {
        $category = Category::select(['id', 'title', 'icon'])->find(base64_decode($id));
        if ($category) {
            return view('admin.pages.category.form', compact('category'));
        }
        toast(__("Sorry, Can't Category Found"), 'error');
        return back();
    }

    public function update($request)
    {
        $category = Category::find($request->id);
        if ($request->has('image')) {
            $imageName = $this->uploadImage($request->image, self::PATH, $category->image);
        }
        $category->update([
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar
            ],
            'image' => $imageName ?? $category->getRawOriginal('image'),
            'icon' => $request->icon
        ]);
        toast(__('Category Was Updated Successfully'), 'success');
        return redirect(route('admin.category.index'));
    }
}
