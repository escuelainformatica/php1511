<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EjemploController extends Controller
{
    public function loginAPI(Request $request) {
        $body=json_decode($request->getContent(), true);
        //$credentials = $request->validate($body);
        if (Auth::attempt($body)) {
            $token = $request->user()->createToken('token',['editar']);
            return ['token' => $token->plainTextToken];
        }
        return [];

    }
    public function login(Request $request) {
        if($request->get('boton','')==='Login') {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                //var_dump(Auth::user());
                $request->session()->put('grupo',Auth::user()->grupo);
                //var_dump($request->session());
                //die(1);
                //$request->session()->put('grupo','editor');
                return redirect()->intended('dashboard');
            }
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');


        } else {
            return view("login");
        }
    }
    public function dashboard(Request $request) {
        return view('dashboard');
    }
    public function dashboardAPI(Request $request) {
        return $request->user();
    }
}
