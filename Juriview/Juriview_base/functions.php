<?php


//récupération de toutes les factures
function getInvoices($api) {
  $curl = curl_init();
  $invoices_url = "https://axonaut.com/api/v2/invoices";
  curl_setopt_array($curl, [
    CURLOPT_URL => $invoices_url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_POSTFIELDS => "",
    CURLOPT_HTTPHEADER => [
      "Content-Type: application/json",
      "userApiKey: ". $api
    ],
  ]);


  $response = curl_exec($curl);
  $invoices = json_decode($response, true);
  $err_invoices = curl_error($curl);
  $result_invoices = [$err_invoices, $invoices];
  return $result_invoices;
}

//récupération de tous les devis

function getQuotations($api) {
  $curl = curl_init();
  $quotations_url = "https://axonaut.com/api/v2/quotations";
  curl_setopt_array($curl, [
    CURLOPT_URL => $quotations_url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_POSTFIELDS => "",
    CURLOPT_HTTPHEADER => [
      "Content-Type: application/json",
      "userApiKey: ". $api
    ],
  ]);


  $response = curl_exec($curl);
  $quotations = json_decode($response, true);
  $err_quotations = curl_error($curl);
  $result_quotations = [$err_quotations, $quotations];
  return $result_quotations;

}

//récupération des clients


function getCompanies($api) {
  $curl = curl_init();
  $quotations_url = "https://axonaut.com/api/v2/companies";
  curl_setopt_array($curl, [
    CURLOPT_URL => $quotations_url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_POSTFIELDS => "",
    CURLOPT_HTTPHEADER => [
      "Content-Type: application/json",
      "userApiKey: ". $api
    ],
  ]);


  $response = curl_exec($curl);
  $companies = json_decode($response, true);
  $err = curl_error($curl);
  $result = [$err, $companies];
  return $result;

}


//création de tableau pour les clients
function setClientTable($clients){
  foreach($clients as $client){
    if($client['is_customer']){
      empty($client["quotations"]) && empty($clients["invoices"]) ? $classDisabled = " disabled" : $classDisabled = "";
    echo 
      '<tr class="align-middle">
        <th colspan="row">'.$client["name"].'</th>
        <td>'.$client["address_street"].' '.$client["address_zip_code"].' '.$client["address_city"].'</td>
        <td>'.$client['employees'][0]['firstname'].' '.$client['employees'][0]['lastname'].'<br>'.$client['employees'][0]['email'].'<br>'.$client['employees'][0]['phone_number'].'</td>
        <td>'.number_format($client["ca"],2,","," ").' €</td>
        <td><button class="btn btn-link list-docs" data-toggle="modal" data-target="#clientDocs" '.$classDisabled.' id="'.$client["id"].'">👁</button>
      </tr>';
    }
  }
}

//création de tableau pour les devis
function setQuotationTable($quotations){
  foreach($quotations as $quotation){
    $quotation["status"] == "accepted" ? $signe = "Oui" : $signe = "Non";
    echo
      '<tr>
        <th colspan="row">'.$quotation["title"].'</th>
        <td>'.date('d/m/Y', strtotime($quotation["date"])).'</td>
        <td>'.date('d/m/Y', strtotime($quotation["expiry_date"])).'</td>
        <td>'.$quotation['company_name'].'</td>
        <td>'. $signe.'</td>
        <td>'.number_format($quotation["pre_tax_amount"],2,","," ").' €</td>
        <td>'.number_format($quotation["margin"],2,","," ").' €</td>
        <td class="text-center"><a class="btn btn-default" href="'.$quotation["public_path"].'" target="_BLANK">👁</a></td>

      </tr>';
  }
}

//création du tableau pour les factures
function setInvoicesTable($invoices){
  foreach($invoices as $invoice){
    echo
      '<tr>
        <th colspan="row">'.$invoice["number"].'</th>
        <td>'.$invoice["company"]["name"].'</td>
        <td>'.date('d/m/Y', strtotime($invoice["date"])).'</td>
        <td>'.number_format($invoice["total"],2,","," ").' €</td>
        <td>'.number_format($invoice["outstanding_amount"],2,","," ").' €</td>
        <td>'.date('d/m/Y', strtotime($invoice["due_date"])).'</td>
        <td class="text-center"><a class="btn btn-default" href="'.$invoice["public_path"].'" target="_BLANK">👁</a></td>
      </tr>';
  }
}
