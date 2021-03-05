<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pajak;
use App\item;
use App\PajakItem;
use Illuminate\Support\Facades\Validator;

class PajakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = pajak::get();
        $response = array(
            "data" => $data
        );
        return response()->json($response);
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

        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:255',
            'rate' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        try {
            $pajak = pajak::create([
                'rate' => $request->rate,
                'nama' => $request->nama,
            ]);
            $pajak->save();
        } catch (Exception $e) {
            throw $e;  
        }

        return response()->json('Pajak Saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pajak = pajak::find($id);
        if(!empty($pajak)) {

            $response = array(
                "data" => $pajak
            );
        } else {
            $response = array(
                "data" => 'tidak ada'
            );
        }
        return response()->json($response); 
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
        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:255',
            'rate' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $pajak = pajak::find($id);
        try {
            $pajak->rate = $request->rate;
            $pajak->nama = $request->nama;
            $pajak->save();
        } catch (Exception $e) {
            throw $e;
        }
        return response()->json('Pajak Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pajak = pajak::find($id);
        if (!empty($pajak)){
            try {
                $pajak->delete();
            } catch (Exception $e) {
                throw $e;
            }
        } else {
            return response()->json('Pajak Not Found');
        }
        return response()->json('Pajak Deleted!');
    }
}
