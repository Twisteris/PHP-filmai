<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="film-app/templates/main/css/pridetiFilma.css">
</head>
<body>
<form method="post" action=''>
<h1>PRIDĖTI KATEGORIJĄ</h1>
    <label>Pavadinimas</label>
    <input type="text" name="pavadinimas" placeholder="Veskite cia...">
    <input class="submit" type="submit">
</form>

   <?php
    include 'sqlFunctions.php';
    $prideti = new sqlFunctions();

    if(!empty($_POST)){
        $prideti->setPost2($_POST['pavadinimas']);
    }

?>
</body>
</html>