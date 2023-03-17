<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\Pdf;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PackgesController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $status = "Success";
        $resp = 200;

        $counTotal = Package::count();
        $registers = Package::select(
            'id',
            'title',
            'premium',
            'insuranceDetail'
        )->orderBy('id')->skip(0)->take(10)->get();

        return response()->json([
            "status_PHPHPHP" => $status,
            "response" => $resp,
            "data" => $registers,
            "count" => $counTotal,
        ], $resp);
    }

    public function store(Request $request)
    {
        $status = "Success";
        $resp = 200;
        // dd($request);

        $datas = $request->all();


        Package::create($datas);
        return response()
            ->json([
                "status_PHPHPHP" => $status,
                "response" => $resp
            ], $resp);
    }
}
