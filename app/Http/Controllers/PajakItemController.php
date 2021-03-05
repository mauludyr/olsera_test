<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pajak;
use App\item;
use App\PajakItem;


class PajakItemController extends Controller
{

    public function pajakitem(Request $request)
    {

        $data = item::with('pajak')->get();
        $response = array(
            "data" => $data
        );
        return response()->json($response);
    }
}
