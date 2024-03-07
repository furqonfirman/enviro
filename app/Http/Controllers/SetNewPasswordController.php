<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Guzzle\Http\Exception\ClientErrorResponseException;

class SetNewPasswordController extends Controller
{
    //
    public function showSendSetNew()
    {
        return view('auth/v_set_new_password');
    }
    public function set_new_password(Request $request)
    {
        $response = Http::put('http://192.168.1.101:8181/auth/set-password',[
                'email'=>$request->input('email'),
                'newPassword'=>$request->input('newPassword'),
                'otp'=>$request->input('otp'),
            ]);
            $statusCode = $response->status();
            $responseData = $response->json();
            if ($statusCode == 200) {
                // Redirect the user to another page
                return redirect('/set_new_password')->with('success', $responseData['data']);
                //return view('dashboard');
            }elseif ($statusCode == 404) {
                return redirect('/set_new_password')->with('errors', $responseData['errors']);
            }elseif ($statusCode == 400) {
                return redirect('/set_new_password')->with('errors', $responseData['errors']);
            }
    }
}
