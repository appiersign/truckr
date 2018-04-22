<?php

namespace App\Http\Controllers;

use App\Console\Commands\SendVerificationCode;
use function foo\func;
use Illuminate\Http\Request;
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

        return 'success';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
