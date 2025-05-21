<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Axonaut</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>

    <header style="height: 100px;" class="pb-3">
        <div class="w-100 h-100 bg-info h1 text-center align-middle">
            <table class="h-100">
            <td class="w-100 h-100 align-middle">
            <img src="https://static.wixstatic.com/media/fb1186_3351eeed0ccc40f38afa3209d1f3b67e~mv2.gif" alt="​Une solution logicielle pour la gestion quotienne des directions juridiques par Juriview" style="object-fit: contain; object-position: center center; width: 10%;" loading="lazy" fetchpriority="high">
            Juriview
            </td>
            </table>
        </div>
    </header>
    <?php 
        include "request_ca.php";
    ?>
    <div class="container">
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
                <th scope="col">Docs</th>
            <tr>
        </thead>
        <tbody>
            <?php setClientTable($companies[1]) ?>
        </tbody>
    </table>
    <div class="modal fade" id="clientDocs" tabindex="-1" role="dialog" aria-labelledby="clientsDocsLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="clientsDocsLabel">Voici la modale</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <div class="modal-body" id="modal-content">

                </div>
            </div>
        </div>
    </div>
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
            <?php setQuotationTable($quotations[1]); ?>
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
            <?php setInvoicesTable($invoices[1]); ?>
        </tbody>
    </table>
    <div>
    </div>
    </div>
    <script src="assets/script.js"></script>

    </body>
    
</html>