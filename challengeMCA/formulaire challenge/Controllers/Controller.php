<?php


abstract class Controller
{
    /**
     * Constructeur. Lance l'action correspondante
     */
    public function __construct()
    {

        //On détermine s'il existe dans l'url un paramètre action correspondant à une action du contrôleur
        if (isset($_GET['action']) and method_exists($this, "action_" . $_GET["action"])) {
            //Si c'est le cas, on appelle cette action
            $action = "action_" . $_GET["action"];
            $this->$action();
        } else {
            //Sinon, on appelle l'action par défaut
            $this->action_default();
        }
    }

    /**
     * Action par défaut du contrôleur (à définir dans les classes filles)
     */
    abstract public function action_default();

    /**
     * Affiche la vue
     * @param string $vue nom de la vue
     * @param array $data tableau contenant les données à passer à la vue
     * @return aucun
     */
    protected function render($vue, $data = [])
    {

        //On extrait les données à afficher
        extract($data);


        //On teste si la vue existe
        $file_name = "Views/view_" . $vue . '.php';
        if (file_exists($file_name)) {
            //Si oui, on l'affiche
            include $file_name;
        } else {
            //Sinon, on affiche la page d'->action_error
            $this->action_error("La vue n'existe pas !");
        }
        // Pour terminer le script
        die();
    }

    /**
     * Méthode affichant une page d'erreur
     * @param string $message Message d'erreur à afficher
     * @return aucun
     */
    protected function action_error($message = '')
    {
        $data = [
            'title' => "Error",
            'message' => $message,
        ];
        $this->render("message", $data);
    }

    public function verif_syntaxe($str){
        $interdit=['À', 'Á', 'Â', 'Ã', 'Ä', 'Å','Æ','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ð','Ñ','Ò','Ó','Ô','Õ','Ö','Ø','Œ','Š','þ','Ù','Ú','Û','Ü','Ý','Ÿ','à','á','â','ã','ä','å','æ','ç','è','é','ê','ë','ì','í','î','ï','ð','ñ','ò','ó','ô','õ','ö','ø','œ','š','Þ','ù','ú','û','ü','ý','ÿ','@'];
            foreach($interdit as $c1 => $v1){
                foreach ($_POST as $c2 => $v2) {
                    if(preg_match('/'.$v1.'/', $v2)){
                        if($str == "add"){
                            $this->render('form_add', ["fail" => 1]);
                        }elseif ($str == "edit") {
                            $m = Model::getModel();
                            $info = $m -> getInfoId($_GET['id']);
                            //var_dump($info);
                            $this->render('form_edit', $info);
                        }
                    }
                }
            }

            $tab = array_keys($_POST);
            
            if(!in_array("morphologie", $tab)){
                
                $_POST['morphologie']='';
            }
            if(!in_array("sexe", $tab)){
                
                $_POST['sexe']='0';
            }
            if(!in_array("domicile", $tab)){
            
                $_POST['domicile']='0';
            }
            if($_POST['repetition']==''){
                $_POST['repetition']='0';
            }
            if($_POST['serie']==''){
                $_POST['serie']='0';
            }
            if($_POST['repos']==''){
                $_POST['repos']='0';
            }
            if($_POST['tmpseance']==''){
                $_POST['tmpseance']='0';
            }
            if($_POST['difficulte']==''){
                $_POST['difficulte']='0';
            }
            if($_POST['team']==''){
                $_POST['team']='0';
            }
            if($_POST['xp']==''){
                $_POST['xp']='0';
            }
            if($_POST['piece']==''){
                $_POST['piece']='0';
            }
        }

    public function gestion_img(){
        //var_dump($_FILES);
        $validExt = array('.jpg', '.jepg', '.png');

        if($_FILES['img']['error']>0){
            $this->render('form_add', ["fail" => 1]); //erreur du fichier mettre un if dans la vue
        }

        if($_FILES['img']['size'] == 0){
            $this->render('form_add', ["fail" => 3]);
        }
        
        $fileName = $_FILES['img']['name'];
        $fileExt = ".".strtolower(substr(strrchr($fileName, '.'), 1));

        if(!in_array($fileExt, $validExt)){
            $this->render('form_add', ["fail" => 2]); //Mauvaise extension mettre un if dans la vue
        }

        $tmpName = $_FILES['img']['tmp_name'];
        $uniqueName=md5(uniqid(rand(), true));
        $fileName="../img/".$uniqueName.$fileExt;
        move_uploaded_file($tmpName, $fileName);




        return $uniqueName;
    }

    public function listImage(){
        $scandir = scandir("../img");
        return $scandir;
    }
}
