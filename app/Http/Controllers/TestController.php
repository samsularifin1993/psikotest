<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request['user_level'] == 'admin'){
            return view('admin.dashboard');
        }else{
            return view('client.exam');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    public function fileUpload()
    {
        return view('test.file');
    }

    public function singlefile(Request $request)
    {
        $file = $request->file('photo');
        $filename = 'profile-photo-' . time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('photos', $filename);

        echo "Sukses";
    }

    public function multiplefile(Request $request)
    {
        $files = $request->file('photo');

        $i = 1;
        foreach ($files as $file) {
            $extension = $file->getClientOriginalExtension();
            $filename  = 'profile-photo-'.$i.'-'. time() . '.' . $extension;
            $file->storeAs('photos', $filename);
            $i++;
        }

        echo "Sukses";
    }
}
