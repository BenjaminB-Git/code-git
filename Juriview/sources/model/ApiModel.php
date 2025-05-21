<?php
require_once '../entity/Client.php';
require_once '../api_key.php';

use App\Entity\Client;

class ApiModel {
    private $apiKey;

    public function __construct() {
        global $api_key;
        $this->apiKey = $api_key;
    }

    public function getInvoices() {
        $invoices = $this->makeApiRequest("https://axonaut.com/api/v2/invoices");
        return $invoices;
    }

    public function getQuotations() {
        $quotations = $this->makeApiRequest("https://axonaut.com/api/v2/quotations");
        return $quotations;
    }

    public function getClients() {
        $companies = $this->makeApiRequest("https://axonaut.com/api/v2/companies");
        $clients = array_filter($companies, function($company) {
            return isset($company["is_customer"]) && $company["is_customer"];
        });
        $clients = array_map(fn($clientData) => new Client($clientData), $clients);
    
        $quotations = $this->getQuotations();
        $invoices = $this->getInvoices();
        
        $this->setClientsInfos($clients, $quotations, $invoices);
        
        return $clients;
    }

    function setClientsInfos($clients, $quotations, $invoices) {
        foreach ($clients as $client) {
            $ca = 0;
            $factures = [];
            $devis = [];
    
            foreach ($invoices as $invoice) {
                if ($invoice["company"]["id"] == $client->getId()) {
                    $ca += $invoice["pre_tax_amount"];
                    array_push($factures, $invoice);
                }
            }
            
            foreach ($quotations as $quotation) {
                if ($quotation["company_id"] == $client->getId()) {
                    array_push($devis, $quotation);
                }
            }  
            
            $client->setCa($ca);
            $client->setFactures($factures);
            $client->setDevis($devis);
        }
    }

    private function makeApiRequest($url) {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                "userApiKey: " . $this->apiKey
            ]
        ]);
        $response = curl_exec($curl);
        $data = json_decode($response, true);
        return $data;
    }
}
