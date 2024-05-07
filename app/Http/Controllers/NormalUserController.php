<?php

namespace App\Http\Controllers;

use App\Models\NormalUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class NormalUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
   
    /**
     * Display the specified resource.
     */
    public function show(NormalUser $normalUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NormalUser $normalUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NormalUser $normalUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NormalUser $normalUser)
    {
        //
    }

    public function store(Request $request)
{
    $checkUser = NormalUser::where('email', $request->email)->first();
    if ($checkUser) {
        return redirect()->back()->with('message', 'Your account already exists');
    }

    $normalUser = new NormalUser;
    $normalUser->name = $request->fname . ' ' . $request->lname; // Concatenate first name and last name with a space in between
    $normalUser->email = $request->email;
    $normalUser->password = Hash::make($request->password);

    $status = $normalUser->save();
    if ($status) {
        // You can set session data like this, but make sure it's necessary and secure
        $request->session()->put('sessionUser', $normalUser->password);
        return redirect('/')->with('message', 'Your account has been registered successfully');
    }
    return redirect()->back()->with('message', 'Failed to create an account');
}
    public function login(Request $request)
    {
      

        $email = $request->email;
        $password = $request->password;
        $admin = DB::table('normal_users')
            ->where('email', $email)
            ->get();

        if (!empty($admin[0])) {
            if (Hash::check($password, $admin[0]->password)) {
                $request->session()->put('sessionUser', $admin[0]->password);
                $request->session()->save();
                return redirect('/');
            } else {
                return Redirect::back()->withErrors(['password' => 'Sorry ! Your input password is wrong.']);
            }
        } else {
            return Redirect::back()->withErrors(['email' => 'Sorry ! Your input email is wrong or your service status is not correct.']);
        }
    }
}
