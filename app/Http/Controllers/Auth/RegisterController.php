<?php

namespace App\Http\Controllers\Auth;

use App\Console\Commands\SendVerificationCode;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function verifyMobile()
    {
        return view('pages.verify_mobile');
    }

    public function sendVerificationCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'telephone' => 'bail|required|digits:12,|unique:users'
        ], [
            'telephone.digits' => 'enter number in international format'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $code = substr(str_shuffle('9517328460951732846095173284609517328460'), -4);

        $job = ( new SendVerificationCode($request->input('telephone'), $code));
        $this->dispatch($job);

        Session::put('verify', $code);
        Session::put('telephone', $request->input('telephone'));

        return view('pages.verify_code');
    }

    public function verify(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'bail|required|digits:4'
        ]);

        $validator->after( function ($validator) use ($request) {
            if ($request->input('code') <> Session::get('verify')) {
                $validator->errors()->add('code', 'wrong code');
            }
        });

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        return redirect()->route('register')->with('telephone', Session::get('telephone'));
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
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|string|email|max:100|unique:users',
            'telephone' => 'required|unique:users',
            'account_type' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'telephone' => $data['telephone'],
            'truckr_id' => md5(microtime()),
            'account_type' => $data['account_type'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function registered(User $user)
    {
        if ($user <> null) {
            if ($user->account_type === 'driver') {
                return redirect()->route('drivers.create');
            } else if ($user->account_type === 'owner') {
                return redirect()->route('owners.create');
            } else {
                return redirect()->route('loaders.create');
            }
        } else {
            return 'something went wrong';
        }
    }
}
