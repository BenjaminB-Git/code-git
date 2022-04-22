<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <?php

    $fp = file("http://bienvu.net/misc/customers.csv");
    echo '<table class="table table-striped table-bordered table-hover">
        <thead>
            <th scope = "col">Surname</th>
            <th scope = "col">Firstname</th>
            <th scope = "col">Email</th>
            <th scope = "col">Phone</th>
            <th scope = "col">City</th>
            <th scope = "col">State</th>
        </thead>
        <tbody>';
    for ($i = 0; $i <count($fp); $i++)
    {
        $row = explode(',',$fp[$i]);
        echo '<tr>';
        for ($j = 0; $j < count($row); $j++)
        {
            echo '<td>' . $row[$j] . '</td>';
        };
        echo '</tr>';
    };


    echo '</tbody>
        </table>';






























?>
    
</body>
</html>