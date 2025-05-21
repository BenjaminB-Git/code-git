<?php

ob_start(); ?>

<div class="h1 pt-6"><?= $client->getNom(); ?></div>
<div class="h4 pt-3">Chiffre d'affaires : <?= number_format($client->getCa(), 2, ",", " ");?> €</div>
<div class="pt-3">
    <?= $client->getAdresse(); ?><br>
    <?= $client->getContactNom(); ?><br>
    <?= $client->getContactMail(); ?><br>
    <?= $client->getContactTel(); ?><br>
</div>

<div class="h3 pb-3 pt-3">Devis</div>
    <table class="table-m-responsive table col-12 table-striped">
        <thead class="text-center table-info">
            <tr>
                <th scope="col">Devis</th>
                <th scope="col">Date</th>
                <th scope="col">Echéance</th>
                <th scope="col">Signé</th>
                <th scope="col">Prix HT</th>
                <th scope="col">Marge</th>
                <th scope="col">Document</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if($client->getDevis()){     foreach($client->getDevis() as $quotation){
      $quotation["status"] == "accepted" ? $signe = "Oui" : $signe = "Non"; ?>
        <tr>
          <th colspan="row"><?=$quotation["title"]?></th>
          <td><?=date('d/m/Y', strtotime($quotation["date"]))?></td>
          <td><?=date('d/m/Y', strtotime($quotation["expiry_date"]))?></td>
          <td><?= $signe?></td>
          <td><?=number_format($quotation["pre_tax_amount"],2,","," ")?> €</td>
          <td><?=number_format($quotation["margin"],2,","," ")?> €</td>
          <td class="text-center"><a href="<?= $quotation["public_path"]?>" target="_BLANK">👁</a></td>
  
        </tr> <?php
    }} else { ?>

        <td class="text-center" colspan="7">Pas de devis avec ce client</td>



   <?php } ?>


        </tbody>
    </table>
    <div class="h3 pb-3">Factures</div>
    <table class="table-m-responsive table col-12 table-striped">
        <thead class="text-center table-info">
            <tr>
                <th scope="col">n° Facture</th>
                <th scope="col">Date</th>
                <th scope="col">TTC</th>
                <th scope="col">Reste TTC</th>
                <th scope="col">Echéance</th>
                <th scope="col">Document</th>
            </tr>
        </thead>
        <tbody>
        <?php if ($client->getDevis()){
            foreach($client->getFactures() as $invoice) { ?>
                <tr>
                    <th colspan="row"><?=$invoice["number"] ?></th>
                    <td><?=date('d/m/Y', strtotime($invoice["date"]))?></td>
                    <td><?=number_format($invoice["total"],2,","," ")?> €</td>
                    <td><?=number_format($invoice["outstanding_amount"],2,","," ")?> €</td>
                    <td><?=date('d/m/Y', strtotime($invoice["due_date"]))?></td>
                    <td class="text-center"><a class="btn btn-default" href="<?=$invoice["public_path"]?>" target="_BLANK">👁</a></td>
                </tr>
            <?php }} else{ ?>


                <td class="text-center" colspan="6">Pas de facture avec ce client</td>


           <?php } ?>
        </tbody>
    </table>
<?php $content = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>