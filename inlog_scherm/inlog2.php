<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/main.css">

    <title>inlog_2.0</title>
</head>
<body>
<div class="inlog2">



<?php

$klantnaam = $_POST["klantnaam"];
$wachtwoord = $_POST["wachtwoord"];

require_once "../gar-Connect-klant.php";

$sql = $conn->prepare("SELECT  * FROM  klant");
$sql->execute();
$results = $sql->fetchAll(PDO::FETCH_ASSOC);
$gevonden = false;




foreach ($results as $rij)
    {
        if ($klantnaam == $rij["klantnaam"])
            {
                if ($wachtwoord == $rij["wachtwoord"])

                    {
                        if($rij["rollen_id"] == 1 OR $rij["rollen_id"] == 2){
                            $_SESSION['admin'] = true;
                        }
                        if($rij["rollen_id"] == 3 OR $rij["rollen_id"] == 4){
                            $_SESSION['users'] = true;
                        }

                        $gevonden = true;
                    }
    }
}
    if ($gevonden === true) {
        echo("Welkom terug " . $klantnaam . " ");
        $_SESSION['ingelogd'] = true;
//    }
//    if ($_SESSION === true)
//    {
//
        header("location:../gar-menu.php");
}else{
    echo ("Uw heeft de foute gegevens ingevuld");
    session_destroy();
}
?>
</div>
</body>
</html>