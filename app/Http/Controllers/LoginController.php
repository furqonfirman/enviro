<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Session;
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
    public function postlogin(Request $request)
    {
        // Retrieve credentials from the request
        $credentials = $request->only('email', 'password');

        // Create a Guzzle client
        $client = new Client();

        try {
            // Send POST request to login endpoint
            $response = $client->post('http://192.168.1.101:8181/auth/login', [
                'json' => $credentials,
            ]);
            // Get the response body
            $statusCode = $response->getStatusCode();
            //$responseData = $response->json();
            //$accessToken = $response['token'];
            //simpan dalam session
            //session(['access_token' => $accessToken]);
            if ($statusCode == 200) {
                return view('dashboard');
                //return redirect()->route('dashboard');
            }
             elseif ($statusCode == 404) {
                // Unauthorized, redirect back with error message
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
