<?php

namespace App\Http\Controllers\Admin;

use App\Arendator;
use App\Http\Requests\ArendatorRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Artisan;
use  App\Client;
use Illuminate\Support\Str;
use GuzzleHttp\Client as GuzzleHttpClient;

class ClientController extends Controller
{
    public $oauthTokenUrl;

    public function __construct()
    {
      $this->oauthTokenUrl = env('APP_URL').'/oauth/token';
    }

    public function index(Request $request)
    {
        $clients = Client::paginate(20);
        return view('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function destroy($id)
    {
        Client::destroy($id);
        flash()->message('Успешно удален!')->success();

        return redirect()->back();
    }

    public function generateNewToken($id)
    {
        $guzzle = new GuzzleHttpClient();

        $client = Client::findOrFail($id);
        $response = $guzzle->post($this->oauthTokenUrl, [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => $client->id,
                'client_secret' => $client->secret,
                'scope' => '*',
            ],
        ]);

        $token = json_decode((string)$response->getBody(), true)['access_token'];

        return redirect()->back()->with('token', $token);

    }

    public function store(Request $request)
    {

        $client = Client::create([
            'name' => $request->get('name'),
            'secret' => Str::random(40),
            'redirect' => false,
            'personal_access_client' => false,
            'password_client' => false,
            'revoked' => false,
        ]);
        $guzzle = new GuzzleHttpClient();

        $response = $guzzle->post($this->oauthTokenUrl, [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => $client->id,
                'client_secret' => $client->secret,
                'scope' => '*',
            ],
        ]);

        $token = json_decode((string)$response->getBody(), true)['access_token'];

        flash()->message('Успешно !')->success();

        return redirect()->back()->with('token', $token);
    }

}
