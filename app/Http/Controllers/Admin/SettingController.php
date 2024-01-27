<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setting\SettingRequest;
use App\Http\Traits\ImageTrait;
use App\Models\Setting;

class SettingController extends Controller
{
    const PATH = 'setting';
    use ImageTrait;
    public function index()
    {
        $setting = Setting::select()->first();
        return view('admin.pages.setting.form', compact('setting'));
    }

    public function store(SettingRequest $request)
    {
        $setting = Setting::find(1);
        if ($request->logo) {
            $logo = $this->uploadImage($request->logo, self::PATH, $setting->getRawOriginal('logo'));
        }
        Setting::updateOrCreate(['id' => 1], [
            'email' => $request->email,
            'phone' => $request->phone,
            'logo' => (isset($logo)) ? $logo : (($setting) ? $setting->getRawOriginal('logo') : null),
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar,
            ],
            'location' => [
                'en' => $request->location_en,
                'ar' => $request->location_ar
            ],
            'facebook' => $request->facebook,
            'whatsapp' => $request->whatsapp,
            'instagram' => $request->instagram,
            'tiktok' => $request->tiktok,
            'snapchat' => $request->snapchat,
            'opening_from' => $request->opening_from,
            'opening_to' => $request->opening_to,
            'time_from' => $request->time_from,
            'time_to' => $request->time_to,
        ]);
        toast('Setting Was Created Or Updated Successfully', 'success');
        return back();
    }
}
