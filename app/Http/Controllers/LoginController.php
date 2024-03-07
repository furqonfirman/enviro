<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Guzzle\Http\Exception\ClientErrorResponseException;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth/login');
    }
    public function login(Request $request)
    {

        $response = Http::post('http://192.168.1.101:8181/auth/login',[
                'email'=>$request->input('email'),
                'password'=>$request->input('password'),
            ]);

            $statusCode = $response->status();
            $responseData = $response->json();

            // token
            $accessToken = $response['token'];

            //simpan dalam session
            session(['access_token' => $accessToken]);

            if ($statusCode == 200) {
                return view('dashboard', ['responseData' => $responseData]);
                return redirect()->route('\dashboard');
                // Redirect the user to another page
                //return redirect('/dashboard')->with('success', $responseData['message']);
                //return view('dashboard');
            }elseif ($statusCode == 400) {
                return view('dashboard', ['responseData' => $responseData]);
            }
            elseif ($statusCode == 401) {
                return view('dashboard', ['responseData' => $responseData]);
            }
            elseif ($statusCode == 404){
                return view('dashboard', ['responseData' => $responseData]);
            }
            else{
                return view('auth/login');
            }
    }
}
