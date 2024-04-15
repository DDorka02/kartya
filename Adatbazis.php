<?php
    class Adatbazis {  
        private $host = "localhost";
        private $felhasznaloNev = "root";
        private $jelszo = "";
        private $adatbazisNev = "magyarkartya";
        private $kapcsolat;

        public function __construct() {
            $this->kapcsolat = new mysqli(
                $this->host,
                $this->felhasznaloNev,
                $this->jelszo,
                $this->adatbazisNev
            );
        $szoveg="";
        /*if ($this->kapcsolat->connect_error) {
            $szoveg="Sikertelen kapcs";
        }
        else
        $szoveg ="sikeres";
        $this->kapcsolat->query('SET NAMES UTF8');
        $this->kapcsolat->query('SET character set utf8');
        echo $szoveg;*/
    }

    public function adatLeker($oszlop,$tabla) {
        $sql = "SELECT $oszlop From $tabla";
        $adatok = $this->kapcsolat->query($sql);
        /*if ($adatok)
            echo "Sikeres volt!";
        else
        echo "Sikertelen";*/
        return $adatok;
}

    public function adatLeker2($melyik01,$melyik02,$tabla) {
        $sql = "SELECT $melyik01, $melyik02 from $tabla order by $melyik01";
        return $this->kapcsolat->query($sql);
    }
    public function adatLeker3($oszlop1,$oszlop2,$tabla) {
        $sql = "SELECT $oszlop1, $oszlop2 from $tabla";
        return $this->kapcsolat->query($sql);

}   
    public function megvalosit($eredmeny){
        while($sor=$eredmeny->fetch_row()) {
            echo "<img src=\"kepek/$sor[0]\" alt=\"$sor[0]\">";
        }
    }

    public function megjelenit($matrix){
        while($row=$matrix->fetch_row()) {
            echo "<img src=\"kepek/$row[0]\" alt=\"$row[0]\">";
        }
    }

    public function megjelenitTabla($matrix){
        while($row=$matrix->fetch_row()) {
            echo "<img src=\"kepek/$row[0]\" alt=\"$row[0]\">";
        }
    }
    function megvalositAsszoc($eredmeny,$melyik01,$melyik02){
        while($row=$eredmeny->fetch_row()) {
            echo "$melyik01: $row[$melyik01] - $melyik01: $row[$melyik02]<br>";

    }
}
    function azonMind($tabla){
        $result = $this->kapcsolat->query("SELECT * FRom $tabla");
        return $result->num_rows;

}

    function kartyaFeltolt($tabla){
        $countSzin = $this->azonMind('szin') + 1;
        $countForma = $this->azonMind('forma') + 1;
        for ($indexSzin=1; $indexSzin < $countSzin ; $indexSzin+1) { 
            for ($indexForma=1; $indexForma < $countForma; $indexForma++) { 
                $sql = "INSERT INTO $tabla (szinAzon,formaAzon) VALUES ($indexSzin,$indexForma)";
                $this->kapcsolat->query($sql);
            }
                }
    }


}

?>