<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AuthFunctions extends Controller
{
    protected function register(Request $request){

        $request->validate([
            'firstName' => 'required|string|max:50',
            'surname' => 'required|string|max:50',
            'address' => 'required|string|max:50',
            'postcode' => 'required|string|max:10',
            'phoneNumber' => 'required|numeric|digits:10',
            'email' => 'required|email|string|unique:users|max:100',
            'password' => 'required|min:0|max:100',
            'confirmPassword' => 'required|same:password|max:100',
        ]);

        User::create([
            'firstName' => $request->firstName,
            'surname' => $request->surname,
            'address' => $request->address,
            'postcode' => $request->postcode,
            'phoneNumber' => $request->phoneNumber,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        return redirect('/login');
    }

    protected function login(Request $request){

        $request->validate([
            'email' => 'required|email|string|max:100',
            'password' => 'required|min:0|max:100',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication passed...
            return redirect()->intended('/');

        }elseif(Auth('employee')->attempt(['email' => $request->email, 'password' => $request->password])){
            
            return redirect()->intended('/');
        }else{
            return back()->withErrors(['msg' => 'The details you entered are incorrect.']);
        }
    }
}
