<?php
require_once '../model/ApiModel.php';

class HomeController {
    public function showHome() {
        $model = new ApiModel();
        $clients = $model->getClients();

        $calc_invoices = 0;
        $calc_quotations = 0;

        foreach ($clients as $client) {
            $calc_invoices += $client->getCa();
            foreach ($client->getDevis() as $devis) {
                $calc_quotations += $devis["pre_tax_amount"];
            }
        }

        $data = [
            'calc_invoices' => $calc_invoices,
            'calc_quotations' => $calc_quotations,
            'clients' => $clients
        ];

        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
