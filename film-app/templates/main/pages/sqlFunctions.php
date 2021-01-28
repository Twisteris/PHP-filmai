<?php
include 'conntectToDatabase.php';
class sqlFunctions extends Database{


    public function outputFilmai(){
        $sql = "SELECT * FROM filmas";
        $stmt = $this->connect()->query($sql);
        $results = $stmt->fetchAll();
        //gaunam visus filmus ir returninam
        return $results;
    }

    public function outputKategorijos (){
        $sql = "SELECT * FROM Kategorijos";
        $stmt = $this->connect()->query($sql);
        $results = $stmt->fetchAll();
        //gaunam visas kategorijas ir returninam
        return $results;
    }

    public function setPost($pavadinimas, $trukme, $aprasymas, $img, $rezisierius, $kategorijo_id){
        $sql = "INSERT INTO filmas(pavadinimas, trukme, aprasymas, img, rezisierius, kategorijos_id) VALUES(?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$pavadinimas, $trukme, $aprasymas, $img, $rezisierius, $kategorijo_id]); // prevents sql injection
        //idedame i duombaze filma
    }

    public function setPost2($pavadinimas){
        $Kategorijos = $this->outputKategorijos();
        $letInsert = true; //jeigu nieko nebutu db filmas tai foreach neveiktu ir viskas die, tai mes idedam sql i if ir jis runins, bet kadangi jeigu jau toks zanras egzistuos pakeis i false ir tas nerunins
        foreach($Kategorijos as $Kategorija){

            if($Kategorija["pavadinimas"] == $pavadinimas){
                echo "Tokia kategorija jau egzistuoja";
                $letInsert = false;
            }
        }

        if($letInsert){
            $sql = "INSERT INTO Kategorijos(pavadinimas) VALUES(?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$pavadinimas]);
        }
        //idedame i duombaze kategorijas, jeigu tokios nera
    }

    public function getPosts ($FilmNames, $CategoryNames){
        $Filmai = $this->outputFilmai();
        $Kategorijos = $this->outputKategorijos();
        $index = 0;
        $index1 = 0;
        $filmoID = "";
        $KategorijaID ="";

        foreach ($Kategorijos as $Kategorija){
            $filmoID = $Kategorija["id"];
            $KategorijaID = $Kategorija["id"];
            echo "<form method='post' action='istrinti'><input class='submit' type='submit' value='DELETE CATEGORY'/> <input class='hidden-input' name='filmoID' type='number' value='$filmoID'/></form>";
            foreach ($Kategorija as $value){
                $index == count($CategoryNames) - 1 ? $index = 0 : $index++;
                echo '<div class="some-text"><h1>'.$CategoryNames[$index].":  ".'</h1><h1>'.$value.'</h1></div>';
                //isprintinam HARD-CODED kategoriju pavadinimus tada prie ju pridedam is duombazes values 
            }
            echo '<h1 class="some-text"> Filmai: </h1>';
            echo "<br>";
            

            foreach ($Filmai as $filmas){  
                // print_r($Filmai);
                 $KategorijaID = $filmas["id"];
                foreach ($filmas as $value){
                    if($filmas["kategorijos_id"] == $filmoID){
                        echo '<div class="film-box">';
                        echo '<div class="main-text"><h1>'.$FilmNames[$index1].":  ".'</h1><h1>'.$value.'</h1></div>';
                        $index1 == count($FilmNames) - 1 ? $index1 = 0 : $index1++;
                        echo '</div>';
                    }
                    //filmus isprintinam ir pagal id juos suorganizuojam siaubo prie siaubo ir t.t  
                }

                if($filmas["kategorijos_id"] == $filmoID){
                    echo "<form method='post' action='istrinti'><input class='submit' type='submit' value='DELETE FILM'/> <input class='hidden-input' name='KategorijaID' type='number' value='$KategorijaID'/></form>";
                }
                echo "<br>";
            }
        }
    }

}