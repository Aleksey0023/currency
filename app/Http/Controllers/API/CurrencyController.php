<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;


class CurrencyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function getCurrency(): JsonResponse
    {
        // Retrieve start and end dates from the request
        $startDate = request('date_start');
        $endDate = request('date_end');

        $currencies = [
            'USD' => 'R01235',
            'EUR' => 'R01239',
            'CNY' => 'R01375',
        ];

        $rates = [];

        foreach ($currencies as $currency => $code) {
            $url = "https://cbr.ru/scripts/XML_dynamic.asp?date_req1=$startDate&date_req2=$endDate&VAL_NM_RQ=$code";
            $xml = simplexml_load_file($url);
            $rates[$currency] = $xml;
        }

        // Return the exchange rate data as a JSON response
        return response()->json($rates);
    }
}

