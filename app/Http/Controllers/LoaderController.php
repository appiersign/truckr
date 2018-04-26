<?php

namespace App\Http\Controllers;

use App\Jobs\CreateLoaderJob;
use App\Loader;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoaderController extends Controller
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
        return view('pages.loaders.create');
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
            'position' => 'required',
            'category' => 'required',
            'business_name' => 'required',
            'address' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $data = $request->all();
            $data['user_id'] = Auth::id();
            $job = new CreateLoaderJob($data);
            $this->dispatch($job);
            return redirect()->route('home');
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Loader $loader
     * @return \Illuminate\Http\Response
     */
    public function show(Loader $loader)
    {
        return view('pages.loaders.show', compact('loader'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Loader $loader
     * @return Loader
     */
    public function edit(Loader $loader)
    {
        return view('pages.loaders.edit', compact('loader'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Loader $loader
     * @return void
     */
    public function update(Request $request, Loader $loader)
    {
        $loader->address = $request->input('address');

        $loader->save();

        return redirect()->route('loaders.show', $loader);
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
