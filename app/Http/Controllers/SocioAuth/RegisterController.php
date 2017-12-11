<?php

namespace App\Http\Controllers\SocioAuth;

use App\Socio;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/socio/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('socio.guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:255|unique:socios,username',
            'email' => 'required|string|email|max:255|unique:socios,email',
            'rut' => 'required|string|max:10|min:8|unique:socios,rut|exists:rutsocios',
            'nombre' => 'required|string|max:30',
            'apellido_pat' => 'required|string|max:30',
            'apellido_mat' => 'required|string|max:30',
            'password' => 'required|string|min:4|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Socio
     */
    protected function create(array $data)
    {
        return Socio::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'rut' => $data['rut'],
            'nombre' => $data['nombre'],
            'apellido_pat' => $data['apellido_pat'],
            'apellido_mat' => $data['apellido_mat'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('socio.auth.register');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('socio');
    }
}
