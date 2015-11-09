<?php
class ModelCatalogTestimonial extends Model {
	public function addTestimonial($data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "testimonial SET name='".$this->db->escape($data['name'])."', city = '".$this->db->escape($data['city'])."', status = '" . (int)$data['status'] . "',date_added = NOW(), title = '" . $this->db->escape($data['title']) . "', description = '" . $this->db->escape($data['description']) . "'");
		$this->cache->delete('testimonial');
	}
	
	public function editTestimonial($testimonial_id, $data) {
		$this->db->query("UPDATE " . DB_PREFIX . "testimonial SET name='".$this->db->escape($data['name'])."', city = '".$this->db->escape($data['city'])."', status = '" . (int)$data['status'] . "',date_added = '".$this->db->escape($data['date_added'])."', title = '" . $this->db->escape($data['title']) . "', description = '" . $this->db->escape($data['description']) . "' WHERE testimonial_id = '" . (int)$testimonial_id . "'");
		$this->cache->delete('testimonial');
	}
	
	public function deleteTestimonial($testimonial_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "testimonial WHERE testimonial_id = '" . (int)$testimonial_id . "'");
		$this->cache->delete('testimonial');
	}	

	public function getTestimonial($testimonial_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "testimonial WHERE testimonial_id = '" . (int)$testimonial_id . "'");
		return $query->row;
	}
		
	public function getTestimonials($data = array()) {
	
		if ($data) {
			$sql = "SELECT * FROM " . DB_PREFIX . "testimonial";
		
			$sort_data = array(
				'title',
				'name',
				'date_added',
				'status'
			);		
		
		
			if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
				$sql .= " ORDER BY " . $data['sort'];	
			} else {
				$sql .= " ORDER BY title";	
			}
			
			if (isset($data['order']) && ($data['order'] == 'DESC')) {
				$sql .= " DESC";
			} else {
				$sql .= " ASC";
			}
		
			if (isset($data['start']) || isset($data['limit'])) {
				if ($data['start'] < 0) {
					$data['start'] = 0;
				}		

				if ($data['limit'] < 1) {
					$data['limit'] = 20;
				}	
			
				$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
			}	
			//print_r($sql);exit;
			$query = $this->db->query($sql);
			
			
			
			return $query->rows;
		} else {
			$testimonial_data = $this->cache->get('testimonial');
		
			if (!$testimonial_data) {
				$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "testimonial ORDER BY title");
	
				$testimonial_data = $query->rows;
			
				$this->cache->set('testimonial', $testimonial_data);
			}	
	
			return $testimonial_data;			
		}
	}
	
	public function getTotalTestimonials() {
      	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "testimonial");
		
		return $query->row['total'];
	}	



	public function createDatabaseTables() {
		$sql  = "CREATE TABLE IF NOT EXISTS `".DB_PREFIX."testimonial` ( ";
		$sql .= "`testimonial_id` int(11) NOT NULL AUTO_INCREMENT, ";
		$sql .= "`name` varchar(64) COLLATE utf8_bin NOT NULL, ";
		$sql .= "`city` varchar(64) COLLATE utf8_bin DEFAULT NULL, "; 
		$sql .= "`email` varchar(96) COLLATE utf8_bin DEFAULT NULL, ";
		$sql .= "`status` int(1) NOT NULL DEFAULT '0', ";
		$sql .= "`rating` int(1) NOT NULL DEFAULT '0', ";
		$sql .= "`date_added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00', ";
		$sql .= "`title` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '', ";
		$sql .= "`description` text COLLATE utf8_unicode_ci NOT NULL, ";
		$sql .= "PRIMARY KEY (`testimonial_id`) ";
		$sql .= ") ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;";
		$this->db->query($sql);
	}
	
	
	public function dropDatabaseTables() {
		$sql = "DROP TABLE IF EXISTS `".DB_PREFIX."testimonial`;";
		$this->db->query($sql);
	}

}
?>
