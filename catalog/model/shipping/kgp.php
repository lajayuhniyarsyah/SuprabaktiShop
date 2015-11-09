<?php
class ModelShippingKgp extends Model {
	function getQuote($address) {
		$this->load->language('shipping/kgp');
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone_to_geo_zone WHERE geo_zone_id = '" . (int)$this->config->get('kgp_geo_zone_id') . "' AND country_id = '" . (int)$address['country_id'] . "' AND (zone_id = '" . (int)$address['zone_id'] . "' OR zone_id = '0')");
	
		if (!$this->config->get('kgp_geo_zone_id')) {
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
				$cost = $query->row['kgp'];
			
			//$total_weight = ceil($this->cart->getWeight());
			$total_weight = ceil($this->weight->convert($this->cart->getWeight(), $this->config->get('config_weight_class_id'), '1'));	
				
			if ($cost == 0) {
			
				$quote_data = array();
				$quote_data['kgp'] = array(
					'code'         => 'kgp.kgp',
					'title'        => sprintf($this->language->get('text_description'), $address['city'] . ', ' . $address['zone'], $total_weight), 
					'cost'         => 0.0,
					'tax_class_id' => 0,
					'text'         => $this->currency->format(0.0)
				);

				$method_data = array(
					'code'       => 'kgp',
					'title'      => $this->language->get('text_title'),
					'quote'      => $quote_data,
					'sort_order' => $this->config->get('kgp_sort_order'),
					'error'      => sprintf($this->language->get('text_not_available'), $address['city'] . ', ' . $address['zone'])
				);
			
			} else {
			
			
				$total_cost = $total_weight * $cost;
				
				$quote_data = array();
				$quote_data['kgp'] = array(
					'code'         => 'kgp.kgp',
					'title'        => sprintf($this->language->get('text_description'), $address['city'] . ', ' . $address['zone'], $total_weight), 
					'cost'         => $total_cost,
					'tax_class_id' => 0,
					'text'         => $this->currency->format($total_cost)
				);

				$method_data = array(
					'code'       => 'kgp',
					'title'      => $this->language->get('text_title'),
					'quote'      => $quote_data,
					'sort_order' => $this->config->get('kgp_sort_order'),
					'error'      => false
				);

			}
			
		}
	
		return $method_data;
	}
}
?>
