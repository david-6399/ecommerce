<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class formContoller extends Controller
{
   public function fillForm()
{
    $url = 'https://hallalife.youcan.store/products/toothbrush';

    $formData = [
        'first_name' => 'LaravelTest',
        'phone' => '0699856399',
    ];

    $client = new Client();

    try {
        // Log the data being sent
        logger()->info('Form data being sent:', $formData);

        // Send POST request
        $response = $client->post($url, [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/x-www-form-urlencoded',
            ],
            'form_params' => $formData,
            'verify' => base_path('storage/certs/cacert.pem'),
        ]);

        // Parse and log the server response
        $responseBody = $response->getBody()->getContents();
        logger()->info('Server response:', ['response' => $responseBody]);

        // Return the response to the frontend
        return response()->json(['success' => true, 'response' => $responseBody]);
    } catch (\Exception $e) {
        // Log the error
        logger()->error('Request failed:', ['exception' => $e->getMessage()]);

        // Return the error to the frontend
        return response()->json(['success' => false, 'error' => $e->getMessage()]);
    }
}

}
