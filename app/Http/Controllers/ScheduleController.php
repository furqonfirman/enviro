<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Guzzle\Http\Exception\ClientErrorResponseException;

class ScheduleController extends Controller
{
    public function addSchedule(Request $request)
    {
        $accessToken = session('access_token');
        // Ganti URL dengan URL endpoint Spring Boot yang dilindungi oleh token
        $url = 'http://192.168.1.101:8181/admin/create-scheduling';

        $formData = [
            'companyName' => $request->input('companyName'),
            'workerName' => $request->input('workerName'),
            'data' => [
                'startContractPeriod' => $request->input('startContractPeriod'),
                'endContractPeriod' => $request->input('endContractPeriod'),
                'workingType' => $request->input('workingType'),
                'freq' => $request->input('freq'),
                'freqType' => $request->input('freqType'),
                'timeStart' => $request->input('timeStart'),
                'timeEnd' => $request->input('timeEnd'),
                'pic' => $request->input('pic'),
                'noTelpPic' => $request->input('noTelpPic'),
                'dateWorking' => $request->input('dateWorking'),
                // Add other details here
            ],
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
            $body = $response->getBody()->getContents();
            $statusCode = $response->getStatusCode();

            if ($statusCode === 200) {
                return view('module/schedule/index', ['body' => $body]);
            } else {
                return view('module/schedule/index', ['body' => $body]);
            }
            //return view('module/account/v_Addworker', compact('body'));

        } catch (RequestException  $e) {
            // Tangani pengecualian jika terjadi kesalahan
            return view('error', ['errorMessage' => $e->getMessage()]);
        }
    }

    public function searchData(Request $request)
    {
        $accessToken = session('access_token');

        // Make an HTTP request to the external API
        $client = new Client();
        $response = $client->get('http://192.168.1.101:8181/admin/search-worker');
        $body = $response->getBody()->getContents();
        return view('module/schedule/index', ['body' => $body]);
    }

    public function get_listSchedule()
    {
        // Ganti URL dengan URL endpoint Spring Boot yang dilindungi oleh token
        $url = 'http://192.168.1.101:8181/admin/get-all-schedule';

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
            return view('module/schedule/index', compact('data'));

        } catch (\Exception $e) {
            // Tangani pengecualian jika terjadi kesalahan
            return view('error', ['errorMessage' => $e->getMessage()]);
        }

    }
    public function getClient()
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
            $data = json_decode($response->getBody(), true);

            // Pass the data to the view
            return view('module/schedule/index', ['data' => $data]);

        } catch (\Exception $e) {
            // Tangani pengecualian jika terjadi kesalahan
            return view('error', ['errorMessage' => $e->getMessage()]);
        }

    }

    public function fetchData()
    {
        $client = new Client();
        
        try {
            $response = $client->get('http://192.168.1.101:8181/admin/search-worker');
            $data = json_decode($response->getBody(), true);
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
