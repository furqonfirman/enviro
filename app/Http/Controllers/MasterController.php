<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Guzzle\Http\Exception\ClientErrorResponseException;
use App\Http\Controllers\LoginController;

class MasterController extends Controller
{
    public function get_list_role()
    {
        // Ganti URL dengan URL endpoint Spring Boot yang dilindungi oleh token
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
            $data = json_decode($body, true);
            return view('master/v_role', compact('data'));

        } catch (\Exception $e) {
            // Tangani pengecualian jika terjadi kesalahan
            return view('error', ['errorMessage' => $e->getMessage()]);
        }

    }

    public function get_list_workingType()
    {
        // Ganti URL dengan URL endpoint Spring Boot yang dilindungi oleh token
        $url = 'http://192.168.1.101:8181/admin/get-working-type';

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
            return view('master/v_workingType', compact('data'));

        } catch (\Exception $e) {
            // Tangani pengecualian jika terjadi kesalahan
            return view('error', ['errorMessage' => $e->getMessage()]);
        }

    }

    public function get_list_freqType()
    {
        // Ganti URL dengan URL endpoint Spring Boot yang dilindungi oleh token
        $url = 'http://192.168.1.101:8181/admin/get-freq-type';

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
            return view('master/v_freqType', compact('data'));

        } catch (\Exception $e) {
            // Tangani pengecualian jika terjadi kesalahan
            return view('error', ['errorMessage' => $e->getMessage()]);
        }

    }
}
