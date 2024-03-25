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

}

?>