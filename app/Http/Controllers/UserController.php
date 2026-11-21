<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class UserController extends Controller
{
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:users',
            'full_name' => 'required',
        ]);

        User::create($validated);

        return redirect('/users');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'username' => 'required|unique:users,username,' . $id,
            'full_name' => 'required',
            'avatar' => 'nullable|image|max:2048',
        ]);

        $user = User::findOrFail($id);

        if ($request->hasFile('avatar')) {

            $image = Image::read(
                $request->file('avatar')
            );

            $image->cover(200, 200);

            $filename = time() . '.jpg';

            Storage::disk('public')->put(
                'avatars/' . $filename,
                (string) $image->toJpeg()
            );

            $validated['avatar'] =
                'avatars/' . $filename;
        }

        $user->update($validated);

        return redirect('/users');
    }
}