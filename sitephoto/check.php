<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Data</label>
        <input type="date" name="dati">
    <button type="submit" name="submeter">Marcar</button>
    </form>
</body>
</html>
<?php
if (isset($_POST['submeter'])) {
    $dati =$_POST['dati'];

$date = new DateTime();
$d= $date->format('Y-m-d');


if ($dati < $d){
    echo 'Data invalida';
}else{
    echo $dati;
}

} ?>