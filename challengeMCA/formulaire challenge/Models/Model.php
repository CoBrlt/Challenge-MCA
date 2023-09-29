<?php

class Model
{
    /**
     * Attribut contenant l'instance PDO
     */
    private $bd;

    /**
     * Attribut statique qui contiendra l'unique instance de Model
     */
    private static $instance = null;

    /**
     * Constructeur : effectue la connexion à la base de données.
     */
    private function __construct()
    {
        include "credentials.php";
        $this->bd = new PDO($dsn, $login, $mdp);
        $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->bd->query("SET nameS 'utf8'");
    }

    public static function getModel(){
        if(self::$instance === null){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getInfoMenu(){
        $req = $this->bd->prepare('select id, nom, description, sport, morphologie from challenge;');
        $req->execute();
        /*while($tab = $req->fetchall(PDO::FETCH_ASSOC)){
            $x[] = $tab[0];
        }*/
        $x = $req->fetchall(PDO::FETCH_ASSOC);
        return $x;
    }

    public function getAllInformations(){
        $req = $this->bd->prepare("select * from challenge;");
        $req->execute();
        $tab = $req->fetchall(PDO::FETCH_ASSOC);
        return $tab;
    }

    public function getInfoId($id){
        $req = $this->bd->prepare("select * from challenge where id =".$id.";");
        $req->execute();
        $tab = $req->fetchall(PDO::FETCH_ASSOC);
        return $tab[0];
    }

    public function getNomColonnes(){
        $req = $this->bd->prepare("select COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS where table_name='challenge';");
        $req->execute();
        while($tab = $req->fetch(PDO::FETCH_NUM)){
            $cat[] = $tab[0];
        }
        return $cat;
    }

    public function getMaxId(){
        $req = $this->bd->prepare("select MAX(id) from challenge;");
        $req->execute();
        $tab = $req->fetchall(PDO::FETCH_NUM);
        return $tab;
    }

    public function addChallenge($infos)
    {
       
        //Préparation de la requête
        $requete = $this->bd->prepare('INSERT INTO challenge (nom, id, description, sport, image, morphologie, nbrepetition, nbserie, tmprepos, tempsseanceminutes, materiel, sexe, difficulte, nbpartenaires, domicile, recompensexp, recompensepiece) VALUES (:nom, :id, :description, :sport, :img, :morphologie, :repetition, :serie, :repos, :tmpseance, :materiel, :sexe, :difficulte, :team, :domicile, :xp, :piece )');

        //Remplacement des marqueurs de place par les valeurs
        $marqueurs = ["nom", "id", "description", "sport", "img", "morphologie", "repetition", "serie", "repos", "tmpseance", "materiel", "sexe", "difficulte", "team", "domicile", "xp", "piece"];
        foreach ($marqueurs as $value) {
            $requete->bindValue(':' . $value, $infos[$value]);
        }
        //var_dump($infos);
        //$requete->bindValue(':land', $infos["land"], PDO::PARAM_INT);
        //Exécution de la requête
        $requete->execute();
        return (bool) $requete->rowCount();
    }

    public function nbChallenge(){
        $req=$this->bd->prepare("select count(*) from challenge");
        $req->execute();
        $tab = $req->fetch(PDO::FETCH_NUM);
        return $tab;
    }

    public function deleteById($id){
        $req = $this->bd->prepare("delete from challenge where id=".$id.";");
        $req->execute();
    }

    public function editById($infos){
        $id = $infos["id"];
        $req = $this->bd->prepare("update challenge set
            nom=:nom,
            description=:description,
            sport=:sport,
            image=:img,
            morphologie=:morphologie,
            nbrepetition=:repetition,
            nbserie=:serie,
            tmprepos=:repos,
            tempsseanceminutes=:tmpseance,
            materiel=:materiel,
            sexe=:sexe,
            difficulte=:difficulte,
            nbpartenaires=:team,
            domicile=:domicile,
            recompensexp=:xp,
            recompensepiece=:piece
            where id=".$id.";");
        //Remplacement des marqueurs de place par les valeurs
        $marqueurs = ["nom", "description", "sport", "img", "morphologie", "repetition", "serie", "repos", "tmpseance", "materiel", "sexe", "difficulte", "team", "domicile", "xp", "piece"];
        foreach ($marqueurs as $value) {
                $req->bindValue(':' . $value, $infos[$value]);
        }
        $req->execute();
    }
    public function getNomImage_by_id($id){
        $req = $this->bd->prepare("select image from challenge where id =".$id.";");
        $req->execute();
        $tab = $req->fetchall(PDO::FETCH_NUM);
        return $tab[0][0];
    }
}

?>