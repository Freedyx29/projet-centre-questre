<?php

include '../include/bdd.inc.php';

class Galop {

    private $idgalop ;
    private $libgalop ;

    public function __construct($idga = null, $lg = null) {
        $this->idgalop = $idga;
        $this->libgalop = $lg ;
    }


    public function getGalop() {
        return "id galop : $this->idgalop,
                lib galop : $this->libgalop";
    }

    public function getidgalop() {
        return $this->idgalop;
    }

    public function getlibgalop() {
        return $this->libgalop;
    }


    public function setlibgalop($lg) {
        $this->libgalop = $lg;
    }


        //Requêtes

    //Modèle SELECT : lire
    public function GalopAll(){
        $con = connexionPDO();
        $sql = "SELECT * FROM galop;";
        $executesql = $con->prepare($sql);
        $executesql->execute();
        $resultat = $executesql->fetchAll();
        return $resultat;
    }
    

    //Modèle UPDATE : modifier
    public function Modifier($id, $lg){
        $con = connexionPDO();
        $data = [
            ':lg' => $lg,
            ':id' => $id
        ];
    
        $sql = "UPDATE galop 
                SET libgalop = :lg
                WHERE idgalop = :id;";
        $stmn = $con->prepare($sql);
    
        if ($stmn->execute($data)) {
            echo "Galop modifiée";
            return true;
        } else {
            echo $stmn->errorInfo();
            return false;
        }
    }


    //Modèke DELETE : supprimer
    public function Supprimer($id){
        $con = connexionPDO();
        $data = [
            ':id' => $id
        ];
    
        $sql = "UPDATE galop SET supprime = 1 WHERE idgalop = :id;";
        $stmn = $con->prepare($sql);
    
        if ($stmn->execute($data)) {
            echo "Suppression réussie";
            return true;
        } else {
            $errorInfo = $stmn->errorInfo();
            echo "Erreur lors de la suppression : " . $errorInfo[2];
            return false;
        }
    }
    

    //Modèle INSERT : créer
    public function GalopAjt($libgalop){
        $con = connexionPDO();
        $data = [
            ':libgalop' => $libgalop,
        ];
    
        $sql = "INSERT INTO galop (libgalop) VALUES (:libgalop);";
        $stmn = $con->prepare($sql);
    
        if ($stmn->execute($data)) {
            echo "Galop insérée";
            return $con->lastInsertId();
        } else {
            echo $stmn->errorInfo();
            return false;
        }
    }
}

?>