<?php
class ControllerStep5 extends Controller {
	public function index() {
		$this->children = array(
			'header',
			'footer'
		);
		
		$this->template = 'step_5.tpl';

		$this->response->setOutput($this->render());
	}
}
?>