<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){
        $users = User::orderBy('name','DESC')->get();
        return view('lists',[
            'users' => $users,
        ]);
    }


    // This function show create page
    public function createPage(){
        return view('create');
    }

    // This function will store a data in DB
    public function store(Request $request){
        $rules = [
            'name' => 'required|min:5',
            'email' => 'required|unique:users|email',
            'address' => 'required|min:10',
            'password' => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return redirect()->route('form')->withInput()->withErrors($validator);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('home');

    }

}
