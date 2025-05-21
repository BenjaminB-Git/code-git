<?php
require_once '../model/ApiModel.php';

class ClientController {
    public function showClientView($id) {
        $model = new ApiModel();
        $clients = $model->getClients();
        $client = $this->getClientById($clients, $id);
        
        header('Content-Type: application/json');
        echo json_encode($client);
    }

    private function getClientById($clients, $id) {
        foreach ($clients as $client) {
            if ($client->getId() == $id) {
                return $client;
            }
        }
        return null;
    }
}
