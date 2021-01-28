<?php
 $URL = $_SERVER["REQUEST_URI"];

 switch($URL){
     case "/":
        $_GET["PAGE"] = "pages/pradinis.view.php";
     break;

     case "/visi":
        $_GET["PAGE"] = "pages/visi.php";
     break;

      case "/pridetizanra":
         $_GET["PAGE"] = "pages/pridetiKategorija.php";
     break;

      case "/pridetifilma":
         $_GET["PAGE"] = "pages/pridetiFilma.php";
     break;

      case "/router.php":
         $_GET["PAGE"] = "pages/visi.php";
     break;

      case "/istrinti":
         $_GET["PAGE"] = "pages/istrinti.php";
     break;

     default:
     $_GET["PAGE"] = "pages/errorPage.php";
    break;
 }
 include "main/index.view.php";
?>