<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
    echo('<table border=1>');
    echo('<thead>');
    echo('<th scope="col"></th>');
    for ($i = 0;$i <=12;$i++)
    {
        echo('<th scope="col">' . $i . '</th>');
    };
    echo('</thead>');
    echo('<tbody>');
    for ($j = 0;$j <= 12;$j++)
    {
        echo('<tr>');
        echo('<th scope="row">' . $j . '</td>');
        for($k = 0;$k <= 12;$k++)
        {
            echo('<td>' . $k*$j . '</td>');
        };
        echo('</tr>');
    };
    echo('</tbody>');
    echo('</table>');

    ?>
 
</body>
</html>