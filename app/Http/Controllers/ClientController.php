<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Guzzle\Http\Exception\ClientErrorResponseException;
use App\Http\Controllers\LoginController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ClientController extends Controller
{
    //
    public function ShowDetailClientForm1()
    {
        return view('module/account/client');
    }

    public function Showlistclient()
    {
        $data = $this->get_list_client();
        return view('module/account/client', ['data' => $data]);
    }
    //
    public function get_list_client()
    {
        // Ganti URL dengan URL endpoint Spring Boot yang dilindungi oleh token
        $url = 'http://192.168.1.119:8181/admin/search-client';

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
            $data = json_decode($body, true);
            return view('module/account/client', compact('data'));

        } catch (\Exception $e) {
            // Tangani pengecualian jika terjadi kesalahan
            return view('error', ['errorMessage' => $e->getMessage()]);
        }

    }

    public function addDetailclient(Request $request)
    {
        $accessToken = session('access_token');
        // Ganti URL dengan URL endpoint Spring Boot yang dilindungi oleh token
        $url = 'http://192.168.1.119:8181/admin/create-detail-user';

        $formData = [
            'email' => $request->input('email'),
            'namaLengkap' => $request->input('namaLengkap'),
            'noTelp' => $request->input('noTelp'),
            'alamat' => $request->input('alamat'),
        ];
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken,
            'Accept' => 'application/json',
        ];

        // Buat objek Guzzle HTTP Client
        $client = new Client();
 
        try {
            // Buat permintaan GET dengan menyertakan token akses di header
            $response = $client->post($url, [
                'headers' =>  $headers,
                'json' => $formData,
            ]);
            // Ambil body dari respons
            $statusCode = $response->getStatusCode();
            $responseData = $response->getBody()->getContents();
            $errorMessage = $response->getBody()->getContents();
            $message = $response->getReasonPhrase();
            //$responseData = json_decode($responseBody, true);
            if ($statusCode == 200) {
                return view('module/account/v_Addclient', ['responseData' => $responseData]);   
            }

        } catch (RequestException  $e) {
            // Tangani pengecualian jika terjadi kesalahan
            if ($e->hasResponse()) {
                $response = $e->getResponse();
                //$statusCode = $response->getStatusCode();
                $errorMessage = $response->getBody()->getContents();
                //return response()->json(['error' => $errorMessage]);
                //$message = $response->getReasonPhrase();
                //return redirect()->back()->with('error', $errorMessage['error']);
                return view('module/account/v_Addclient', ['errorMessage' => $errorMessage]);
                // Handle error response
            } else {
                // Handle other exceptions (e.g., network errors)
                $errorMessage = $e->getMessage();
            }
        }
    }

    public function show($email)
    {
        $accessToken = session('access_token');
        $client = new Client();

        try {
            $response = $client->get('http://192.168.1.119:8181/admin/get-detail-by-email?email=' . urldecode($email));
            $detail = json_decode($response->getBody()->getContents(), true);
            if ($statusCode == 200) {
                return view('welcome', ['detail' => $detail]);   
            }

            //return view('welcome', compact('detail'));
        } catch (\Exception $e) {
            // Handle request exceptions (e.g., HTTP errors)
            return 'An error occurred: ' . $e->getMessage();
        }
    }

    //upload image contract
    public function upload(Request $request)
    {
        $accessToken = session('access_token');
        $client = new Client();

        try {
            $response = $client->request('POST', 'http://192.168.1.119:8181/admin/upload-file?companyName=PT Client', [
                'multipart' => [
                    [
                        'name'     => 'file',
                        'contents' => fopen($request->file('file')->getPathname(), 'r'), // Get file from request
                        'filename' => $request->file('file')->getClientOriginalName() // Use original filename
                    ],
                    // Add any additional form fields if required
                    // [
                    //     'name'     => 'field_name',
                    //     'contents' => 'field_value'
                    // ]
                ]
            ]);

            // Handle the response
            $responseData = $response->getBody()->getContents();
            return view('module/account/v_detailProfile', ['response' => $responseData]);
        } catch (RequestException $e) {
            // Handle request exceptions
            return view('module/account/v_detailProfile', ['error' => $e->getMessage()]);
        }
    }

    public function edit($email)
    {
        $accessToken = session('access_token');
        try {
            $response = Http::get("http://192.168.1.119:8181/admin/get-detail-by-email?email={$email}");

            if ($response->successful()) {
                $userData = $response->json();
                return view('module/account/v_Editclient')->with('userData', $userData);
            } else {
                return redirect()->back()->with('error', 'Failed to fetch user data for editing');
            }
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while processing the request');
        }
    }

    public function toggleStatus(Request $request, $id)
    {
        $accessToken = session('access_token');
        $client = new Client();

        try {
            $response = $client->post('http://your-api-url/users/' . $id . '/toggle-status', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $request->bearerToken(),
                    'Accept' => 'application/json',
                ]
            ]);

            // Handle successful response
            return redirect()->back()->with('success', 'User status updated successfully');
        } catch (\Exception $e) {
            // Handle error
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function getby($id)
    {
        $accessToken = session('access_token');
        $client = new Client();

        try {
            $response = $client->post('http://your-api-url/users/' . $email, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $request->bearerToken(),
                    'Accept' => 'application/json',
                ]
            ]);

            if ($response->successful()) {
                // Handle successful response
                $data = $response->json();

                return response()->json($data);
            }
        } catch (\Exception $e) {
            // Handle error
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
 