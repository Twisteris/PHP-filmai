<!-- http://localhost/film-app/templates/main/pages/add.movie.view.php -->
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
    <h1>PRIDĖTI FILMĄ</h1>
  <label>Pavadinimas</label><br>
   <input type="text" name="pavadinimas" placeholder="Įveskite čia pavadinima">

  <label>Trukmė</label><br>
   <input type="text" name="trukme" placeholder="Įveskite čia trukmę">

   <label>Aprašymas</label><br>
   <input type="text" name="aprasymas" placeholder="Įveskite čia aprašymą">

   <label>Nuotrauka</label><br>
   <input type="text" name="img" placeholder="Įveskite čia nuotrauka">

   <label>Režisierius</label><br>
   <input type="text" name="rezisierius" placeholder="Įveskite čia režisieriu">

   <label>KategorijosID</label><br>
   <input type="text" name="kategorijo_id" placeholder="Įveskite čia Kategorijos Id">


   <input class="submit" type="submit" value="Pridėti">
</form>

<?php
    include 'sqlFunctions.php';
    $prideti = new sqlFunctions();
    if(!empty($_POST)){
        $prideti->setPost($_POST['pavadinimas'], $_POST['trukme'], $_POST['aprasymas'], $_POST['img'], $_POST['rezisierius'], $_POST['kategorijo_id']);
    }

?>
</body>
</html>