<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="film-app/templates/main/css/pridetiFilma.css">
</head>
<body>
    <h1>Kategorijos Ir Filmai</h1>
    <?php
    include 'sqlFunctions.php';
    $FilmNames = ["Filmo ID", "Pavadinimas", "Trukmė", "Aprašymas", "IMG", "Režisierius", "KategorijosID"];
    $CategoryNames = [ "Kategorija", "ID-KATEGORIJOS"];
    $gauti = new sqlFunctions();
 ?>

 <div class="container">
 <?php $gauti->getPosts($FilmNames, $CategoryNames); ?>
 </div>
</body>
</html>