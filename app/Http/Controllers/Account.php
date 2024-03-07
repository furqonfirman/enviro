<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Guzzle\Http\Exception\ClientErrorResponseException;
use Illuminate\Http\Request;

class Account extends Controller
{
    //
    public function register(Request $request)
    {
        $response = Http::post('http://192.168.1.101:8181/auth/register',[
                'email'=>$request->input('email'),
                'password'=>$request->input('password'),
                'role'=>$request->input('role'),
            ]);

            $statusCode = $response->status();
            $responseData = $response->json();
            if ($statusCode == 200) {
                // Redirect the user to another page
                return redirect('/register')->with('success', $responseData['message']);
                //return view('dashboard');
            }else if ($statusCode == 400){
                return redirect('/register')->with('error', $responseData['errors']);
            }
    }
}
