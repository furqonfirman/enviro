<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Guzzle\Http\Exception\ClientErrorResponseException;

class WorkerController extends Controller
{
    public function showWorkerForm()
    {
        return view('module/account/v_Addworker');
    }
    public function showEditWorkerForm()
    {
        return view('module/account/v_Editworker');
    }
    //
    public function post_detail_worker(Request $request)
    {
        $response = Http::post('http://192.168.1.101:8181/admin/detail-worker',[
                'email'=>$request->input('email'),
                'namaLengkap'=>$request->input('namaLengkap'),
                'noTelp'=>$request->input('noTelp'),
                'alamat'=>$request->input('alamat'),
            ]);
            $statusCode = $response->status();
            $responseData = $response->json();
            if ($statusCode == 200) {
                // Redirect the user to another page
                return redirect('/post_detail_worker')->with('success', $responseData['message']);
                //return view('dashboard');
            }else if ($statusCode == 400){
                return redirect('/post_detail_worker')->with('errors', $responseData['errors']);
            }
    }
}
