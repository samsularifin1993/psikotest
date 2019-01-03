<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KategoriSoal;

class KategoriSoalController extends Controller
{
    public function __construct(Request $request){
        // if($request->session()->get('user_level') == 'admin'){
        //     return redirect('home');  
        // }
        
    }

    public function index()
    {
        $data_list = KategoriSoal::all();
        return view('admin.kategori_soal', compact('data_list'));
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
        $validator = $this->validate($request,[
            'kategori' => 'required',
            'durasi' => 'required',
            'waktu_mulai' => 'required',
        ]);

        if ($validator->passes()) {
			return response()->json([
                'result'=>'Added new records.',
                'errors' => ''
            ], 200);
        }

        //$validator->errors()->all();

        return response()->json([
            'result' => $validator->errors()->all(),
            'errors' => $validator->getMessageBag()->toArray()
        ], 200);
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
        $data_kategori = KategoriSoal::find($id);
        return response()->json([
            'fail' => false,
            'data_list' => $data_kategori]
        , 200);
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
        return response()->json([
            'result' => $request->ajax()]
        , 200);
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
