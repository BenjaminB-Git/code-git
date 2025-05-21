<?php

ob_start(); ?>

<div class="h1 pt-6">Bienvenue !</div>
<div class="h3 pb-3 pt-3">Tableau de bord</div>
    <?php if (!$err_invoices && !$err_quotations) { ?>
        <table class="text-center table-m-responsive table col-12">
            <thead class="table-info">
                <tr>
                    <th scope="col">Votre chiffre d'affaires</th>
                    <th scope="col">Somme de vos devis</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= number_format($calc_invoices, 2, ",", " "); ?> €</td>
                    <td><?= number_format($calc_quotations, 2, ",", " "); ?> €</td>
            </tbody>
        </table>
    <?php } else { ?>
        <div class="text-danger">Une erreur s'est produite lors du chargement de vos données</div>
    <?php }; ?>
<div class="h3 pb-3">Vos clients</div>
    <table class="table-m-responsive table col-12 table-striped">
        <thead class="text-center table-info">
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Adresse</th>
                <th scope="col">Contact</th>
                <th scope="col">CA</th>
            <tr>
        </thead>
        <tbody>
            <?php foreach($clients as $client){ ?>
            <tr class="align-middle">
                <th colspan="row"><a href="index.php?action=client&id=<?= $client->getId();?>"><?=$client->getNom()?></th></a>
                <td><?=$client->getAdresse()?></td>
                <td><?=$client->getContactNom()?><br><?=$client->getContactMail()?><br><?=$client->getContactTel()?></td>
                <td><?=number_format($client->getCa())?> €</td>
            </tr><?php ;
            };
            ?>
        </tbody>
    </table>
    <div class="h3 pb-3">Vos devis</div>
    <table class="table-m-responsive table col-12 table-striped">
        <thead class="text-center table-info">
            <tr>
                <th scope="col">Devis</th>
                <th scope="col">Date</th>
                <th scope="col">Echéance</th>
                <th scope="col">Prospect</th>
                <th scope="col">Signé</th>
                <th scope="col">Prix HT</th>
                <th scope="col">Marge</th>
                <th scope="col">Document</th>
            </tr>
        </thead>
        <tbody>
            <?php     foreach($quotations as $quotation){
      $quotation["status"] == "accepted" ? $signe = "Oui" : $signe = "Non"; ?>
        <tr>
          <th colspan="row"><?=$quotation["title"]?></th>
          <td><?=date('d/m/Y', strtotime($quotation["date"]))?></td>
          <td><?=date('d/m/Y', strtotime($quotation["expiry_date"]))?></td>
          <td><?=$quotation['company_name']?></td>
          <td><?= $signe?></td>
          <td><?=number_format($quotation["pre_tax_amount"],2,","," ")?> €</td>
          <td><?=number_format($quotation["margin"],2,","," ")?> €</td>
          <td class="text-center"><a href="<?= $quotation["public_path"]?>" target="_BLANK">👁</a></td>
  
        </tr> <?php
    } ?>


        </tbody>
    </table>
    <div class="h3 pb-3">Vos factures</div>
    <table class="table-m-responsive table col-12 table-striped">
        <thead class="text-center table-info">
            <tr>
                <th scope="col">n° Facture</th>
                <th scope="col">Client</th>
                <th scope="col">Date</th>
                <th scope="col">TTC</th>
                <th scope="col">Reste TTC</th>
                <th scope="col">Echéance</th>
                <th scope="col">Document</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            foreach($invoices as $invoice) { ?>
                <tr>
                    <th colspan="row"><?=$invoice["number"] ?></th>
                    <td><?=$invoice["company"]["name"]?></td>
                    <td><?=date('d/m/Y', strtotime($invoice["date"]))?></td>
                    <td><?=number_format($invoice["total"],2,","," ")?> €</td>
                    <td><?=number_format($invoice["outstanding_amount"],2,","," ")?> €</td>
                    <td><?=date('d/m/Y', strtotime($invoice["due_date"]))?></td>
                    <td class="text-center"><a class="btn btn-default" href="<?=$invoice["public_path"]?>" target="_BLANK">👁</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php $content = ob_get_clean(); ?>
    <?php require 'gabarit.php' ?>
