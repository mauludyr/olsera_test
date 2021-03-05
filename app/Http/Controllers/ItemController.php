<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pajak;
use App\item;
use App\PajakItem;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = item::get();
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
            'pajak1' => 'required|integer',
            'pajak2' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        try {
            $item = item::create([
                'nama' => $request->nama,
            ]);
            $item->save();
            $item->pajak()->attach([$request->pajak1,$request->pajak2]);
        } catch (Exception $e) {
            throw $e;  
        }

        return response()->json('Item Saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = item::find($id);
        if(!empty($item)) {

            $response = array(
                "data" => $item
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
            'pajak1' => 'required|integer',
            'pajak2' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $item = item::with('pajak')->find($id);
        if (!empty($item)) {
            try {
                $item->nama = $request->nama;
                $item->pajak()->detach();
                $item->pajak()->attach([$request->pajak1,$request->pajak2]);
                $item->save();
            } catch (Exception $e) {
                throw $e;
            }
        } else {
            return response()->json('Item Not Found');
        }
        return response()->json('Item Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = item::with('pajak')->find($id);
        if (!empty($item)){
            try {
                $item->pajak()->detach();
                $item->delete();
            } catch (Exception $e) {
                throw $e;
            }
        } else {
            return response()->json('Item Not Found');
        }
        return response()->json('Item Deleted!');
    }
}
