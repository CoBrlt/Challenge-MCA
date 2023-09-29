<?php
class Controller_edit extends Controller{

	public function action_default(){
		$this->action_form_edit();
	}

	public function action_form_edit(){
		$m = Model::getModel();
		$info = $m -> getInfoId($_GET['id']);
		//var_dump($info);
		//$info['oldimg']=$info['image'];
		//var_dump($info);
		$this->render('form_edit', $info);

	}

	public function action_edit(){
		if(isset($_POST['editbouton'])){
			$m = Model::getModel();
			$id = $this->verif_syntaxe("edit");
			//var_dump($_FILES);
			if($_FILES['img']['name'] == ''){
				$nom_img=$_GET['image'];
			}else{
				$nom_img = $this->gestion_img();
				$list = $this->listImage();
				foreach ($list as $c => $v) {
					$nom=substr($v, 0, -4);
					if($nom == $_GET['image']){
						unlink("../img/".$v);
					}
				}
			}
			$new = [
				"id" => $_GET['id'],
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

			$m->editById($new);
			$data = ['nb' => $m->nbChallenge()];
			$this->render('nombre', $data);
		}
	}

}

?>