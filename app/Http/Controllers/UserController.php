<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if (!empty($user)) {
            if (\auth()->user()->id !== $user->id) {
                return \redirect('/')->with('error', 'Unauthorized Page');
            }
        }else {
            return \redirect('/')->with('error', 'No Such Id');
        }
        
        return \view('users.edit' , ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request , [
            'user-name' => 'required',
            'full-name' => 'required',
            'email' => 'required',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle file to upload
        if ($file = $request->file('avatar')) {
            // pattern for fileToStore
            $filenameToStore = date('YmdHis') . "." . $file->extension();
            $path = $file->storeAs('public/avatars' , $filenameToStore);
         }
        // find post by id
        $user =  User::find($id);
        $user->user_name = $request->input('user-name');
        $user->full_name = $request->input('full-name');
        $user->email = $request->input('email');
        $user->avatar = $filenameToStore;
        $user->save();

        return \redirect('/')->with('success' , 'User Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
