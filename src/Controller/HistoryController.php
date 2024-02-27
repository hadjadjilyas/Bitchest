<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HistoryController extends AbstractController
{
    #[Route('/history', name: 'app_history')]
    public function index(): Response
    {
        // Replace these cryptocurrency UUIDs with the correct ones
        $cryptoUuids = [
            'BTC' => 'Qwsogvtv82FCd',
            'ETH' => 'razxDUgYGNAdQ',
            'XRP' => '-l8Mn2pVlRs-p',
            'ADA' => 'qzawljRxB5bYu',
            'BCH' => 'ZlZpzOJo43mIo',
            'LTC' => 'D7B1x_ks7WhV5',
            'XLM' => 'f3iaFeCKEmkaZ',
            'MIOTA' => 'LtWwuVANwRzV_',
            'DASH' => 'C9DwH-T7MEGmo',
            'XEM' => 'DZtb-6X8yCx0h',
        ];

        $priceHistories = [];

        foreach ($cryptoUuids as $cryptoName => $cryptoUuid) {
            $apiUrl = "https://coinranking1.p.rapidapi.com/coin/{$cryptoUuid}/history?referenceCurrencyUuid=yhjMzLPhuIDl&timePeriod=1y";

            $response = $this->makeApiRequest($apiUrl);

            // Check if the API request was successful
            if (!empty($response['data']['history'])) {
                $priceHistories[$cryptoName] = $response['data']['history'];
            }
        }

        return $this->render('history/index.html.twig', [
            'controller_name' => 'HistoryController',
            'priceHistories' => $priceHistories,
        ]);
    }

    // Helper function to make API requests
    private function makeApiRequest(string $apiUrl): array
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $apiUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: coinranking1.p.rapidapi.com",
                "X-RapidAPI-Key: c8035be1a9mshbe9a3ef3c4faab5p1e7608jsnab2b2b8a301d"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return ['error' => "cURL Error #: {$err}"];
        } else {
            return json_decode($response, true);
        }
    }
}
