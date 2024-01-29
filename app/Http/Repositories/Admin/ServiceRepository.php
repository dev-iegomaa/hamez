<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\ServiceInterface;
use App\Models\Category;
use App\Models\Service;

class ServiceRepository implements ServiceInterface
{

    public function index()
    {
        $services = Service::select(['id', 'title', 'price', 'description', 'category_id'])->get();
        confirmDelete(__('Delete Service !'), __('Are you sure you want to delete?'));
        return view('admin.pages.service.index', compact('services'));
    }

    public function create()
    {
        $categories = Category::select(['id', 'title'])->get();
        return view('admin.pages.service.form', compact('categories'));
    }

    public function store($request)
    {
        Service::create([
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar
            ],
            'description' => [
                'en' => $request->description_en,
                'ar' => $request->description_ar
            ],
            'price' => [
                'en' => $request->price_en,
                'ar' => $request->price_ar
            ],
            'category_id' => $request->category_id
        ]);
        toast(__('Service Was Created Successfully'), 'success');
        return redirect(route('admin.service.index'));
    }

    public function delete($id)
    {
        Service::select('id')->find(base64_decode($id))->delete();
        toast(__('Service Was Deleted Successfully'), 'success');
        return back();
    }

    public function edit($id)
    {
        $service = Service::select(['id', 'title', 'price', 'description', 'category_id'])->find(base64_decode($id));
        if ($service) {
            $categories = Category::select(['id', 'title'])->get();
            return view('admin.pages.service.form', compact('service', 'categories'));
        }
        toast(__("Sorry, Can't Service Found"), 'error');
        return back();
    }

    public function update($request)
    {
        Service::find($request->id)->update([
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar
            ],
            'description' => [
                'en' => $request->description_en,
                'ar' => $request->description_ar
            ],
            'price' => [
                'en' => $request->price_en,
                'ar' => $request->price_ar
            ],
            'category_id' => $request->category_id
        ]);
        toast(__('Service Was Updated Successfully'), 'success');
        return redirect(route('admin.service.index'));
    }
}
