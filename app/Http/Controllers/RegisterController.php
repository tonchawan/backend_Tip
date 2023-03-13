<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistersendEmail;
use Barryvdh\DomPDF\Facade\Pdf;

class RegisterController extends Controller
{
    public function index(Request $request)
    {

        $status = "Success";
        $resp = 200;

        $counTotal = Customer::count();
        $customers = Customer::select(
            'username',
            'password',
            'name',
            'lastname',
            'prefix',
            'address',
            'phone',
            'email',
            'registerId',
            'govermentId',
            'dateRegister',
            'packageId'
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
        $datas['password'] = $hashPassword;
        $email = $request->email;


        Customer::create($datas);
        Mail::to($email)->send(new RegistersendEmail($request->username, $request->password));
        return response()
            ->json([
                "status_PHPHPHP" => $status,
                "response" => $resp
            ], $resp);
    }

    public function show($id)
    {
        //
        $status = "Success";
        $resp = 200;
        $customer = Customer::find($id);

        return response()
            ->json([
                "status_PHPHPHP" => $status,
                "response" => $resp,
                "data" => $customer,
            ], $resp);
    }

    public function update(Request $request, $id)
    {
        //
        $status = "Success";
        $resp = 200;
        $customer = Customer::find($id);
        $request['password'] = bcrypt($request->password);

        if ($customer) {
            $customer->update($request->all());
        } else {
            $status = "Error";
            $resp = 400;
        }
        return response()->json([
            "status_PHPHPHP" => $status,
            "response" => $resp,
        ], $resp);
    }

    public function destroy($id)
    {
        $status = "Success";
        $resp = 200;
        $customer = Customer::find($id);

        if ($customer) {
            $customer->delete();
        } else {
            $status = "Error";
            $resp = 400;
        }
        return response()->json([
            "status_PHPHPHP" => $status,
            "response" => $resp,
        ], $resp);
    }

    // public function testEmail()
    // {
    //     $status = "Success";
    //     $resp = 200;
    //     $email = "tonchawan50@gmail.com";
    //     $password = "1234";
    //     Mail::to($email)->send(new RegistersendEmail($email, $password));
    // }

    public function checkPassword(Request $request)
    {
        $status = "Login Success";
        $resp = 200;
        $username = $request->username;
        $pass = $request->password;
        $customer = Customer::where('username', $username)->first();
        // dd($customer);
        if ($customer) {
            if (\Hash::check($pass, $customer->password)) {
                return response()->json([
                    "status" => $status,
                    "response" => $resp,
                ], $resp);
            } else {
                return response()->json([
                    "status" => "Wrong Password",
                    "response" => $resp,
                ], 401);
            }
        } else {

            return response()->json([
                "status" => "Not Found",
                "response" => $resp,
            ], 401);
        }
    }

    public function loadPdf(){
        $data=[];
//        $customers=Customer::all()->toArray();
        // dd($customers);
        $pdf = Pdf::loadView('invoice');
        // $pdf = Pdf::loadView('pdf.invoice', $data);
        return $pdf->download('invoice.pdf');

    }

    public function sendEmailPdf(){
        $datas = [];

        $customers = Customer::all()->toArray();

        $pdf = Pdf::loadView('invoice');
        $email = "tonchawan50@gmail.com";

        $data['email'] = $email;
        $data['title'] = "ทดสอบ";
        Mail::send('emails.registersendEmail', $data, function($message)use($data, $pdf) {
            $message->to($data["email"])
                    ->subject($data["title"])
                    ->attachData($pdf->output(), "invoided.pdf");
        });
    }

}
