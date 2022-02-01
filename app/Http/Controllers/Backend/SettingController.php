<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class SettingController extends Controller
{
    public function index()
    {
        adminOnly();
        return view('backend.settings.index', [
            'setting' => Setting::first(),
        ]);
    }

    public function update(UpdateSettingRequest $request, Setting $setting)
    {
        adminOnly();
        $setting->update($request->only('name', 'phone_number', 'address', 'email', 'facebook', 'instagram', 'twitter'));
        return redirect()->route('setting.index');
    }

    public function updateLogo(Request $request, Setting $setting)
    {
        adminOnly();
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $logo = $request->logo;
        $filename = $logo->getClientOriginalName();
        $extension = explode(".", $filename);
        $newFileName = uniqid() . "." . $extension[1];

        $logoResize = Image::make($logo->getRealPath());
        $logoResize->resize(256, 256);
        $logoResize->save(storage_path('app/public/logo/' . $newFileName));

        if (Storage::disk('public')->exists($setting->logo)) {
            Storage::disk('public')->delete($setting->logo);
        }

        $setting->update([
            'logo' => 'logo/' . $newFileName
        ]);

        return redirect()->route('setting.index');
    }
}
