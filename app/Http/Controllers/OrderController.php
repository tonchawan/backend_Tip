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

        $counTotal = Order::count(); //count how many order we hava
        $customers = Order::select(  // Select what can be visaulize
            'id',
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
            'OrderStatus',
            'created_at',
            'updated_at'
        )->orderBy('id')->skip(0)->take(10)->get();

        // When API is request it will return in Json
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

        $status = "Success";
        $resp = 200;

        // use where to find user id
        $order = Order::where('userId',$userId)->get();
        // dd($order);
        return response()
            ->json([
                "status_PHPHPHP" => $status,
                "response" => $resp,
                "data" => $order,
            ], $resp);
    }

    // delete order from data base
    public function destroy($id)
    {
        $status = "Success";
        $resp = 200;
        $order = Order::find($id);

        if ($order) {
            $order->delete();
        } else {
            $status = "Error";
            $resp = 400;
        }
        return response()->json([
            "status_PHPHPHP" => $status,
            "response" => $resp,
        ], $resp);
    }



    //Down load PDF
    public function loadPdf(){
        $data=[];
        $pdf = Pdf::loadView('invoice');
        return $pdf->download('invoice.pdf');
    }

/////////////////////////////////////////////////////Buy order///////////////////////////////////////

    // Create buy order in database
    public function store(Request $request)
    {
        $status = "Success";
        $resp = 200;
        // dd($request);

        $datas = $request->all();

        Order::create($datas)
        // after Create order update user status
            ->update(['OrderStatus' => 1]);
        // dd($request->email);

        // Generate PDF
        $pdf = Pdf::loadView('invoice',[
            "data"=>$request->all(),
        ]);

        $data['email'] = $request->email;
        $data['title'] = "Your Package From Dhipaya";
        Mail::send('emails.pdf', $data, function($message)use($data, $pdf) {
            $message->to( $data['email'])
                    ->subject($data["title"])
                    ->attachData($pdf->output(), "invoided.pdf");
        });

        return response()
        ->json([
            "status_PHPHPHP" => $status,
            "response" => $resp,
            "data" => $request->all()
        ], $resp);

    }

     // Update buy order in database
    public function update(Request $request, $id){
        $status="Success";
        $resp= 200;
        $order = Order::find($id);

        if($order){
            $order->update($request->all());

        // Generate PDF
        $pdf = Pdf::loadView('invoice',[
            "data"=>$request->all(),
        ]);
        // return $pdf->download('invoice.pdf');  // check that pdf is working

        // Send email with PDF
        $data['email'] = $request->email;
        $data['title'] = "Your Package From Dhipaya";
        Mail::send('emails.pdf', $data, function($message)use($data, $pdf) {
            $message->to( $data['email'])
                    ->subject($data["title"])
                    ->attachData($pdf->output(), "invoided.pdf");
        });

        // force what ever input come. Change it to 1
        Order::find($id)
        ->update(['OrderStatus' => 1]);

        }else{
            $status = "Error";
            $resp = 400;
        }
        return response() ->json([
            "status_PHPHPHP"=>$status,
            "response"=>$resp,
            "data" =>$order
        ],$resp);
    }

/////////////////////////////////////////////////////save draf order///////////////////////////////////////

    // Create safe draf data to data base
    public function saveDraf(Request $request){

        $status = "Success";
        $resp = 200;
        // dd($request);

        // post data to data base and update Order status to 0
        $datas = $request->all();
        Order::create($datas)->update(['OrderStatus' => 0]);
        return response()
        ->json([
            "status_PHPHPHP" => $status,
            "response" => $resp,
            "data" => $request->all()
        ], $resp);
        // dd($request->all());

    }

    // update data to data base
    public function updateDraf(Request $request, $id){
        $status="Success";
        $resp= 200;
        $order = Order::find($id);

        if($order){
            $order->update($request->all());
        }else{
            $status = "Error";
            $resp = 400;
        }

        // force what ever input come. Change it to 0
        Order::find($id)
        ->update(['OrderStatus' => 0]);

        return response() ->json([
            "status_PHPHPHP"=>$status,
            "response"=>$resp,
            "data" =>$order
        ],$resp);
    }

}


