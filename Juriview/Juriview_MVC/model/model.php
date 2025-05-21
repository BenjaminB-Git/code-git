<?php

include 'entity/client.php';
use App\Entity\Client;

//récupération de toutes les factures
function getInvoices($api) {
  header('Access-Control-Allow-Origin: *');

    // $curl = curl_init();
    // $invoices_url = "http://localhost:8000/json/invoices.json";
    // curl_setopt_array($curl, [
    //   CURLOPT_PORT => '8000',
    //   CURLOPT_URL => $invoices_url,
    //   CURLOPT_RETURNTRANSFER => true,
    //   CURLOPT_ENCODING => "",
    //   CURLOPT_MAXREDIRS => 10,
    //   CURLOPT_TIMEOUT => 10,
    //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //   CURLOPT_CUSTOMREQUEST => "GET",
    //   CURLOPT_POSTFIELDS => "",
    //   CURLOPT_HTTPHEADER => [
    //     "Content-Type: application/json"
    //     // "userApiKey: ". $api
    //   ],
    // ]);
  
  
    // $response = curl_exec($curl);
    // $err_invoices = curl_error($curl);
    $response = file_get_contents('json/invoices.json');
    $invoices = json_decode($response, true);
    $i = 0;
    foreach ($invoices as $invoice){
      $invoices[$i]["str_date"] = date('d/m/Y',strtotime($invoice["date"]));
      $invoices[$i]["str_due_date"] = date('d/m/Y',strtotime($invoice["due_date"]));
      $i++;
    }

    return $invoices;
  }
  
  //récupération de tous les devis
  
  function getQuotations($api) {
    header('Access-Control-Allow-Origin: *');

    // $curl = curl_init();
    // $quotations_url = "http://localhost:8000/json/quotations.json";
    // curl_setopt_array($curl, [
    //   CURLOPT_PORT => '8000',
    //   CURLOPT_URL => $quotations_url,
    //   CURLOPT_RETURNTRANSFER => true,
    //   CURLOPT_ENCODING => "",
    //   CURLOPT_MAXREDIRS => 10,
    //   CURLOPT_TIMEOUT => 10,
    //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //   CURLOPT_CUSTOMREQUEST => "GET",
    //   CURLOPT_POSTFIELDS => "",
    //   CURLOPT_HTTPHEADER => [
    //     "Content-Type: application/json"
    //     // "userApiKey: ". $api
    //   ],
    // ]);
  
  
    // $response = curl_exec($curl);
    // $err_quotations = curl_error($curl);
    $response = file_get_contents('json/quotations.json');
    $quotations = json_decode($response, true);
    $i = 0;
    foreach ($quotations as $quotation){
      $quotations[$i]["str_date"] = date('d/m/Y',strtotime($quotation["date"]));
      $quotations[$i]["str_expiry_date"] = date('d/m/Y',strtotime($quotation["expiry_date"]));
      $i++;
    }
    return $quotations;
  
  }
  
  //récupération des entreprises
  
  
  function getCompanies($api) {
    header('Access-Control-Allow-Origin: *');

    // $curl = curl_init();
    // $quotations_url = 'http://localhost:8000/json/companies.json';
    // curl_setopt_array($curl, [
    //   CURLOPT_PORT => "8000",
    //   CURLOPT_URL => $quotations_url,
    //   CURLOPT_RETURNTRANSFER => true,
    //   CURLOPT_ENCODING => "",
    //   CURLOPT_MAXREDIRS => 10,
    //   CURLOPT_TIMEOUT => 10,
    //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //   CURLOPT_CUSTOMREQUEST => "GET",
    //   CURLOPT_POSTFIELDS => "",
    //   CURLOPT_HTTPHEADER => [
    //     "Content-Type: application/json"
    //   //   // "userApiKey: ". $api
    //   ],
    // ]);
  
  
    // $response = curl_exec($curl);
    // $err = curl_error($curl);
    $response = file_get_contents('json/companies.json');

    $companies = json_decode($response, true);
    $customers = [];
    foreach ($companies as $company){
      if ($company["is_customer"]){
        $client = new Client($company);
        array_push($customers, $client);
      };
    };
    $result = [$companies,$customers];
    // var_dump($result);
    return $result;
  };

  //modification des données des clients

  function setClientsInfos($clients, $quotations, $invoices){
    foreach($clients as $client){
      $ca = 0;
      $factures = [];
      $devis = [];
      foreach ($invoices as $invoice){
          if ($invoice["company"]["id"] == $client->getId()){
              $ca += $invoice["pre_tax_amount"];
              array_push($factures,$invoice);
          };
      };
      foreach ($quotations as $quotation){
          if ($quotation["company_id"] == $client->getId()){
              array_push($devis, $quotation);
          };
      };
      $client->setCa($ca);
      if (!empty($factures)){
        $client->setFactures($factures);
      };
      if (!empty($devis)){
        $client->setDevis($devis);
      };
  };
}

  //chercher client

  function getClientById($clients, $id){
    $arrayvar = [];
    foreach($clients as $client){
      array_push($arrayvar, $client);
      if (is_a($client, "App\Entity\Client")){
        if ($client->getId() == $id){
          $myClient = $client;
        };
      };
    };
    return $myClient;
  }

  