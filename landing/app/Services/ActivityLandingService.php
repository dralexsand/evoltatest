<?php

namespace App\Services;

use GuzzleHttp\Client;
use HTTP_Request2;
use HTTP_Request2_Exception;

class ActivityLandingService
{

    public function storeActivity(string $page)
    {
        $data = [
            "jsonrpc" => "2.0",
            "method" => "activity@handle",
            "url" => $page,
            "id" => 1
        ];

        //self::PostDataByEndPoint("visits", $data);

        $res = self::postApi3();
        return $res;
    }

    public static function postApi(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://127.0.0.1:8099/api/v1/visits',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{"jsonrpc": "2.0","method": "activity@handle","url": "home","id": 1}',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer I0NS2UZpKCpefeC739givHVRvbwiYGASPLcpk2uUh2JudJSH4FqFi4FrlF67vZS3KpXZDudcoqBPbQXk',
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }

    public static function postApi3(){

        $request = new HTTP_Request2('http://127.0.0.1:8099/api/v1/visits', HTTP_Request2::METHOD_POST);
        $request->setHeader(array(
            'Authorization' => 'Bearer I0NS2UZpKCpefeC739givHVRvbwiYGASPLcpk2uUh2JudJSH4FqFi4FrlF67vZS3KpXZDudcoqBPbQXk',
            'Content-Type' => 'application/json'
        ));
        $request->setBody('{"jsonrpc": "2.0","method": "activity@handle","url": "home","id": 1}');
        try {
            $response = $request->send();
            if (200 == $response->getStatus()) {
                echo $response->getBody();
            } else {
                echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
                    $response->getReasonPhrase();
            }
        } catch (HTTP_Request2_Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public static function postApi2()
    {
        $request = new HTTP_Request2();
        $request->setUrl('http://127.0.0.1:8099/api/v1/visits');
        $request->setMethod(HTTP_Request2::METHOD_POST);
        $request->setConfig(array(
            'follow_redirects' => true
        ));
        $request->setHeader(array(
            'Authorization' => 'Bearer I0NS2UZpKCpefeC739givHVRvbwiYGASPLcpk2uUh2JudJSH4FqFi4FrlF67vZS3KpXZDudcoqBPbQXk',
            'Content-Type' => 'application/json'
        ));
        $request->setBody('{"jsonrpc": "2.0","method": "activity@handle","url": "home","id": 1}');
        try {
            $response = $request->send();
            if ($response->getStatus() == 200) {
                return $response->getBody();
            } else {
                return 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
                    $response->getReasonPhrase();
            }
        } catch (HTTP_Request2_Exception $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    public static function postApi1()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'rpc://127.0.0.1:8099/api/v1/visits',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
    "jsonrpc": "2.0",
    "method": "activity@handle",
    "url": "home",
    "id": 3
}',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer I0NS2UZpKCpefeC739givHVRvbwiYGASPLcpk2uUh2JudJSH4FqFi4FrlF67vZS3KpXZDudcoqBPbQXk',
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }


    public static function getHttpHeaders()
    {
        $bearerToken = config('api.api_token');

        $headers = [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $bearerToken,
            ],
            'http_errors' => false,
        ];

        return $headers;
    }

    public static function GetDataByEndPoint($endPoint)
    {
        $baseApiUrl = config('api.base_url');
        $url = $baseApiUrl . $endPoint;
        $client = new \GuzzleHttp\Client(self::getHttpHeaders());
        $response = $client->get($url, ['verify' => false]);

        $resp['statusCode'] = $response->getStatusCode();
        $resp['bodyContents'] = $response->getBody()->getContents();
        return $resp;
    }

    public static function PostDataByEndPoint($endPoint, $body)
    {
        $baseApiUrl = config('api.base_url');
        $url = $baseApiUrl . $endPoint;
        $client = new \GuzzleHttp\Client(self::getHttpHeaders());
        $request = $client->request('POST', $url, $body);
        $response = $request->getBody()->getContents();
        return $response;
    }


    public function guzzlePost($url)
    {
        $client = new \GuzzleHttp\Client();
        $myBody['name'] = "Demo";
        $request = $client->post($url, ['body' => $myBody]);
        return $request->send();
    }

    public function guzzleGet($url)
    {
        $client = new \GuzzleHttp\Client();
        $request = $client->get($url);
        return $request->getBody();
    }


}
