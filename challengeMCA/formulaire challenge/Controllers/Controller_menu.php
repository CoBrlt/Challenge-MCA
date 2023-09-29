<?php
class Controller_menu extends Controller{

	public function action_default(){
		$this->action_menu();
	}

	public function action_menu(){
		$m = Model::getModel();
		$taball = $m -> getInfoMenu();
		if(count($taball) != 0){
			$tabcate = array_keys($taball[0]);			
		}else{
			$tabcate = [];
		}
		$data = ["taball" => $taball, "tabcate" => $tabcate];
		$this->render("menu", $data);
		
	}

	public function action_delete_by_id(){
		if(isset($_GET['id'])){
			$m = Model::getModel();
			$img = $m->getNomImage_by_id($_GET['id']);
			$list = $this->listImage();
			foreach ($list as $c => $v) {
				$nom=substr($v, 0, -4);
				if($nom == $img){
					unlink("../img/".$v);
					$m -> deleteById($_GET['id']);
					$this->action_menu();
				}
			}
		}

	}

}

?>