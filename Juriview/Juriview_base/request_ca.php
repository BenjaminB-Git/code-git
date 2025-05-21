<?php

require "functions.php";

$api_key = "9169184502402677bcfc28e394b6d9ac";

$invoices = getInvoices($api_key);
$quotations = getQuotations($api_key);
$companies = getCompanies($api_key);

$err_invoices = $invoices[0];
$err_quotations = $quotations[0];
$err_companies = $companies[0];


//calcul du CA
$calc_invoices = 0;

if (!$err_invoices) {
    foreach ($invoices[1] as $invoice) {
        $calc_invoices += $invoice["pre_tax_amount"];
    };
};


//insertion du CA chez les clients
$i = 0;
foreach ($companies[1] as $company){
    if($company["is_customer"]){
        $companies[1][$i]["ca"] = 0;
        $companies[1][$i]["invoices"] = [];
        $companies[1][$i]["quotations"] = [];
        foreach($invoices[1] as $invoice){
            if ($invoice["company"]["id"] == $company["id"]){
                $companies[1][$i]["ca"] += $invoice["pre_tax_amount"];
                array_push($companies[1][$i]["invoices"], $invoice);
            };
        };
        foreach($quotations[1] as $quotation){
            if ($quotation["company_id"] == $company["id"]){
                array_push($companies[1][$i]["quotations"], $quotation);
            };
        };

    };
    $i++;
};

//calcul de la somme des devis
$calc_quotations = 0;

if (!$err_quotations) {
    foreach($quotations[1] as $quotation){
        $calc_quotations += $quotation["pre_tax_amount"];
    };
};