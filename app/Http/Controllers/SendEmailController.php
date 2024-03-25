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
        $response = Http::put('http://192.168.1.57:8181/auth/regenerate-otp',[
                'email'=>$request->input('email'),
            ]);
            $statusCode = $response->status();
            $responseData = $response->json();
            if ($statusCode == 200) {
                //return view('auth/otp_email', ['data' => $data]);
                //return view('auth/otp_email', compact('body'));
                //eturn view('auth/otp_email')->with('responseBody', $body);
                return redirect('/verifikasi_email')->with('email', $responseData['email']);
                //return redirect()->route('verifikasi_email')->with('responseData', $responseData);
            }
            else{
                return redirect()->back()->with('error', $responseData['error']);
            }
    }
}
