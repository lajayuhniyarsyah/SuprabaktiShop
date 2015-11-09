<?php
class ModelCatalogTestimonial extends Model {
	public function getTestimonial($testimonial_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "testimonial WHERE testimonial_id = '" . (int)$testimonial_id . "' AND status = '1'");
	
		return $query->rows;
	}
	
	public function getTestimonials($start = 0, $limit = 20) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "testimonial WHERE status = '1' ORDER BY RAND() DESC LIMIT " . (int)$start . "," . (int)$limit);
	
		return $query->rows;
	}
	
	public function getTotalTestimonials() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "testimonial WHERE status = '1'");
			
		return $query->row['total'];
	}
	
	
	public function addTestimonial($data, $status) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "testimonial SET status = '".$status."', rating = '".$this->db->escape($data['rating'])."', name='".$this->db->escape($data['name'])."', city = '".$this->db->escape($data['city'])."', email='".$this->db->escape($data['email'])."', date_added = NOW(), title = '" . $this->db->escape($data['title']) . "', description = '" . $this->db->escape(strip_tags($data['description'],'<p><b><i>')) . "'");
		$this->cache->delete('testimonial');
	}
}
?>
