<?php

namespace App\Controller;

use App\Entity\Crypto;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiCryptoController extends AbstractController
{
    #[Route('/api/crypto', name: 'app_api_crypto')]
    public function fetchData(EntityManagerInterface $entityManager): Response
    {
        $allowedCryptoSymbols = ['BTC', 'ETH', 'XRP', 'BCH', 'ADA', 'LTC', 'XEM', 'XLM', 'MIOTA', 'DASH'];
        $cryptoSymbolsQuery = implode(',', $allowedCryptoSymbols);

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://coinranking1.p.rapidapi.com/coins?referenceCurrencyUuid=yhjMzLPhuIDl&timePeriod=24h&tiers%5B0%5D=1&orderBy=marketCap&orderDirection=desc&limit=10&offset=0&symbols={$cryptoSymbolsQuery}",
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
            return $this->render('error.html.twig', ['error' => "cURL Error #:" . $err]);
        } else {
            // Convert the JSON response to an associative array
            $data = json_decode($response, true);

            // Check if the status is 'success'
            if ($data['status'] === 'success') {
                // Loop through the cryptocurrency data and persist it to the database
                foreach ($data['data']['coins'] as $coinData) {
                    $crypto = new Crypto();
                    $crypto->setName($coinData['name']);
                    $crypto->setSymbol($coinData['symbol']);
                    $crypto->setPrice($coinData['price']);
                    $crypto->setCours($coinData['cours'] ?? null);

                    // Persist the object to the database
                    $entityManager->persist($crypto);
                }

                // Flush changes to the database
                $entityManager->flush();

                // Render the index.html.twig template with the data
                return $this->render('api_crypto/index.html.twig', ['data' => $data['data']]);
            } else {
                // If not successful, render an error template or handle it accordingly
                return $this->render('error.html.twig', ['error' => 'API request failed.']);
            }
        }
    }
}
