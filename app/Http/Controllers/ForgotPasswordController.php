<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Guzzle\Http\Exception\ClientErrorResponseException;

class ForgotPasswordController extends Controller
{
    //
    public function showSendForgot()
    {
        return view('auth/v_forgot_password');
    }
    public function forgot_password(Request $request)
    {
        $response = Http::put('http://192.168.1.101:8181/auth/forgot-password',[
                'email'=>$request->input('email'),
            ]);
            $statusCode = $response->status();
            $responseData = $response->json();
            if ($statusCode == 200) {
                // Redirect the user to another page
                return redirect('/set_new_password')->with('data', $responseData['data']);
                //return view('dashboard');
            }elseif ($statusCode == 404) {
                return redirect('/forgot_password')->with('error', $responseData['errors']);
            }
    }
}
