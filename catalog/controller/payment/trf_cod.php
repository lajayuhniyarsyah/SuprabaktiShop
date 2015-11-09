<?php
class ControllerPaymentTrfCod extends Controller {
	protected function index() {
		$this->language->load('payment/trf_cod');
		
		$this->data['text_instruction'] = $this->language->get('text_instruction');
    	$this->data['text_area'] = $this->language->get('text_area');
    	$this->data['text_hours'] = $this->language->get('text_hours');
    	$this->data['text_phone'] = $this->language->get('text_phone');
		$this->data['text_detail1'] = $this->language->get('text_detail1');
		$this->data['text_detail2'] = $this->language->get('text_detail2');
		$this->data['text_logo'] = $this->language->get('text_logo');
		
		$this->data['button_confirm'] = $this->language->get('button_confirm');
		
		$this->data['area'] = $this->config->get('trf_cod_area');
		$this->data['hours'] = $this->config->get('trf_cod_hours');
		$this->data['phone'] = $this->config->get('trf_cod_phone');

		$this->data['continue'] = $this->url->link('checkout/success');
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/payment/trf_cod.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/payment/trf_cod.tpl';
		} else {
			$this->template = 'default/template/payment/trf_cod.tpl';
		}	
		
		$this->render(); 
	}
	
	public function confirm() {
		$this->language->load('payment/trf_cod');
		
		$this->load->model('checkout/order');
		
		$comment  = "<p><b>" . $this->language->get('text_title') . "</b><br/>" . $this->language->get('text_detail1') . "</p>";
		$comment .= "<p><b>" . $this->language->get('text_area') . "</b>" . $this->config->get('trf_cod_area') . "<br/>";
		$comment .= "<b>" . $this->language->get('text_hours') . "</b>" . $this->config->get('trf_cod_hours') . "<br/>";
		$comment .= "<b>" . $this->language->get('text_phone') . "</b>" . $this->config->get('trf_cod_phone') . "</p>";
		$comment .= "<p>" . $this->language->get('text_detail2') . "</p>";
		
		$this->model_checkout_order->confirm($this->session->data['order_id'], $this->config->get('trf_cod_order_status_id'), $comment, true);
	}
}
?>
