<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('backend.profile.index', ['user' => auth()->user()]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);
        return redirect()->route('users.index');
    }

    public function updateAvatar(Request $request, User $user)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $avatar = $request->avatar;
        $filename = $avatar->getClientOriginalName();
        $extension = explode(".", $filename);
        $newFileName = uniqid() . "." . $extension[1];

        $avatarResize = Image::make($avatar->getRealPath());
        $avatarResize->resize(256, 256);
        $avatarResize->save(storage_path('app/public/avatar/' . $newFileName));

        if (Storage::disk('public')->exists($user->avatar)) {
            Storage::disk('public')->delete($user->avatar);
        }

        $user->update([
            'avatar' => 'avatar/' . $newFileName
        ]);

        return redirect()->route('profile.index');
    }

    public function updatePassword(Request $request, User $user)
    {
        $request->validate([
            'password' => 'required|min:5|confirmed'
        ]);

        $user->update([
            'password' => Hash::make()
        ]);

        return redirect()->route('profile.index');
    }
}
