<?php

namespace App\Http\Controllers;

use App\Console\Commands\CreateDriver;
use App\Console\Commands\SendVerificationCode;
use App\Driver;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.text_driver');
    }

    public function text(Request $request)
    {
        $this->validate($request, [
            'telephone' => 'bail|required'
        ]);

        $code = substr(str_shuffle('9517328460951732846095173284609517328460'), -4);

        $job = ( new SendVerificationCode($request->input('telephone'), $code));
        $this->dispatch($job);

        Session::put('verify', $code);
        Session::put('telephone', $request->input('telephone'));

        return view('pages.verify_code');
    }

    public function text_form()
    {
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
            return redirect()->route('drivers.text')->withErrors($validator);
        }

        return redirect()->route('register')->with('telephone', Session::get('telephone'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'class_type' => 'required|string|size:1',
            'license_pin' => 'required|string',
            'date_issued' => 'required|string',
            'date_expired' => 'required|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        try {

            $job = ( new CreateDriver(Auth::id(), $request->input('license_pin'), $request->input('class_type'), $request->input('date_issued'), $request->input('date_expired')) );
            $this->dispatch($job);
            return 'success';

        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
