<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Guzzle\Http\Exception\ClientErrorResponseException;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth/register');
    }
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

    //get role
    public function get_role()
    {
        $url = 'http://192.168.1.101:8181/admin/get-role';

        // Buat objek Guzzle HTTP Client
        $client = new Client();

        $accessToken = session('access_token');

        try {
            // Buat permintaan GET dengan menyertakan token akses di header
            $response = $client->get($url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                    'Accept' => 'application/json', // Sesuaikan dengan tipe konten yang diharapkan
                ],
            ]);

            // Ambil body dari respons
            $body = $response->getBody()->getContents();
            return view('register', compact('body'));

        } catch (\Exception $e) {
            // Tangani pengecualian jika terjadi kesalahan
            return view('error', ['errorMessage' => $e->getMessage()]);
        }
    }
}
