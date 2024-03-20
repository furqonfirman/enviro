<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Guzzle\Http\Exception\ClientErrorResponseException;
use App\Http\Controllers\LoginController;

class ClientController extends Controller
{
    //
    public function ShowDetailClientForm1()
    {
        return view('welcome');
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
        $url = 'http://192.168.1.101:8181/admin/search-client';

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
            return view('module/account/client', compact('body'));

        } catch (\Exception $e) {
            // Tangani pengecualian jika terjadi kesalahan
            return view('error', ['errorMessage' => $e->getMessage()]);
        }

    }

    public function post_detail_client(Request $request)
    {
        // Ganti URL dengan URL endpoint Spring Boot yang dilindungi oleh token
        $url = 'http://192.168.1.101:8181/admin/create-detail-user';

        $formData = [
            'email' => $request->input('email'),
            'namaPerusahaan' => $request->input('namaPerusahaan'),
            'noTelp' => $request->input('noTelp'),
            'alamat' => $request->input('alamat'),
        ];

        // Buat objek Guzzle HTTP Client
        $client = new Client();

        $accessToken = session('access_token');

        try {
            // Buat permintaan GET dengan menyertakan token akses di header
            $response = $client->post($url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                    'Accept' => 'application/json',
                ],
                'form_params' =>
                [
                    'json' => $formData,
                ],
            ]);

            // Ambil body dari respons
            $body = $response->getBody()->getContents();
            return view('v_addworker', compact('body'));

        } catch (RequestException  $e) {
            // Tangani pengecualian jika terjadi kesalahan
            return view('error', ['errorMessage' => $e->getMessage()]);
        }

    }

    public function showDetails($id)
    {
        $client = new Client();

        try {
            $response = $client->get('http://192.168.1.101:8181/admin/get-detail-by-email' . $id);
            $detail = json_decode($response->getBody()->getContents(), true);

            return view('module/account/v_detailWorker', compact('detail'));
        } catch (\Exception $e) {
            // Handle request exceptions (e.g., HTTP errors)
            return 'An error occurred: ' . $e->getMessage();
        }
    }
}
 