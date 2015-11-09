<?php  
class ControllerCommonFooter extends Controller {
	protected function index() {

		$this->language->load('common/footer');
		
		$this->data['text_information'] = $this->language->get('text_information');
		$this->data['text_service'] = $this->language->get('text_service');
		$this->data['text_extra'] = $this->language->get('text_extra');
		$this->data['text_contact'] = $this->language->get('text_contact');
		$this->data['text_return'] = $this->language->get('text_return');
    	$this->data['text_sitemap'] = $this->language->get('text_sitemap');
		$this->data['text_manufacturer'] = $this->language->get('text_manufacturer');
		$this->data['text_voucher'] = $this->language->get('text_voucher');
		$this->data['text_affiliate'] = $this->language->get('text_affiliate');
		$this->data['text_special'] = $this->language->get('text_special');
		$this->data['text_account'] = $this->language->get('text_account');
		$this->data['text_order'] = $this->language->get('text_order');
		$this->data['text_wishlist'] = $this->language->get('text_wishlist');
		$this->data['text_newsletter'] = $this->language->get('text_newsletter');
		
		$this->load->model('catalog/information');
		
		$this->data['informations'] = array();

		foreach ($this->model_catalog_information->getInformations() as $result) {
			if ($result['bottom']) {
				$this->data['informations'][] = array(
					'title' => $result['title'],
					'href'  => $this->url->link('information/information', 'information_id=' . $result['information_id'])
				);
			}
    	}

		$this->data['contact'] = $this->url->link('information/contact');
		$this->data['return'] = $this->url->link('account/return/insert', '', 'SSL');
    	$this->data['sitemap'] = $this->url->link('information/sitemap');
		$this->data['manufacturer'] = $this->url->link('product/manufacturer');
		$this->data['voucher'] = $this->url->link('account/voucher', '', 'SSL');
		$this->data['affiliate'] = $this->url->link('affiliate/account', '', 'SSL');
		$this->data['special'] = $this->url->link('product/special');
		$this->data['account'] = $this->url->link('account/account', '', 'SSL');
		$this->data['order'] = $this->url->link('account/order', '', 'SSL');
		$this->data['wishlist'] = $this->url->link('account/wishlist', '', 'SSL');
		$this->data['newsletter'] = $this->url->link('account/newsletter', '', 'SSL');		

		$this->data['powered'] = sprintf($this->language->get('text_powered'), $this->config->get('config_name'), date('Y', time()));
		
		// tokoonline	
        $this->data['email'] = $this->config->get('config_email');	
        $this->data['phone'] = $this->config->get('config_telephone');	
        $this->data['pinbb'] = $this->config->get('tkcmodule_pinbb');	
        $this->data['facebook'] = $this->config->get('tkcmodule_facebook');	
        $this->data['twitter'] = $this->config->get('tkcmodule_twitter');	
        $this->data['googleplus'] = $this->config->get('tkcmodule_googleplus');	
        $this->data['rss'] = $this->config->get('tkcmodule_rss');

        if (!$this->data['facebook'])
          $this->data['facebook'] = '#';	
        if (!$this->data['twitter'])
          $this->data['twitter'] = '#';	
        if (!$this->data['googleplus'])
          $this->data['googleplus'] = '#';	
        if (!$this->data['rss'])
          $this->data['rss'] = '#';	
		
		$this->load->model('design/banner');
		$this->load->model('tool/image');

		$this->data['banner1'] = array();
		$this->data['banner2'] = array();
		$this->data['banner3'] = array();
		$this->data['banner4'] = array();

        $tkcmodule_enable = $this->config->get('tkcmodule_enable_footer');	
        $this->data['tkcmodule_enable_footer'] = $tkcmodule_enable;
		
		if ($tkcmodule_enable) {
		
      	    $footer_banner_id = $this->config->get('tkcmodule_footer_banner');
		
            if (isset($footer_banner_id)) {
			    $results = $this->model_design_banner->getBanner($footer_banner_id);
  	               while (count($results) < 4) {
  	                 $results[] = array(
  	                    'title' => '',
  	                    'link' => '',
  	                    'image' => 'tkcmodule/blank.jpg'
  	                 );
  	               }		

                   for ($i=0; $i < 4; $i++) {
    			    $result = $results[$i];
    				if (file_exists(DIR_IMAGE . $result['image'])) {
    					$this->data['banner' . ($i + 1)] = array(
    						'title' => $result['title'],
    						'link'  => $result['link'],
    						'image' => $this->model_tool_image->resize($result['image'], 235, 100)
    					);
    				}	
    			}
    		}
    			
    			
    		$this->data['tkcmodule_style'] = "width: 970px; height: 100px; position: relative; clear: both; margin: 10px auto;";
    			
    		for ($i=0; $i < 4; $i++) {
                $this->data['tkcmodule_banner' . ($i+1) . '_style'] = "width: 235px; height: 100px; position: absolute; left: " . ($i * 245) . "px; top: 0px;";
    		}
		
		}

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/footer.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/common/footer.tpl';
		} else {
			$this->template = 'default/template/common/footer.tpl';
		}
		
		$this->render();
	}
}
?>
