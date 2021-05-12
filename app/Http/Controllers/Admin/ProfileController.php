<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.profile.index');
    }

    /**
     * Display a change password page
     *
     * @return \Illuminate\Http\Response
     */
    public function password()
    {
        return view('admin.profile.password');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, User $profile)
    {
        $profile->update($request->all());

        return redirect()->route('profiles.index')->withSuccess('Profile berhasil di update. ');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changePassword(PasswordRequest $request, User $user)
    {
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('change-password.index')->withSuccess('Password berhasil di update. ');
    }
}
