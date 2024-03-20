<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Guzzle\Http\Exception\ClientErrorResponseException;

class OtpEmailController extends Controller
{
    //
    public function showSendotp()
    {
        return view('auth/otp_email');
    }
    public function verifikasi_email(Request $request)
    {
        $response = Http::put('http://192.168.1.101:8181/auth/verifikasi',[
                'email'=>$request->input('email'),
                'otp'=>$request->input('otp'),
            ]);
            $statusCode = $response->status();
            $responseData = $response->json();
            if ($statusCode == 200) {
                // Redirect the user to another page
                return redirect('/')->with('success', $responseData['data']);
                //return view('dashboard');
            }elseif ($statusCode == 404) {
                return redirect('/verifikasi_email')->with('error', $responseData['errors']);
            }
            else{
                return view('_layout/otp_email');
            }
    }
}
