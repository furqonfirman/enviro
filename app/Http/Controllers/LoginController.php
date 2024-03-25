<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Guzzle\Http\Exception\ClientErrorResponseException;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect('/dashboard');
        }else{
            return view('auth/login');
        }
    }

    public function _login(Request $request)
    {

        $response = Http::post('http://192.168.1.119:8181/auth/login',[
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
                return redirect()->route('dashboard')->with('success', $responseData['message']);
                //return redirect('/dashboard')->with('success', $responseData['message']);
                //return redirect()->route('dashboard')->with('success', $responseData['message']);
                //return view('dashboard');
            }elseif ($statusCode == 403) {
                //return redirect()->back()->with('error', $responseData['error']);
                return redirect('/get_OTP')->with('error', $responseData['error']);
                //return view('auth/login', ['responseData' => $responseData]);
            }
            elseif ($statusCode == 401) {
                return redirect()->back()->with('error', $responseData['error']);
            }
            elseif ($statusCode == 404){
                return redirect()->back()->with('error', $responseData['error']);
            }
            else{
                return view('/');
            }
    }
    
    public function logout() 
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
