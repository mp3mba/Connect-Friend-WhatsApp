<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PhoneController extends Controller
{
    public function show(){
        $user = User::All();

        if($user->isEmpty()){
            return response()->json(['message' => 'No contact available yet']);
        }

        return response()->json(['users' => $user]);
    }

    public function insert(Request $request){
        $request->validate([
            'phone' => 'required|min:10',
            'description' => 'required',
        ]);
        
        $user = new User();
        $user->phone = $request->phone;
        $user->description = $request->description;
        $user->save();

        return response()->json(['message' => 'Phone number saved successful!']);
    }
}
