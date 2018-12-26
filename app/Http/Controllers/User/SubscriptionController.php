<?php

namespace App\Http\Controllers\User;

// use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use GuzzleHttp\Message\Request;
use GuzzleHttp\Message\Response;

class SubscriptionController extends Controller
{
  public function __construct()
  {
    // auth : unutk mengecek auth
    // gate : unutk mengecek apakah sudah membuat Organization
    // getSubscription : unutk mengecek subscription Organization
      // $this->middleware(['auth', 'gate', 'get.subscription']);
      $this->API = "http://127.0.0.1:8000/api/";
  }

  public function Index()
  {
    // $data['obat'] = json_decode($this->curl->simple_get($this->API.'/subscription/'));
    // dd($data);

    $endpoint = "http://127.0.0.1:8000/api";
    // $endpoint = "https://jsonplaceholder.typicode.com/posts/1";
    // $endpoint = "http://my.domain.com/test.php";
    $client = new Client();
    // $id = 5;
    // $value = "ABC";

    $res = $client->request('GET', $endpoint."/subscription");
    // dd($res);
    // url will be: http://my.domain.com/test.php?key1=5&key2=ABC;

    $statusCode = $res->getStatusCode();
    $content = $res->getBody();
    // or when your server returns json
    $data = json_decode($content, true);
    dd($data);

    return view('in',
    [
      'subscriptions' => $data
      // 'payment' => $payment,
      // 'organization' => $organization
    ]);
  }
}
