<?php
class Controller_nombre extends Controller{

	public function action_default(){
		$this->action_page_nombre();
	}

	public function action_page_nombre(){
		$m = Model::getModel();
		$data = ["nb" => $m->nbChallenge()];
		$this->render("nombre", $data);
	}
}

?>