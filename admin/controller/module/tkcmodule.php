<?php
class ControllerModuleTkcModule extends Controller {
	private $error = array(); 
	
	public function index() {   
		$this->load->language('module/tkcmodule');

		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('setting/setting');
				
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('tkcmodule', $this->request->post);		
					
			$this->session->data['success'] = $this->language->get('text_success');
						
			$this->redirect($this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'));
		}
				
		$this->data['heading_title'] = $this->language->get('heading_title');

		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_content_top'] = $this->language->get('text_content_top');
		$this->data['text_content_bottom'] = $this->language->get('text_content_bottom');		
		$this->data['text_column_left'] = $this->language->get('text_column_left');
		$this->data['text_column_right'] = $this->language->get('text_column_right');
		
		$this->data['entry_enable_home'] = $this->language->get('entry_enable_home');
		$this->data['entry_big_banner'] = $this->language->get('entry_big_banner');
		$this->data['entry_small_banner'] = $this->language->get('entry_small_banner');
		$this->data['entry_banner_layout'] = $this->language->get('entry_banner_layout');
		$this->data['entry_enable_footer'] = $this->language->get('entry_enable_footer');
		$this->data['entry_footer_banner'] = $this->language->get('entry_footer_banner');
		$this->data['entry_pinbb'] = $this->language->get('entry_pinbb');
		$this->data['entry_facebook'] = $this->language->get('entry_facebook');
		$this->data['entry_twitter'] = $this->language->get('entry_twitter');
		$this->data['entry_googleplus'] = $this->language->get('entry_googleplus');
		$this->data['entry_rss'] = $this->language->get('entry_rss');
		
		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');
		
 		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}
		
  		$this->data['breadcrumbs'] = array();

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => false
   		);

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_module'),
			'href'      => $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
		
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('module/tkcmodule', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
		
		$this->data['action'] = $this->url->link('module/tkcmodule', 'token=' . $this->session->data['token'], 'SSL');
		
		$this->data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');
		
		if (isset($this->request->post['tkcmodule_enable_home'])) {
			$this->data['tkcmodule_enable_home'] = $this->request->post['tkcmodule_enable_home'];
		} else {
			$this->data['tkcmodule_enable_home'] = $this->config->get('tkcmodule_enable_home');
		}			

		if (isset($this->request->post['tkcmodule_big_banner'])) {
			$this->data['tkcmodule_big_banner'] = $this->request->post['tkcmodule_big_banner'];
		} else {
			$this->data['tkcmodule_big_banner'] = $this->config->get('tkcmodule_big_banner');
		}			

		if (isset($this->request->post['tkcmodule_small_banner'])) {
			$this->data['tkcmodule_small_banner'] = $this->request->post['tkcmodule_small_banner'];
		} else {
			$this->data['tkcmodule_small_banner'] = $this->config->get('tkcmodule_small_banner');
		}			

		if (isset($this->request->post['tkcmodule_banner_layout'])) {
			$this->data['tkcmodule_banner_layout'] = $this->request->post['tkcmodule_banner_layout'];
		} else {
			$this->data['tkcmodule_banner_layout'] = $this->config->get('tkcmodule_banner_layout');
		}			

		if (isset($this->request->post['tkcmodule_enable_footer'])) {
			$this->data['tkcmodule_enable_footer'] = $this->request->post['tkcmodule_enable_footer'];
		} else {
			$this->data['tkcmodule_enable_footer'] = $this->config->get('tkcmodule_enable_footer');
		}			

		if (isset($this->request->post['tkcmodule_footer_banner'])) {
			$this->data['tkcmodule_footer_banner'] = $this->request->post['tkcmodule_footer_banner'];
		} else {
			$this->data['tkcmodule_footer_banner'] = $this->config->get('tkcmodule_footer_banner');
		}			

		if (isset($this->request->post['tkcmodule_pinbb'])) {
			$this->data['tkcmodule_pinbb'] = $this->request->post['tkcmodule_pinbb'];
		} else {
			$this->data['tkcmodule_pinbb'] = $this->config->get('tkcmodule_pinbb');
		}			

		if (isset($this->request->post['tkcmodule_facebook'])) {
			$this->data['tkcmodule_facebook'] = $this->request->post['tkcmodule_facebook'];
		} else {
			$this->data['tkcmodule_facebook'] = $this->config->get('tkcmodule_facebook');
		}			

		if (isset($this->request->post['tkcmodule_twitter'])) {
			$this->data['tkcmodule_twitter'] = $this->request->post['tkcmodule_twitter'];
		} else {
			$this->data['tkcmodule_twitter'] = $this->config->get('tkcmodule_twitter');
		}			

		if (isset($this->request->post['tkcmodule_googleplus'])) {
			$this->data['tkcmodule_googleplus'] = $this->request->post['tkcmodule_googleplus'];
		} else {
			$this->data['tkcmodule_googleplus'] = $this->config->get('tkcmodule_googleplus');
		}			

		if (isset($this->request->post['tkcmodule_rss'])) {
			$this->data['tkcmodule_rss'] = $this->request->post['tkcmodule_rss'];
		} else {
			$this->data['tkcmodule_rss'] = $this->config->get('tkcmodule_rss');
		}			

		$this->load->model('design/layout');
		
		$this->data['layouts'] = $this->model_design_layout->getLayouts();

		$this->data['banner_layouts'] = array(
          array('layout_id' => '0', 'name' => 'Big Banner on left, Small Banners on right'),
          array('layout_id' => '1', 'name' => 'Big Banner on right, Small Banners on left'),
          array('layout_id' => '2', 'name' => 'Big Banner on top, Small Banners on bottom'),
          array('layout_id' => '3', 'name' => 'Big Banner on bottom, Small Banners on top')
        );

		$this->data['enables'] = array(
          array('id' => '0', 'name' => 'Disabled'),
          array('id' => '1', 'name' => 'Enabled')
        );

        $this->load->model('design/banner');
		
		$this->data['banners'] = $this->model_design_banner->getBanners();
		
		$this->template = 'module/tkcmodule.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput($this->render());
	}
	
	private function validate() {
		if (!$this->user->hasPermission('modify', 'module/tkcmodule')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		if (!$this->error) {
			return true;
		} else {
			return false;
		}	
	}
}
?>
