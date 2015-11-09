<?php
class ModelTokocepat extends Model {

	private $banks;
	
	public function mysql($data) {
	
		$connection = mysql_connect($data['db_host'], $data['db_user'], $data['db_password']);
		
		mysql_select_db($data['db_name'], $connection);
		
		mysql_query("SET NAMES 'utf8'", $connection);
		mysql_query("SET CHARACTER SET utf8", $connection);
		
		$file = DIR_APPLICATION . 'opencart' . $data['store_jne'] .'.sql';
	
		if ($sql = file($file)) {
			$query = '';

			foreach($sql as $line) {
				$tsl = trim($line);

				if (($sql != '') && (substr($tsl, 0, 2) != "--") && (substr($tsl, 0, 1) != '#')) {
					$query .= $line;
  
					if (preg_match('/;\s*$/', $line)) {
						$query = str_replace("TRUNCATE `oc_", "TRUNCATE `" . $data['db_prefix'], $query);
						$query = str_replace("INSERT INTO `oc_", "INSERT INTO `" . $data['db_prefix'], $query);
						
						$result = mysql_query($query, $connection);
  
						if (!$result) {
							die(mysql_error());
						}
	
						$query = '';
					}
				}
			}
			
			mysql_query("SET CHARACTER SET utf8", $connection);
	
			mysql_query("SET @@session.sql_mode = 'MYSQL40'", $connection);

			mysql_query("UPDATE `" . $data['db_prefix'] . "setting` SET `value` = '" . $data['store_name'] . "' WHERE `group` = 'config' AND `key` = 'config_name'", $connection);
			mysql_query("UPDATE `" . $data['db_prefix'] . "setting` SET `value` = '" . $data['store_name'] . "' WHERE `group` = 'config' AND `key` = 'config_title'", $connection);
			mysql_query("UPDATE `" . $data['db_prefix'] . "setting` SET `value` = '" . $data['store_owner'] . "' WHERE `group` = 'config' AND `key` = 'config_owner'", $connection);
			mysql_query("UPDATE `" . $data['db_prefix'] . "setting` SET `value` = '" . $data['store_address'] . "' WHERE `group` = 'config' AND `key` = 'config_address'", $connection);
			mysql_query("UPDATE `" . $data['db_prefix'] . "setting` SET `value` = '" . $data['store_email'] . "' WHERE `group` = 'config' AND `key` = 'config_email'", $connection);
			mysql_query("UPDATE `" . $data['db_prefix'] . "setting` SET `value` = '" . $data['store_phone'] . "' WHERE `group` = 'config' AND `key` = 'config_telephone'", $connection);
			mysql_query("UPDATE `" . $data['db_prefix'] . "setting` SET `value` = '" . $data['store_fax'] . "' WHERE `group` = 'config' AND `key` = 'config_fax'", $connection);
			
			$str = '';
			if (($data['yahoo_id1'] != '') && ($data['yahoo_name1'] != '')) {
				$str = $data['yahoo_id1'] . ":" . $data['yahoo_name1'];
			}
			if (($data['yahoo_id2'] != '') && ($data['yahoo_name2'] != '')) {
				if ($str != '')
					$str .= ';';
				$str .= $data['yahoo_id2'] . ":" . $data['yahoo_name2'];
			}
			if (($data['yahoo_id3'] != '') && ($data['yahoo_name3'] != '')) {
				if ($str != '')
					$str .= ';';
				$str .= $data['yahoo_id3'] . ":" . $data['yahoo_name3'];
			}			
			if ($str != '') 
				mysql_query("UPDATE `" . $data['db_prefix'] . "setting` SET `value` = '" . $str . "' WHERE `group` = 'yahoomessenger' AND `key` = 'yahoomessenger_code'", $connection);
			
			$this->replace($connection, $data['db_prefix'] . "information_description", 'information_id', '3', 'description', $data['store_name'], $data['store_email'], $data['store_address']);
			$this->replace($connection, $data['db_prefix'] . "information_description", 'information_id', '4', 'description', $data['store_name'], $data['store_email'], $data['store_address']);
			$this->replace($connection, $data['db_prefix'] . "information_description", 'information_id', '5', 'description', $data['store_name'], $data['store_email'], $data['store_address']);
			$this->replace($connection, $data['db_prefix'] . "information_description", 'information_id', '7', 'description', $data['store_name'], $data['store_email'], $data['store_address']);

			$this->replace2($connection, $data['db_prefix'] . "setting", 'setting_id', '30174', 'value', $data['store_name'], $data['store_email'], $data['store_address']);

			mysql_query("DELETE FROM `" . $data['db_prefix'] . "setting` WHERE `group` = 'trf_bca'", $connection);
			mysql_query("DELETE FROM `" . $data['db_prefix'] . "setting` WHERE `group` = 'trf_permata'", $connection);
			mysql_query("DELETE FROM `" . $data['db_prefix'] . "setting` WHERE `group` = 'trf_cod'", $connection);
			mysql_query("DELETE FROM `" . $data['db_prefix'] . "setting` WHERE `group` = 'bank_accounts_common'", $connection);
		
			$this->banks = array();
		
			if (isset($data['acc_bca_no']) && isset($data['acc_bca_an']))
				$this->bank($connection, $data['db_prefix'], 'bca', "Bank BCA", $data['acc_bca_no'], $data['acc_bca_an'], '1');
				
			if (isset($data['acc_bni_no']) && isset($data['acc_bni_an']))
				$this->bank($connection, $data['db_prefix'], 'bni', "Bank BNI", $data['acc_bni_no'], $data['acc_bni_an'], '2');
				
			if (isset($data['acc_mandiri_no']) && isset($data['acc_mandiri_an']))
				$this->bank($connection, $data['db_prefix'], 'mandiri', "Bank Mandiri", $data['acc_mandiri_no'], $data['acc_mandiri_an'], '3');
				
			if (isset($data['acc_bri_no']) && isset($data['acc_bri_an']))
				$this->bank($connection, $data['db_prefix'], 'bri', "Bank BRI", $data['acc_bri_no'], $data['acc_bri_an'], '4');
				
			if (isset($data['acc_niaga_no']) && isset($data['acc_niaga_an']))
				$this->bank($connection, $data['db_prefix'], 'niaga', "Bank Niaga", $data['acc_niaga_no'], $data['acc_niaga_an'], '5');
				
			if (isset($data['acc_permata_no']) && isset($data['acc_permata_an']))
				$this->bank($connection, $data['db_prefix'], 'permata', "Bank Permata", $data['acc_permata_no'], $data['acc_permata_an'], '6');

			mysql_query("INSERT INTO `" . $data['db_prefix'] . "setting` (`group`, `key`, `value`, `serialized`, `store_id`) VALUES ('bank_accounts_common', 'accounts', '" . serialize($this->banks) . "', '1', '0');", $connection);

			mysql_close($connection);	
		}		
	}	
	
	private function replace($conn, $table, $rowidname, $rowid, $colname, $storename, $email, $address) {
	
		$res = mysql_query("SELECT `" . $colname . "` FROM `" . $table . "` WHERE `" . $rowidname . "` = " . $rowid, $conn);
		if ($arr = mysql_fetch_array($res)) {
			$str = $arr[0];
			$str = str_replace("TokoCepat.com", $storename, $str);
			$str = str_replace("store@tokocepat.com", $email, $str);
			$str = str_replace("@storeaddress@", $address, $str);
			mysql_query("UPDATE `" . $table . "` SET `" . $colname . "` = '" . $str . "' WHERE `" . $rowidname . "` = " . $rowid, $conn);
		}
	
	}
	
	private function replace2($conn, $table, $rowidname, $rowid, $colname, $storename, $email, $address) {
	
		$res = mysql_query("SELECT `" . $colname . "` FROM `" . $table . "` WHERE `" . $rowidname . "` = " . $rowid, $conn);		
		if ($arr = mysql_fetch_array($res)) {
			$val = unserialize($arr[0]);		
			$str = $val[1]['description'][2];
			$str = str_replace("TokoCepat.com", $storename, $str);
			$str = str_replace("store@tokocepat.com", $email, $str);
			$str = str_replace("@storeaddress@", $address, $str);
			$val[1]['description'][2] = $str;
			$val[1]['description'][3] = $str;
			mysql_query("UPDATE `" . $table . "` SET `" . $colname . "` = '" . mysql_real_escape_string(serialize($val)) . "' WHERE `" . $rowidname . "` = " . $rowid, $conn);
		}
	
	}
		
	private function bank($conn, $tbprefix, $prefix, $title, $accno, $accan, $order) {	
		
		if ($accno && $accan) {
		
			mysql_query("INSERT INTO `" . $tbprefix . "extension` (`type`, `code`) VALUES ('payment', 'trf_" . $prefix . "');", $conn);

			mysql_query("INSERT INTO `" . $tbprefix . "setting` (`group`, `key`, `value`) VALUES ('trf_" . $prefix . "', 'trf_" . $prefix . "_sort_order', '" . $order . "');", $conn);
			mysql_query("INSERT INTO `" . $tbprefix . "setting` (`group`, `key`, `value`) VALUES ('trf_" . $prefix . "', 'trf_" . $prefix . "_image', '" . $prefix . ".png');", $conn);
			mysql_query("INSERT INTO `" . $tbprefix . "setting` (`group`, `key`, `value`) VALUES ('trf_" . $prefix . "', 'trf_" . $prefix . "_status', '1');", $conn);
			mysql_query("INSERT INTO `" . $tbprefix . "setting` (`group`, `key`, `value`) VALUES ('trf_" . $prefix . "', 'trf_" . $prefix . "_geo_zone_id', '0');", $conn);
			mysql_query("INSERT INTO `" . $tbprefix . "setting` (`group`, `key`, `value`) VALUES ('trf_" . $prefix . "', 'trf_" . $prefix . "_order_status_id', '1');", $conn);
			mysql_query("INSERT INTO `" . $tbprefix . "setting` (`group`, `key`, `value`) VALUES ('trf_" . $prefix . "', 'trf_" . $prefix . "_total', '0.01');", $conn);
			mysql_query("INSERT INTO `" . $tbprefix . "setting` (`group`, `key`, `value`) VALUES ('trf_" . $prefix . "', 'trf_" . $prefix . "_title', '" . $title . "');", $conn);
			mysql_query("INSERT INTO `" . $tbprefix . "setting` (`group`, `key`, `value`) VALUES ('trf_" . $prefix . "', 'trf_" . $prefix . "_accountno', '" . $accno . "');", $conn);
			mysql_query("INSERT INTO `" . $tbprefix . "setting` (`group`, `key`, `value`) VALUES ('trf_" . $prefix . "', 'trf_" . $prefix . "_accountname', '" . $accan . "');", $conn);
			
			$this->banks['trf_' . $prefix]['accountno'] = $accno;
			$this->banks['trf_' . $prefix]['accountname'] = $accan;
			$this->banks['trf_' . $prefix]['image'] = $prefix . '.png';
			$this->banks['trf_' . $prefix]['title'] = $title;
			$this->banks['trf_' . $prefix]['info'] = sprintf("No. <b>%s</b><br/>A/n. <b>%s</b>", $accno, $accan);
		
		}
	}
	
}
?>
