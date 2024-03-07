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
    public function showClientForm()
    {
        return view('module/account/v_Addclient');
    }
    //
    public function ShowDetailClientForm()
    {
        return view('welcome');
    }
    //
    public function get_detail_client()
    {
        // Ganti URL dengan URL endpoint Spring Boot yang dilindungi oleh token
        $url = 'http://192.168.1.101:8181/admin/get-all-by-role?role=CLIENT';

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

            // Lakukan sesuatu dengan nilai body
            return view('module/account/client', ['body' => $body]);

        } catch (\Exception $e) {
            // Tangani pengecualian jika terjadi kesalahan
            return view('error', ['errorMessage' => $e->getMessage()]);
        }

    }
}
