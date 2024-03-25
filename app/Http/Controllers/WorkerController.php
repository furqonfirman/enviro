<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Guzzle\Http\Exception\ClientErrorResponseException;


class WorkerController extends Controller
{
    private $menu;

    public function __construct()
    {
        //$this->middleware('auth');
        $this->menu = 'worker';  
    }
    public function showWorkerForm()
    {
        return view('module/account/v_Addworker');
    }
    public function showEditWorkerForm()
    {
        return view('module/account/v_Editworker');
    }

    public function showDetail($id)
    {
    $client = new Client();
    $response = $client->get('https://api.example.com/details/' . $id);

        // Check if the request was successful
        if ($response->getStatusCode() === 200) {
            $detail = json_decode($response->getBody(), true);
            return view('details.show', ['detail' => $detail]);
        } else {
            // Handle error response
            return response('Failed to fetch detail data.', 500);
        }
    }

    public function show($id)
    {
        $accessToken = session('access_token');
        $client = new Client();
        $response = $client->get('http://192.168.1.119:8181/admin/search-worker' . $id);

        // Check if the request was successful
        if ($response->getStatusCode() === 200) {
            $detail = json_decode($response->getBody(), true);
            return view('module/account/v_Editworker', ['detail' => $detail]);
        } else {
            // Handle error response
            return response('Failed to fetch detail data.', 500);
        }
    }

    public function update(Request $request, $id)
    {
        $client = new Client();
        $response = $client->put('http://192.168.1.119:8181/admin/update-detail-user' . $id, [
            'json' => $request->all(),
        ]);

        // Check if the request was successful
        if ($response->getStatusCode() === 200) {
            // Handle success response
            return response('Data updated successfully.', 200);
        } else {
            // Handle error response
            return response('Failed to update data.', $response->getStatusCode());
        }
    }
    //
    public function get_list_worker()
    {
        // Ganti URL dengan URL endpoint Spring Boot yang dilindungi oleh token
        $url = 'http://192.168.1.119:8181/admin/search-worker';

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
            return view('module/account/worker', compact('data'));

        } catch (\Exception $e) {
            // Tangani pengecualian jika terjadi kesalahan
            return view('error', ['errorMessage' => $e->getMessage()]);
        }

    }

    public function addDetailworker(Request $request)
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
                return view('module/account/v_Addworker', ['responseData' => $responseData]);   
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
                return view('module/account/v_Addworker', ['errorMessage' => $errorMessage]);
                // Handle error response
            } else {
                // Handle other exceptions (e.g., network errors)
                $errorMessage = $e->getMessage();
            }
        }
    }
}
