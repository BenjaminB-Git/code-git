<?php
    require 'model/model.php';


    $api_key = "9169184502402677bcfc28e394b6d9ac";

    $get_invoices = getInvoices($api_key);
    $get_quotations = getQuotations($api_key);
    $get_companies = getCompanies($api_key);

    // $err_invoices = $get_invoices[0];
    // $err_quotations = $get_quotations[0];
    // $err_companies = $get_companies[0];

    $invoices = $get_invoices;
    $quotations = $get_quotations;
    $companies = $get_companies[0];
    $clients = $get_companies[1];

    setClientsInfos($clients, $quotations, $invoices);

    function accueil() {
        global $get_companies;
        // global $err_invoices;
        // global $err_quotations;
        // global $err_companies;
        global $invoices;
        global $quotations;
        global $companies;
        global $clients;

        $calc_invoices = 0;

    // if (!$err_invoices) {
        foreach ($invoices as $invoice) {
            $calc_invoices += $invoice["pre_tax_amount"];
        };
    // };

    //calcul de la somme des devis
    $calc_quotations = 0;

    // if (!$err_quotations) {
        foreach($quotations as $quotation){
            $calc_quotations += $quotation["pre_tax_amount"];
        };
    // };
    //$firstClient = $clients[0]->jsonSerialize();
    // var_dump($get_companies);
    return json_encode([$calc_invoices,$calc_quotations,$clients,$companies,$quotations,$invoices]);

    };

    function client($id){

        global $clients;
        $client = getClientById($clients, $id);
        $monId = $id;
        return json_encode($client);

    };