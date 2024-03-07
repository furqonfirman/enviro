<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Guzzle\Http\Exception\ClientErrorResponseException;

class SendEmailController extends Controller
{
    //
    public function showSendEmail()
    {
        return view('auth/send_email');
    }
    public function get_OTP(Request $request)
    {
        //$http = new \GuzzleHttp\Client;
        //$email = $request->email;
        //$password = $request->password;
        $response = Http::put('http://192.168.1.101:8181/auth/regenerate-otp',[
                'email'=>$request->input('email'),
            ]);
            $statusCode = $response->status();
            $responseData = $response->json();
            if ($statusCode == 200) {
                // Redirect the user to another page
                return redirect('/verifikasi_email')->with('success', $responseData['success']);
                //return view('login');
                //return view('verifikasi_email')->with('$responseData', $data);
            }elseif ($statusCode == 404) {
                return redirect('/get_OTP')->with('errors', $responseData['errors']);
                //return view('login');
            }
            else{
                return redirect('/get_OTP')->with('errors', $responseData['errors']);
            }
    }
}
