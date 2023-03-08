<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function index(Request $request)
    {

        $status = "Success";
        $resp = 200;

        $counTotal = Order::count();
        $customers = Order::select(
            'userId',
            'name',
            'lastname',
            'prefix',
            'govermentId',
            'address',
            'email',
            'dob',
            'startDate',
            'endDate',
            'beneficial',
            'created_at',
            'updated_at'
        )->orderBy('id')->skip(0)->take(10)->get();

        return response()->json([
            "status_PHPHPHP" => $status,
            "response" => $resp,
            "data" => $customers,
            "count" => $counTotal,
        ], $resp);
    }

    public function store(Request $request)
    {
        $status = "Success";
        $resp = 200;
        // dd($request);

        $hashPassword = bcrypt($request->password);
        $datas = $request->all();


        Order::create($datas);
        return response()
        ->json([
            "status_PHPHPHP" => $status,
            "response" => $resp
        ], $resp);
        // $email = $request->email;
        // Mail::to($email)->send(new RegistersendEmail($request->username, $request->password));
    }

    public function loadPdf(){
        $data=[];
//        $customers=Customer::all()->toArray();
        // dd($customers);
        $pdf = Pdf::loadView('pdf.index');
        // $pdf = Pdf::loadView('pdf.invoice', $data);
        return $pdf->download('invoice.pdf');

    }



}
