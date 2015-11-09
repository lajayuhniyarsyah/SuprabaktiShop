<?php
class ModelShippingJneyes extends Model {
	function getQuote($address) {
		$this->load->language('shipping/jneyes');
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone_to_geo_zone WHERE geo_zone_id = '" . (int)$this->config->get('jneyes_geo_zone_id') . "' AND country_id = '" . (int)$address['country_id'] . "' AND (zone_id = '" . (int)$address['zone_id'] . "' OR zone_id = '0')");
	
		if (!$this->config->get('jneyes_geo_zone_id')) {
			$status = true;
		} elseif ($query->num_rows) {
			$status = true;
		} else {
			$status = false;
		}
		
		$method_data = array();
	
		if ($status) {
			
			$cost = 0;
			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "city WHERE city_id = '" . (int)$address['city_id'] . "'");
			if ($query->num_rows)
				$cost = $query->row['jneyes'];
			
			//$total_weight = ceil($this->weight->convert($this->cart->getWeight(), $this->config->get('config_weight_class_id'), '1'));	
			$total_weight = $this->weight->convert($this->cart->getWeight(), $this->config->get('config_weight_class_id'), '1');	
			$frac = $total_weight - floor($total_weight);
			if ($total_weight < 1.0) {
			   $total_weight = 1.0;
			} elseif ($frac > 0.3) {
			   $total_weight = ceil($total_weight);
			} else {
			   $total_weight = floor($total_weight);
			}
				
			if ($cost == 0) {
			
				$quote_data = array();
				$quote_data['jneyes'] = array(
					'code'         => 'jneyes.jneyes',
					'title'        => sprintf($this->language->get('text_description'), $address['city'] . ', ' . $address['zone'], $total_weight), 
					'cost'         => 0.0,
					'tax_class_id' => 0,
					'text'         => $this->currency->format(0.0)
				);

				$method_data = array(
					'code'       => 'jneyes',
					'title'      => $this->language->get('text_title'),
					'quote'      => $quote_data,
					'sort_order' => $this->config->get('jneyes_sort_order'),
					'error'      => sprintf($this->language->get('text_not_available'), $address['city'] . ', ' . $address['zone'])
				);
			
			} else {
			
			
				$total_cost = $total_weight * $cost;
				
				$quote_data = array();
				$quote_data['jneyes'] = array(
					'code'         => 'jneyes.jneyes',
					'title'        => sprintf($this->language->get('text_description'), $address['city'] . ', ' . $address['zone'], $total_weight), 
					'cost'         => $total_cost,
					'tax_class_id' => 0,
					'text'         => $this->currency->format($total_cost)
				);

				$method_data = array(
					'code'       => 'jneyes',
					'title'      => $this->language->get('text_title'),
					'quote'      => $quote_data,
					'sort_order' => $this->config->get('jneyes_sort_order'),
					'error'      => false
				);

			}
			
		}
	
		return $method_data;
	}
}
?>
