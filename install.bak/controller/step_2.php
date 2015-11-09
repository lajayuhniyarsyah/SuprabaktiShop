<?php
class ControllerStep2 extends Controller {
	private $error = array();
	
	public function index() {
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && ($this->validate())) {
			$this->redirect(HTTP_SERVER . 'index.php?route=step_3');
		}

		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';	
		}
		
		$this->data['action'] = HTTP_SERVER . 'index.php?route=step_2';

		$this->data['config_catalog'] = DIR_OPENCART . 'config.php';
		$this->data['config_admin'] = DIR_OPENCART . 'admin/config.php';
		
		$this->data['cache'] = DIR_SYSTEM . 'cache';
		$this->data['logs'] = DIR_SYSTEM . 'logs';
		$this->data['image'] = DIR_OPENCART . 'image';
		$this->data['image_cache'] = DIR_OPENCART . 'image/cache';
		$this->data['image_data'] = DIR_OPENCART . 'image/data';
		$this->data['download'] = DIR_OPENCART . 'download';
		
		$this->template = 'step_2.tpl';

		$this->children = array(
			'header',
			'footer'
		);		
		
		$this->response->setOutput($this->render());
	}
	
	private function validate() {
		if (phpversion() < '5.0') {
			$this->error['warning'] = 'Warning: Anda harus menggunakan PHP5 atau yang lebih baru!';
		}

		if (!ini_get('file_uploads')) {
			$this->error['warning'] = 'Warning: file_uploads harus diaktifkan di setting PHP!';
		}
	
		if (ini_get('session.auto_start')) {
			$this->error['warning'] = 'Warning: session.auto_start harus dinonaktifkan terlebih dahulu!';
		}
		
		if (!extension_loaded('mysql')) {
			$this->error['warning'] = 'Warning: MySQL extension harus diaktifkan terlebih dahulu!';
		}
				
		if (!extension_loaded('gd')) {
			$this->error['warning'] = 'Warning: GD extension harus diaktifkan terlebih dahulu!';
		}

		if (!extension_loaded('curl')) {
			$this->error['warning'] = 'Warning: CURL extension harus diaktifkan terlebih dahulu!';
		}

		//if (!function_exists('mcrypt_encrypt')) {
		//	$this->error['warning'] = 'Warning: mCrypt extension harus diaktifkan terlebih dahulu!';
		//}
				
		if (!extension_loaded('zlib')) {
			$this->error['warning'] = 'Warning: ZLIB extension harus diaktifkan terlebih dahulu!';
		}
	
		if (!is_writable(DIR_OPENCART . 'config.php')) {
			$this->error['warning'] = 'Warning: config.php harus bisa ditulisi! Coba ubah menggunakan FTP atau CHMOD.';
		}
				
		if (!is_writable(DIR_OPENCART . 'admin/config.php')) {
			$this->error['warning'] = 'Warning: admin/config.php harus bisa ditulisi! Coba ubah menggunakan FTP atau CHMOD.';
		}

		if (!is_writable(DIR_SYSTEM . 'cache')) {
			$this->error['warning'] = 'Warning: Cache folder harus bisa ditulisi! Coba ubah menggunakan FTP atau CHMOD.';
		}
		
		if (!is_writable(DIR_SYSTEM . 'logs')) {
			$this->error['warning'] = 'Warning: Logs folder harus bisa ditulisi! Coba ubah menggunakan FTP atau CHMOD.';
		}
		
		if (!is_writable(DIR_OPENCART . 'image')) {
			$this->error['warning'] = 'Warning: Image folder harus bisa ditulisi! Coba ubah menggunakan FTP atau CHMOD.';
		}

		if (!is_writable(DIR_OPENCART . 'image/cache')) {
			$this->error['warning'] = 'Warning: Image cache folder harus bisa ditulisi! Coba ubah menggunakan FTP atau CHMOD.';
		}
		
		if (!is_writable(DIR_OPENCART . 'image/data')) {
			$this->error['warning'] = 'Warning: Image data folder harus bisa ditulisi! Coba ubah menggunakan FTP atau CHMOD.';
		}
		
		if (!is_writable(DIR_OPENCART . 'download')) {
			$this->error['warning'] = 'Warning: Download folder harus bisa ditulisi! Coba ubah menggunakan FTP atau CHMOD.';
		}
		
    	if (!$this->error) {
      		return true;
    	} else {
      		return false;
    	}
	}
}
?>
