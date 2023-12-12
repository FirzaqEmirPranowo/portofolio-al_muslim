<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt(array('username' => $input['username'], 'password' => $input['password']))) {
            if (auth()->user()->role_id = 2) {
                return redirect()->route('dashboard');
            } else {
                return redirect('/');
            }
        } else {
            return redirect()->route('login')
                ->with('error', 'Username - Address And Password Are Wrong.');
        }
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'no_hp' => ['required'],
            'nis' => ['required', 'unique:users,nis'],
            'kelas' => ['required'],
            'gender' => ['required'],
            'username' => ['required', 'unique:users,username'],
            'password' => ['required'],
        ]);

        $role_id = 2;

        try {
            $create = User::create([
                'name' => $request->name,
                'role_id' => $role_id,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'nis' => $request->nis,
                'kelas' => $request->kelas,
                'gender' => $request->gender,
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ]);

            Alert::success('Berhasil', 'Register Berhasil! Silakan login.');
            return redirect('/login');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Registrasi gagal. Pastikan NIS dan email unik.');
            return redirect()->back();
        }
    }
}
