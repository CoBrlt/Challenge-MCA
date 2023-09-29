<?php
class Controller_information extends Controller{

	public function action_default(){
		$this->action_info_by_id();
	}

	public function action_info_by_id(){
		if(isset($_GET['id'])){
			$m = Model::getModel();
			$data = ["info" => $m->getInfoId($_GET['id'])];
			$this->render("information", $data);
		}
	}
}