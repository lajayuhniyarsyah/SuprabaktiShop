<?php
class ModelTotalUnique extends Model {
	public function getTotal(&$total_data, &$total, &$taxes) {
    	if ($total > 0) {
		   if (isset($this->session->data['unique_number'])) {
		      $value = $this->session->data['unique_number'];
           } else {
              $value = rand(1, $this->config->get('unique_max'));
		      $this->session->data['unique_number'] = $value;
		   }

           $this->load->language('total/unique');
		   $total_data[] = array(
              'code'       => 'unique',
       		  'title'      => $this->language->get('text_unique'),
       		  'text'       => $this->currency->format($value),
       		  'value'      => $value,
			  'sort_order' => $this->config->get('unique_sort_order')
		   );
		   $total += $value;
		}
	}
}
?>
