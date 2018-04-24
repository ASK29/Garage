<?php
session_start();
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/main.css" type="text/css">

    <title>INLOG</title>
</head>
<body>
<div class="inlog">
<?php

if(isset($_SESSION['ingelogd'])){
    echo ("je was al ingelogd ");

//    header("location:oefening7.2.php");
    if (isset($_SESSION["admin"])) {
//        echo ("Deze teks zie je niet");
        require_once "../gar-Connect-klant.php";

        $sql = $conn->prepare("SELECT  klantnaam, wachtwoord FROM  inlog");
        $sql->execute();
        $results = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $result) {
            echo $result['klantnaam'] . "<br>";

        }
        if (isset($_SESSION["admin"])) {
            echo "<form action=../gar-menu.php>
        <input type=\"submit\" value=\"Klanten\">
        </form>";
        }
    }
    if(isset($_SESSION['ingelogd'])){

if(isset($_SESSION['users'])){
    echo "<form action=../gar-menu.php>
        <input type=\"submit\" value=\"Klanten\">
        </form>";
}
    }

    ?> <!doctype html>

<form action=inlog-sessie-kill.php>
    <input type="submit" value="uitloggen">
</form>

<?php
}else{
    ?>

<h1>Garage</h1>
    <h2>inlog menu</h2>

<form action="inlog2.php" method="post">
    Username: <input type="text" name="username"> <br /><br />
    Password: <input type="password" name="password"> <br /> <br /> <br />
    <input type="submit">
</form>

<?php
}
?>
</div>
</body>
</html>

