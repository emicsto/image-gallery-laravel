<?php

namespace App\Http\Controllers;

use App\Image;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function destroy()
    {
        User::destroy(request()->user);
        return redirect()->back();
    }

    public function edit(User $user)
    {

        return view('auth.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate(request(), [
            'avatar'   => 'sometimes|image'
        ]);

        if (request()->hasFile('avatar')) {
            $image = request()->file('avatar');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('imgs\\' . $filename);
            \Intervention\Image\Facades\Image::make($image)->circle(30, 30, 20)->save($location);


            $oldFilename = $user->avatar;
            $user->avatar = $filename;
            }

        $user->update(['avatar' => $user->avatar]);

        return redirect()->back();
    }
}
