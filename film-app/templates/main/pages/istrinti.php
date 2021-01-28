<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="film-app/templates/main/css/pridetiFilma.css">
</head>
<body>
<?php
    include 'sqlDeleteFunctions.php';
    $delete = new sqlDeleteFunctions();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    print_r($_POST);

    if(!empty($_POST["KategorijaID"])){
        $delete->deleteMovie($_POST["KategorijaID"]);
        echo "it work";
    }else if(!empty($_POST["filmoID"])){
        $delete->deleteCategory($_POST["filmoID"]);

    }
    header("Location: visi");

}
?>

</body>
</html>