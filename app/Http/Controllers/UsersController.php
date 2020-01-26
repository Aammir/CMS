<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        // dd($users);
        return view('auth.users')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.add-user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            //   dd($request);
        //   $name = trim(preg_replace('/\s+/', ' ', request('name')));

        $image = $request->file('image');
        if ($image) {
            $new_image = str_replace(" ", "-", strtolower(request('name'))) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/img'), $new_image);
        } else {
            $new_image = '';
        }

        $user = new User;
        $user->name = request('name');
        $user->email = request('email');
        $hashedPassword = Hash::make(request('password'));
        $user->password = $hashedPassword;
        $user->image = $new_image;
        $user->info = request('info');
        $user->save();

        return redirect('/admin/users')->with('message', 'User Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $user = User::where('id', '=', $id)->firstOrFail();
        return view('auth.edit-user')->with('user',$user);
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
        $user  = User::where('id', $id)->first();
        $image = $request->file('image');
        if ($image) {
            $new_image = str_replace(" ", "-", strtolower(request('name'))) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/img'), $new_image);
        } else {
            $new_image = $user->image;
        }

        $user->name = request('name');
        $user->email = request('email');
        // if($user->id != 1){$user->password = request('password');}
        if(!request('password')){
            $user->password = $user->password;
        }else{
            $hashedPassword = Hash::make(request('password'));
            $user->password = $hashedPassword;
        }
        $user->image = $new_image;
        $user->info = request('info');
        $user->update();

        return redirect('/admin/users')->with('message', 'User profile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if($user->id != 1){
            $filename = public_path().'/assets/img/'.$user->image;
            if(file_exists($filename)){@unlink($filename);}
            $user->delete();
            return back()->withSuccess('message', 'User Removed Successfuly');
        } else{
            return back()->withSuccess('message', 'Admin User Can not be removed');
        }

    }
}
