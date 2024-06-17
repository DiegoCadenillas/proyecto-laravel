<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class LoginRegisterController extends Controller
{
    /**
     * Instantiate a new LoginRegisterController instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'home'
        ]);
        $this->middleware('auth')->only('logout', 'home');
        $this->middleware('verified')->only('home');
    }

    /**
     * Display a registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('auth.register');
    }

    /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|string|max:250',
                'email' => 'required|string|email:rfc,dns|max:250|unique:users,email',
                'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            event(new Registered($user));

            $credentials = $request->only('email', 'password');
            Auth::attempt($credentials);
            $request->session()->regenerate();
            return redirect()->route('verification.notice');
        } else {
            return redirect('/');
        }
    }

    /**
     * Display a login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Authenticate the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        if ($request->isMethod('post')){
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);
            
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->route('home');
            }
            
            return back()->withErrors([
                'email' => 'Las credenciales dadas no son correctas, o no existen en nuestra BDD.',
                ])->onlyInput('email');
        } else {
            abort('404');
        }
    }

    /**
     * Display a home to authenticated & verified users.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return redirect("/products");
    }

    /**
     * Log out the user from application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('Ha cerrado sesión.');
    }
}
