<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class AuthController extends Controller
{
        public function index()
        {
            return view('login');
        }

        public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        try {
            if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            Auth::user();

                return redirect()->route('dashboard');
            } else {
                return redirect()->back()->withError('Invalid login credentials');
            }
        } catch (Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
