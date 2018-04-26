<?php

namespace App\Http\Controllers;

use App\Console\Commands\CreateDriver;
use App\Console\Commands\SendVerificationCode;
use App\Driver;
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
        return view('pages.license_details');
    }

    /**
     * @param Request $request
     * @return $this|string
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
            return redirect()->route('home');

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
    public function show(Driver $driver)
    {
        return view('pages.drivers.show', compact('driver'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Driver $driver)
    {
        return view('pages.update_driver', compact('driver'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Driver $driver)
    {
        $driver->user->first_name   = $request->input('first_name', $driver->user->first_name);
        $driver->user->last_name    = $request->input('last_name', $driver->user->last_name);
        $driver->user->telephone    = $request->input('telephone', $driver->user->telephone);
        $driver->user->save();

        $driver->class_type         = $request->input('class_type', $driver->class_type);
        $driver->license_date_issued = $request->input('license_date_issued', $driver->license_date_issued);
        $driver->license_date_expired = $request->input('license_date_expired', $driver->license_date_expired);

        if ($driver->save()) {
            return redirect()->route('drivers.show', $driver);
        }
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
