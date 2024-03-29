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
use Illuminate\Validation\Rules\Password;

class AuthFunctions extends Controller
{

    protected function checkIfLoggedIn(){
        if(Auth::check()){
            return redirect('/');
        }
    }
    protected function register(Request $request){

        try{
            
            $request->validate([
                'firstName' => 'required|string|max:50',
                'surname' => 'required|string|max:50',
                'address' => 'required|string|max:50',
                'postcode' => 'required|string|max:10',
                'phoneNumber' => 'required|numeric|digits:11',
                'email' => 'required|email|string|unique:users|max:100',
                'password' => ['required','max:100', Password::min(8)
                                                            ->mixedCase()
                                                            ->letters()
                                                            ->numbers()
                                                            ->symbols()],
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

        }catch(\Illuminate\Database\QueryException $e){

            $errorInString = $e->getMessage();
            return back()->withErrors(['msg' => 'It seems there was an error with the server. Please try again later!' ]);
            
        }
    }

    protected function login(Request $request){
       
            $request->validate([
                'email' => 'required|email|string|max:100',
                'password' => 'required|min:0|max:100',
            ]);

        try{

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                // Authentication passed...
                return redirect()->intended('/');

            }elseif(Auth('employee')->attempt(['email' => $request->email, 'password' => $request->password])){
                
                return redirect()->intended('/');
            }else{
                return back()->withErrors(['msg' => 'The details you entered are incorrect.']);
            }

        }catch(\Illuminate\Database\QueryException $e){

            $errorInString = $e->getMessage();
            return back()->withErrors(['msg' => 'It seems there was an error with the server. Please try again later!' ]);
            
        }
    }

    protected function logout(){
        Auth::logout();
        return redirect('/');
    }
}
