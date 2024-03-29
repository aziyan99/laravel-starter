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
use Flasher\Prime\FlasherInterface;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        adminOnly();
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
        adminOnly();
        return view('backend.users.create', ['user' => new User()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request, FlasherInterface $flasherInterface)
    {
        adminOnly();
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->email),
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'role' => $request->role,
            'avatar' => null,
        ]);
        $flasherInterface->addSuccess('Pengguna berhasil disimpan');
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
        adminOnly();
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
        adminOnly();
        return view('backend.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user, FlasherInterface $flasherInterface)
    {
        adminOnly();
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'role' => $request->role,
            'address' => $request->address,
        ]);
        $flasherInterface->addSuccess('Pengguna berhasil diubah');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, FlasherInterface $flasherInterface)
    {
        adminOnly();
        if (Storage::exists($user->avatar)) {
            Storage::delete($user->avatar);
        }

        $user->delete();

        $flasherInterface->addSuccess('Pengguna berhasil dihapus');
        return redirect()->route('users.index');
    }
}
