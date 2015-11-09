<?php
class ControllerStep4 extends Controller {
	private $error = array();
	
	public function index() {
	
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {

			error_reporting(E_ERROR | E_WARNING | E_PARSE);
			require_once(DIR_OPENCART . 'config.php');

			$this->request->post['db_host'] = DB_HOSTNAME;
			$this->request->post['db_user'] = DB_USERNAME;
			$this->request->post['db_password'] = DB_PASSWORD;
			$this->request->post['db_name'] = DB_DATABASE;
			$this->request->post['db_prefix'] = DB_PREFIX;
			
			$this->load->model('tokocepat');
			
			$this->model_tokocepat->mysql($this->request->post);
			
			$this->redirect(HTTP_SERVER . 'index.php?route=step_5');
		}
		
		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}

		if (isset($this->error['store_name'])) {
			$this->data['error_store_name'] = $this->error['store_name'];
		} else {
			$this->data['error_store_name'] = '';
		}
		
		if (isset($this->error['store_owner'])) {
			$this->data['error_store_owner'] = $this->error['store_owner'];
		} else {
			$this->data['error_store_owner'] = '';
		}
		
		if (isset($this->error['store_address'])) {
			$this->data['error_store_address'] = $this->error['store_address'];
		} else {
			$this->data['error_store_address'] = '';
		}

		if (isset($this->error['store_email'])) {
			$this->data['error_store_email'] = $this->error['store_email'];
		} else {
			$this->data['error_store_email'] = '';
		}
		
		if (isset($this->error['store_phone'])) {
			$this->data['error_store_phone'] = $this->error['store_phone'];
		} else {
			$this->data['error_store_phone'] = '';
		}		
		
		if (isset($this->error['store_jne'])) {
			$this->data['error_store_jne'] = $this->error['store_jne'];
		} else {
			$this->data['error_store_jne'] = '';
		}		
		
		$this->data['action'] = HTTP_SERVER . 'index.php?route=step_4';
		
		if (isset($this->request->post['store_name'])) {
			$this->data['store_name'] = $this->request->post['store_name'];
		} else {
			$this->data['store_name'] = '';
		}
		
		if (isset($this->request->post['store_owner'])) {
			$this->data['store_owner'] = $this->request->post['store_owner'];
		} else {
			$this->data['store_owner'] = '';
		}
		
		if (isset($this->request->post['store_address'])) {
			$this->data['store_address'] = $this->request->post['store_address'];
		} else {
			$this->data['store_address'] = '';
		}
		
		if (isset($this->request->post['store_email'])) {
			$this->data['store_email'] = $this->request->post['store_email'];
		} else {
			$this->data['store_email'] = '';
		}
		
		if (isset($this->request->post['store_phone'])) {
			$this->data['store_phone'] = $this->request->post['store_phone'];
		} else {
			$this->data['store_phone'] = '';
		}
		
		if (isset($this->request->post['store_fax'])) {
			$this->data['store_fax'] = $this->request->post['store_fax'];
		} else {
			$this->data['store_fax'] = '';
		}
		
		if (isset($this->request->post['yahoo_id1'])) {
			$this->data['yahoo_id1'] = $this->request->post['yahoo_id1'];
		} else {
			$this->data['yahoo_id1'] = '';
		}
		
		if (isset($this->request->post['yahoo_name1'])) {
			$this->data['yahoo_name1'] = $this->request->post['yahoo_name1'];
		} else {
			$this->data['yahoo_name1'] = 'Customer Service';
		}
		
		if (isset($this->request->post['yahoo_id2'])) {
			$this->data['yahoo_id2'] = $this->request->post['yahoo_id2'];
		} else {
			$this->data['yahoo_id2'] = '';
		}
		
		if (isset($this->request->post['yahoo_name2'])) {
			$this->data['yahoo_name2'] = $this->request->post['yahoo_name2'];
		} else {
			$this->data['yahoo_name2'] = 'Customer Service';
		}
		
		if (isset($this->request->post['yahoo_id3'])) {
			$this->data['yahoo_id3'] = $this->request->post['yahoo_id3'];
		} else {
			$this->data['yahoo_id3'] = '';
		}
		
		if (isset($this->request->post['yahoo_name3'])) {
			$this->data['yahoo_name3'] = $this->request->post['yahoo_name3'];
		} else {
			$this->data['yahoo_name3'] = 'Customer Service';
		}
		
		if (isset($this->request->post['store_jne'])) {
			$this->data['store_jne'] = $this->request->post['store_jne'];
		} else {
			$this->data['store_jne'] = '';
		}
		
		if (isset($this->request->post['acc_bca_no'])) {
			$this->data['acc_bca_no'] = $this->request->post['acc_bca_no'];
		} else {
			$this->data['acc_bca_no'] = '';
		}
		
		if (isset($this->request->post['acc_bca_an'])) {
			$this->data['acc_bca_an'] = $this->request->post['acc_bca_an'];
		} else {
			$this->data['acc_bca_an'] = '';
		}
		
		if (isset($this->request->post['acc_mandiri_no'])) {
			$this->data['acc_mandiri_no'] = $this->request->post['acc_mandiri_no'];
		} else {
			$this->data['acc_mandiri_no'] = '';
		}
		
		if (isset($this->request->post['acc_mandiri_an'])) {
			$this->data['acc_mandiri_an'] = $this->request->post['acc_mandiri_an'];
		} else {
			$this->data['acc_mandiri_an'] = '';
		}
		
		if (isset($this->request->post['acc_bni_no'])) {
			$this->data['acc_bni_no'] = $this->request->post['acc_bni_no'];
		} else {
			$this->data['acc_bni_no'] = '';
		}
		
		if (isset($this->request->post['acc_bni_an'])) {
			$this->data['acc_bni_an'] = $this->request->post['acc_bni_an'];
		} else {
			$this->data['acc_bni_an'] = '';
		}
		
		if (isset($this->request->post['acc_bri_no'])) {
			$this->data['acc_bri_no'] = $this->request->post['acc_bri_no'];
		} else {
			$this->data['acc_bri_no'] = '';
		}
		
		if (isset($this->request->post['acc_bri_an'])) {
			$this->data['acc_bri_an'] = $this->request->post['acc_bri_an'];
		} else {
			$this->data['acc_bri_an'] = '';
		}
		
		if (isset($this->request->post['acc_niaga_no'])) {
			$this->data['acc_niaga_no'] = $this->request->post['acc_niaga_no'];
		} else {
			$this->data['acc_niaga_no'] = '';
		}
		
		if (isset($this->request->post['acc_niaga_an'])) {
			$this->data['acc_niaga_an'] = $this->request->post['acc_niaga_an'];
		} else {
			$this->data['acc_niaga_an'] = '';
		}
		
		if (isset($this->request->post['acc_permata_no'])) {
			$this->data['acc_permata_no'] = $this->request->post['acc_permata_no'];
		} else {
			$this->data['acc_permata_no'] = '';
		}
		
		if (isset($this->request->post['acc_permata_an'])) {
			$this->data['acc_permata_an'] = $this->request->post['acc_permata_an'];
		} else {
			$this->data['acc_permata_an'] = '';
		}
		
		
		$this->template = 'step_4.tpl';
		$this->children = array(
			'header',
			'footer'
		);
		
		$this->response->setOutput($this->render());		
	}
	
	private function validate() {
		if (!$this->request->post['store_name']) {
			$this->error['store_name'] = 'Nama toko harap diisi!';
		}

		if (!$this->request->post['store_owner']) {
			$this->error['store_owner'] = 'Nama pemilik toko harap diisi!';
		}

		if (!$this->request->post['store_address']) {
			$this->error['store_address'] = 'Alamat toko harap diisi!';
		}
		
		if (!$this->request->post['store_phone']) {
			$this->error['store_phone'] = 'Telepon toko harap diisi!';
		}

		if ((utf8_strlen($this->request->post['store_email']) > 96) || !preg_match('/^[^\@]+@.*\.[a-z]{2,6}$/i', $this->request->post['store_email'])) {
			$this->error['store_email'] = 'E-Mail harap diisi dengan benar!';
		}

		if (!$this->request->post['store_jne']) {
			$this->error['store_jne'] = 'Kota pengiriman harap dipilih. Kalau tidak ada, pilih saja Jakarta, nanti bisa diubah datanya.';
		}

    	if (!$this->error) {
      		return true;
    	} else {
      		return false;
    	}		
	}
}
?>
