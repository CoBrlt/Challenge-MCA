<?php
class Controller_add extends Controller{

	public function action_default(){
		$this->action_form_add();
	}

	public function action_form_add(){
		$this->render('form_add', ["fail" => 0]);

	}

	public function action_add(){
		if(isset($_POST['addbouton'])){
			$this->verif_syntaxe("add");
			$m = Model::getModel();
			$nom_img = $this->gestion_img();
            if($m->getMaxId() ==  null){
                $id = 0;
            }else{
                $id = $m->getMaxId()[0][0] + 1;
            }
			$new = [
				"id" => $id,
				"nom" => $_POST['nom'],
				"description" => $_POST['description'],
				"sport" => $_POST['sport'],
				"img" => $nom_img,
				"morphologie" => $_POST['morphologie'],
				"repetition" => $_POST['repetition'],
				"serie" => $_POST['serie'],
				"repos" => $_POST['repos'],
				"tmpseance" => $_POST['tmpseance'],
				"materiel" => $_POST['materiel'],
				"sexe" => $_POST['sexe'],
				"difficulte" => $_POST['difficulte'],
				"team" => $_POST['team'],
				"domicile" => $_POST['domicile'],
				"xp" => $_POST['xp'],
				"piece" => $_POST['piece']
			];
			
			$m->addChallenge($new);
			$data = ['nb' => $m->nbChallenge()];
			$this->render('nombre', $data);
		}
	}
}

?>