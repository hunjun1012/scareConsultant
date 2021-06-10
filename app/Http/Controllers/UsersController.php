<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class UsersController extends Controller
{
    public function store(Request $request){
        $userData = $request->except('_token');
         
        //패스워드 암호화
        // $cryptedPassword = bcrypt($userData['password']);
        // $userData['password'] = $cryptedPassword;
        
        //회원가입
        $user = \App\User::create($userData);
        
        //로그인
        // auth()->login($user);

        //가입 후 화면 이동
        return redirect()->intended('dashboard/all');
    }



/**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {   
        return view('dashboard-information-edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update(request(['id','password', 'name', 'age', 'temperature', 'addtemperature', 'team', 'sit', 'isLoggedin', 'created_at', 'updated_at']));
 
        return redirect('/information');
    }


     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
 
       return redirect('/information');
    }
}