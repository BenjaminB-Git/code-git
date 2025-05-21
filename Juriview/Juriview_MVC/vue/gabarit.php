<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Axonaut</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <div id="global">
        <header style="height: 100px;" class="pb-3" id="header">
            <div class="w-100 h-100 h1 text-center align-middle">
                <table class="h-100">
                <td class="w-100 h-100 align-middle">
                <img src="https://static.wixstatic.com/media/fb1186_3351eeed0ccc40f38afa3209d1f3b67e~mv2.gif" alt="​Une solution logicielle pour la gestion quotienne des directions juridiques par Juriview" style="object-fit: contain; object-position: center center; width: 10%;" loading="lazy" fetchpriority="high">
                <a href="#" id="link-index">Juriview</a>
                </td>
                </table>
            </div>
        </header>
        <div class="container">
            <div id="contenu">
                <?= $content ?>
            </div>
        </div>
    </div>
</body>

</html>