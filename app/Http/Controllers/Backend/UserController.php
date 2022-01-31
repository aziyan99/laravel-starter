<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = User::latest()->get();
            return DataTables::of($users)
                ->addColumn('avatar', function ($user) {
                    return '
                            <img src="' . $user->avatar_path . '" alt="avatar" width="64" class="rounded-circle">
                        ';
                })
                ->addColumn('name', function ($user) {
                    return '
                        ' . $user->name . ' <br> <small><code>' . $user->role . '</code></small>
                    ';
                })
                ->addColumn('kontak', function ($user) {
                    return '
                        ' . $user->email . ' <br> <small><code>' . $user->phone_number . '</code></small>
                    ';
                })
                ->addColumn('Aksi', function ($user) {
                    return '
                        <a href="' . route('users.edit', $user) . '" class="btn btn-secondary btn-sm mt-2">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="' . route('users.show', $user) . '" class="btn btn-secondary btn-sm mt-2">
                            <i class="fas fa-eye"></i>
                        </a>
                        <form action="' . route('users.destroy', $user) . '" method="POST" class="d-inline">
                            <input type="hidden" name="_token" value="' . csrf_token() . '">
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-secondary btn-sm mt-2" onclick="' . "return confirm('Hapus pengguna ini?' )" . '" type="submit">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    ';
                })
                ->rawColumns(['avatar', 'name', 'kontak', 'Aksi'])
                ->make(true);
        }
        return view('backend.users.index', ['users' => new User()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create', ['user' => new User()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->email),
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'avatar' => null,
        ]);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('backend.users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('backend.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (Storage::exists($user->avatar)) {
            Storage::delete($user->avatar);
        }

        $user->delete();

        return redirect()->route('users.index');
    }
}
