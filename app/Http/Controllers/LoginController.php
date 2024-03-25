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

    public function postlogin(Request $request)
    {
        // Retrieve credentials from the request
        $credentials = $request->only('email', 'password');

        // Create a Guzzle client
        $client = new Client();

        try {
            // Send POST request to login endpoint
            $response = $client->post('http://192.168.1.119:8181/auth/login', [
                'json' => $credentials,
            ]);
            // Get the response body
            $body = json_decode($response->getBody(), true);
            //simpan dalam session
            session(['access_token' => $accessToken]);
            if ($statusCode == 200) {
                return view('dashboard');
                //return redirect()->route('dashboard');
            }
             elseif ($statusCode == 404) {
                //return redirect()->back()->with('error', $responseData['error']);
                return Redirect::back()->withErrors(['msg' => 'The Message']);
            } else {
                // Handle other status codes as needed
                return redirect()->route('login')->with('error', 'An error occurred.');
            }
        } catch (RequestException $e) {
            // Handle request exceptions (e.g., HTTP errors)
            if ($e->hasResponse()) {
                $statusCode = $e->getResponse()->getStatusCode();
                $errorMessage = $e->getResponse()->getBody()->getContents();
                $data = json_decode($errorMessage, true);
                if ($statusCode == 403) {
                    return redirect('/get_OTP')->with('error', $data['error']);
                }
                else {
                    return redirect('/')->with('error', $data['error']);
                }
            } else {
                return response()->json(['error' => 'An error occurred while processing your request.'], 500);
            }
        }
    }
    public function logout() 
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
