<?php  
class ControllerCommonHome extends Controller {
	public function index() {
		$this->document->setTitle($this->config->get('config_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));

		$this->data['heading_title'] = $this->config->get('config_title');
		
        //----------------------------------------------------------------------
		// tokoonline
		
        $tkcmodule_enable = $this->config->get('tkcmodule_enable_home');	
        $this->data['tkcmodule_enable_home'] = $tkcmodule_enable;
        
        if ($tkcmodule_enable) {
		
			$this->load->model('design/banner');
			$this->load->model('tool/image');
			
			$this->document->addScript('catalog/view/javascript/jquery/nivo-slider/jquery.nivo.slider.pack.js');
			
			if (file_exists('catalog/view/theme/' . $this->config->get('config_template') . '/stylesheet/slideshow.css')) {
				$this->document->addStyle('catalog/view/theme/' . $this->config->get('config_template') . '/stylesheet/slideshow.css');
			} else {
				$this->document->addStyle('catalog/view/theme/default/stylesheet/slideshow.css');
			}
			
			$this->data['banner0'] = array();
			$this->data['banner1'] = array();
			$this->data['banner2'] = array();
			$this->data['banner3'] = array();
			$this->data['banner4'] = array();
  	      	
  	    	$big_banner_id = $this->config->get('tkcmodule_big_banner');	
        	$small_banner_id = $this->config->get('tkcmodule_small_banner');
        	$layout = $this->config->get('tkcmodule_banner_layout');
        	
      	
        	if ($layout == 0 || $layout == 1) {
        	    $all_width = 970;
        	    $all_height = 440;
        	    $big_width = 725;
        	    $big_height = 430;
        	} else {
        	    $all_width = 970;
        	    $all_height = 550;
        	    $big_width = 970;
        	    $big_height = 430;
            }	
        		
        	switch ($layout) {
        	    case 0:
        	      $big_x = 0;
        	      $big_y = 0;
        	      $small_x = 735;
        	      $small_y = 0;
        	      $small_dx = 0;
        	      $small_dy = 110;
        	      break;
        	    case 1:
        	      $big_x = 245;
        	      $big_y = 0;
        	      $small_x = 0;
        	      $small_y = 0;
        	      $small_dx = 0;
        	      $small_dy = 110;
        	      break;
        	    case 2:
        	      $big_x = 0;
        	      $big_y = 0;
        	      $small_x = 0;
        	      $small_y = 440;
        	      $small_dx = 245;
        	      $small_dy = 0;
        	      break;
        	    case 3:
        	      $big_x = 0;
        	      $big_y = 110;
        	      $small_x = 0;
        	      $small_y = 0;
        	      $small_dx = 245;
        	      $small_dy = 0;
        	      break;
        	}
        		
			if (isset($big_banner_id)) {
				$results = $this->model_design_banner->getBanner($big_banner_id);		
				foreach ($results as $result) {
					if (file_exists(DIR_IMAGE . $result['image'])) {
						$this->data['banner0'][] = array(
							'title' => $result['title'],
							'link'  => $result['link'],
							'image' => $this->model_tool_image->resize($result['image'], $big_width, $big_height)
						);
					}
				}
			}
			
			if (isset($small_banner_id)) {
				$results = $this->model_design_banner->getBanner($small_banner_id);
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
			
			
			$this->data['tkcmodule_style'] = "width: " . $all_width . "px; height: " . $all_height . "px; position: relative; margin: 5px auto;";
			$this->data['tkcmodule_banner0_style'] = "width: " . $big_width . "px; height: " . $big_height . "px; position: absolute; left: " . $big_x . "px; top: " . $big_y . "px;";
			
			for ($i=0; $i < 4; $i++) {
                $this->data['tkcmodule_banner' . ($i+1) . '_style'] = "width: 235px; height: 100px; position: absolute; left: " . ($small_x + ($i * $small_dx)) . "px; top: " . ($small_y + ($i * $small_dy)) . "px;";
		    }
		}
		
        //----------------------------------------------------------------------

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/home.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/common/home.tpl';
		} else {
			$this->template = 'default/template/common/home.tpl';
		}
		
		$this->children = array(
			'common/column_left',
			'common/column_right',
			'common/content_top',
			'common/content_bottom',
			'common/footer',
			'common/header'
		);
										
		$this->response->setOutput($this->render());
	}
}
?>
