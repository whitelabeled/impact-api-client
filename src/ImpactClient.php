<?php

namespace Whitelabeled\ImpactApiClient;

use DateTime;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class ImpactClient
{
    private string $accountSID;
    private string $authToken;

    protected string $endpoint = 'https://api.impact.com/';

    /**
     * Construct a new client
     */
    public function __construct(string $accountSID, string $authToken)
    {
        $this->accountSID = $accountSID;
        $this->authToken = $authToken;
    }

    /**
     * Get all transactions from $startDate until $endDate.
     *
     * @param DateTime $startDate Start date/time
     * @param DateTime $endDate End date/time
     * @return array Transaction objects. Each part of a transaction is returned as a separate Transaction.
     * @throws ImpactApiException|GuzzleException
     */
    public function getTransactions(DateTime $startDate, DateTime $endDate): array
    {
        $params = [
            'ActionDateStart' => $startDate->format(DateTime::ATOM),
            'ActionDateEnd' => $endDate->format(DateTime::ATOM),
        ];

        $query = '?' . http_build_query($params);
        $response = $this->makeRequest("Mediapartners/{$this->accountSID}/Actions", $query);

        $transactions = [];

        // Decode JSON response:
        $transactionsData = json_decode($response->getBody()->getContents(), true);

        if ($transactionsData == null) {
            throw new ImpactApiException('Invalid data (could not decode JSON)');
        }

        foreach ($transactionsData['Actions'] as $singleTransactionData) {
            $transaction = Transaction::createFromJson($singleTransactionData);
            $transactions[] = $transaction;
        }

        return $transactions;
    }

    /**
     * @param $resource
     * @param string $query
     * @return ResponseInterface
     * @throws ImpactApiException
     * @throws GuzzleException
     */
    protected function makeRequest($resource, $query = ""): \Psr\Http\Message\ResponseInterface
    {
        $uri = $this->endpoint . $resource;

        $client = new Client();
        $response = $client->request('GET', $uri . $query, [
            'auth' => [$this->accountSID, $this->authToken],
            'headers' => [
                'Accept' => 'application/json',
            ],
            'http_errors' => false,
        ]);

        if ($response->getStatusCode() != 200) {
            if ($response->getStatusCode() == 401) {
                throw new ImpactApiException('Invalid credentials');
            }
            throw new ImpactApiException('Invalid response: HTTP status ' . $response->getStatusCode());
        }

        return $response;
    }
}