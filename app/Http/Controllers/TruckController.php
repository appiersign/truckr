<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTruck;
use App\Jobs\CreateTruckJob;
use App\Owner;
use App\Truck;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TruckController extends Controller
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
        $user = Auth::user();
        return view('pages.trucks.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateTruck $createTruck
     * @param User $user
     * @return array
     */
    public function store(CreateTruck $createTruck)
    {
        $createTruck->validated();
        try {
            $job = new CreateTruckJob($createTruck->all());
            $this->dispatch($job);
            Session::remove('error');
            Session::put('success', 'Truck added!');
            $owner = User::find(Auth::id())->owner->id;
            return redirect()->route('owners.trucks', ['owner' => $owner]);
        } catch (\Exception $exception) {
            Session::put('error', $exception->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Truck $truck
     * @return Truck
     */
    public function show(Truck $truck)
    {
        return $truck;
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
