<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){
        $users = User::orderBy('name','ASC')->paginate(5);
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

        return redirect()->route('home')->with('success','Data updated successfully.');
    }

    // This page will redirect to edit page
    public function editPage($id){
        $user = User::find($id);
        if($user == null){
            abort(404);
        }
        return view('edit',[
            'user' => $user,
        ]);
    }

    // This function will update data
    public function update(Request $request, $id){
        
        $user = User::findOrFail($id);
        
        $rules = [
            'name' => 'required|min:5',
            'email' => 'required|email',
            'address' => 'required|min:10',
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->passes()){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->save();

            return redirect()->route('home')->with('success','Data updated successfully.');
        }else{
            return redirect()->route('editPage',$user->id)->withInput()->withErrors($validator);
        }
    }


    // This method will delete data
    public function destroy(Request $request){
        $user = User::find($request->id);
        if($user == null){
            Session()->flash('error','User not found');
            return response()->json([
                'status' => false,
                'message' => 'User not found',
            ]);
        }else{

            $user->delete();
            $message = "User deleted successfully.";
            Session()->flash('success',$message);
            return response()->json([
                'status' => true,
                'message' => $message,
            ]);
        }
    }
}
