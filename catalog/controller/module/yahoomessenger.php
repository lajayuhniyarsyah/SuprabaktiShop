<?php  
class ControllerModuleyahoomessenger extends Controller {
	protected function index() {
		$this->language->load('module/yahoomessenger');

    $this->data['heading_title'] = $this->language->get('heading_title');
		
		$code = html_entity_decode($this->config->get('yahoomessenger_code'));
		$code = trim($code);
		$last_pos = strrpos($code ,";");
		$code_length = strlen($code); 
		if ($last_pos == ($code_length - 1)) $code = substr($code,0, $code_length - 1);

		$code = explode(';', $code);
		$t  = strip_tags($this->config->get('yahoomessenger_style'));
		$dat='';
		foreach ($code as $codes){
			$str = explode(':', $codes);
			$dat .='<a href="ymsgr:sendim?'.$str[0].'"><img src="http://opi.yahoo.com/online?u='.$str[0].'&amp;m=g&amp;t=' . $t . ' "></a></br><b>'.$str[1].'</b></br>';
		}
		$this->data['code'] = $dat;
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/yahoomessenger.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/module/yahoomessenger.tpl';
		} else {
			$this->template = 'default/template/module/yahoomessenger.tpl';
		}
		
		$this->render();
	}
}
?>