<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    // get all Order detail
    public function index(Request $request)
    {

        $status = "Success";
        $resp = 200;

        $counTotal = Order::count();
        $customers = Order::select(
            'userId',
            'packageId',
            'name',
            'lastname',
            'prefix',
            'govermentId',
            'sub_district',
            'district',
            'provience',
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

    // get Order detail by user id
    public function show($userId)
    {
        //
        $status = "Success";
        $resp = 200;
        $order = Order::find($userId);

        return response()
            ->json([
                "status_PHPHPHP" => $status,
                "response" => $resp,
                "data" => $customer,
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
        $pdf = Pdf::loadView('invoice');
        return $pdf->download('invoice.pdf');
//        $customers=Customer::all()->toArray();
        // dd($customers);
        // $pdf = Pdf::loadView('pdf.invoice', $data);

    }

    public function sendEmailPdf(Request $request){

        // post data to data base
        $datas = $request->all();
        Order::create($datas);
        // dd($request->email);

        // Generate PDF
        $pdf = Pdf::loadView('invoice',[
            "data"=>$request->all(),
        ]);

        // Send email with PDF
        $data['email'] = $request->email;
        $data['title'] = "Your Package From Dhipaya";
        Mail::send('emails.registersendEmail', $data, function($message)use($data, $pdf) {
            $message->to( $data['email'])
                    ->subject($data["title"])
                    ->attachData($pdf->output(), "invoided.pdf");
        });
    }

}


