<?php 
class ControllerInformationPayment extends Controller {
	private $error = array(); 
	    
  	public function index() {

        /*if (!$this->customer->isLogged()) {
	        $this->session->data['redirect'] = $this->url->link('information/payment', '', 'SSL');
	        $this->redirect($this->url->link('account/login', '', 'SSL'));
    	}*/

		$this->language->load('information/payment');
		$this->load->model('account/customer');
		$this->load->model('account/order');

    	$this->document->setTitle($this->language->get('heading_title'));  
	 
    	if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
    		$message  = "Data Pembelian\n";
			$message .= "------------------------------------------------------\n";
    		$message .= $this->language->get('entry_nama') . ' ' . $this->request->post['nama']. "\n";
			$message .= $this->language->get('entry_email') . ' ' . $this->request->post['email']. "\n";
			$message .= $this->language->get('entry_telp') . ' ' . $this->request->post['telp']. "\n";
			$message .= $this->language->get('entry_order_id') . ' ' . $this->request->post['order_id']. "\n\n";
			$message .= "Data Bank Pelanggan\n";
			$message .= "------------------------------------------------------\n";
    		$message .= $this->language->get('entry_dari_bank') . ' ' . $this->request->post['dari_bank']. "\n";
			$message .= $this->language->get('entry_no_rekening') . ' ' . $this->request->post['no_rekening']. "\n";
			$message .= $this->language->get('entry_pemilik') . ' ' . $this->request->post['pemilik']. "\n\n";
			$message .= "Data Pembayaran\n";
			$message .= "------------------------------------------------------\n";
    		$message .= $this->language->get('entry_ke_bank') . ' ' . $this->request->post['ke_bank']. "\n";
			$message .= $this->language->get('entry_jumlah') . ' ' . $this->request->post['jumlah']. "\n";
			$message .= $this->language->get('entry_tanggal') . ' ' . $this->request->post['tanggal']. "\n";
			$message .= $this->language->get('entry_berita') . ' ' . $this->request->post['berita']. "\n";
			
			$mail = new Mail();
            $mail->protocol = $this->config->get('config_mail_protocol');
			$mail->parameter = $this->config->get('config_mail_parameter');
			$mail->hostname = $this->config->get('config_smtp_host');
			$mail->username = $this->config->get('config_smtp_username');
			$mail->password = $this->config->get('config_smtp_password');
			$mail->port = $this->config->get('config_smtp_port');
			$mail->timeout = $this->config->get('config_smtp_timeout');				
			$mail->setTo($this->config->get('config_email'));
	  		$mail->setFrom($this->request->post['email']);
	  		$mail->setSender($this->request->post['nama']);
	  		$mail->setSubject(sprintf($this->language->get('email_subject'), $this->request->post['nama']));
	  		$mail->setText(html_entity_decode($message, ENT_QUOTES, 'UTF-8'));
      		$mail->send();

        	$this->load->model('checkout/order');
        	
        	if (preg_match("/Order #(\d+) /", $this->request->post['order_id'], $res)) {
			   $this->model_checkout_order->update($res[1], 2 /* processing */,
                 "Konfirmasi Transfer<br />" .
                 "===================<br /><br />" .
                 str_replace("\n", "<br />", $message),
                 false);				
			}

	  		$this->redirect($this->url->link('information/payment/success'));
    	}

      	$this->data['breadcrumbs'] = array();

      	$this->data['breadcrumbs'][] = array(
        	'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home'),        	
        	'separator' => false
      	);

      	$this->data['breadcrumbs'][] = array(
        	'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('information/payment'),
        	'separator' => $this->language->get('text_separator')
      	);	
      	
      	$this->data['orders'] = array();
			
		$results = $this->model_account_order->getOrdersPay();
      		
		foreach ($results as $result) {
        	$product_total = $this->model_account_order->getTotalOrderProductsByOrderId($result['order_id']);

        	$this->data['orders'][] = array(
          		'order_id'   => $result['order_id'],
          		'date_added' => date($this->language->get('date_format_short'), strtotime($result['date_added'])),
          		'products'   => $product_total,
          		'total'      => $this->currency->format($result['total'], $result['currency_code'], $result['currency_value'])
        	);
      	}
		
    	/*if (count($results) == 0) {
			$this->data['text_message'] = $this->language->get('text_empty');
		}*/
		
		$this->load->model('setting/setting');
		$setting = $this->model_setting_setting->getSetting('bank_accounts_common');
		$this->data['accounts'] = $setting['accounts'];
			
    	$this->data['heading_title'] = $this->language->get('heading_title');
    	$this->data['text_info'] = $this->language->get('text_info');
    	$this->data['text_pelanggan'] = $this->language->get('text_pelanggan');
    	$this->data['text_bayar'] = $this->language->get('text_bayar');
    	$this->data['text_select'] = $this->language->get('text_select');
    	
    	$this->data['text_pilih_transaksi'] = $this->language->get('text_pilih_transaksi');
    	$this->data['text_atm'] = $this->language->get('text_atm');
    	$this->data['text_internet_banking'] = $this->language->get('text_internet_banking');
    	
    	$this->data['text_bca'] = $this->language->get('text_bca');
    	$this->data['text_permata'] = $this->language->get('text_permata');

    	$this->data['entry_nama'] = $this->language->get('entry_nama');
    	$this->data['entry_email'] = $this->language->get('entry_email');
    	$this->data['entry_telp'] = $this->language->get('entry_telp');
    	$this->data['entry_order_id'] = $this->language->get('entry_order_id');
    	$this->data['entry_dari_bank'] = $this->language->get('entry_dari_bank');
    	$this->data['entry_no_rekening'] = $this->language->get('entry_no_rekening');
    	$this->data['entry_pemilik'] = $this->language->get('entry_pemilik');
    	$this->data['entry_ke_bank'] = $this->language->get('entry_ke_bank');
    	$this->data['entry_jumlah'] = $this->language->get('entry_jumlah');
    	$this->data['entry_tanggal'] = $this->language->get('entry_tanggal');
    	$this->data['entry_berita'] = $this->language->get('entry_berita');    	
		$this->data['entry_captcha'] = $this->language->get('entry_captcha');

		if (isset($this->error['nama'])) {
    		$this->data['error_nama'] = $this->error['nama'];
		} else {
			$this->data['error_nama'] = '';
		}		
		
 		if (isset($this->error['email'])) {
    		$this->data['error_email'] = $this->error['email'];
		} else {
			$this->data['error_email'] = '';
		}		
		if (isset($this->error['telp'])) {
    		$this->data['error_telp'] = $this->error['telp'];
		} else {
			$this->data['error_telp'] = '';
		}		
		if (isset($this->error['order_id'])) {
    		$this->data['error_order_id'] = $this->error['order_id'];
		} else {
			$this->data['error_order_id'] = '';
		}		
		if (isset($this->error['dari_bank'])) {
    		$this->data['error_dari_bank'] = $this->error['dari_bank'];
		} else {
			$this->data['error_dari_bank'] = '';
		}if (isset($this->error['no_rekening'])) {
    		$this->data['error_no_rekening'] = $this->error['no_rekening'];
		} else {
			$this->data['error_no_rekening'] = '';
		}		
		if (isset($this->error['pemilik'])) {
    		$this->data['error_pemilik'] = $this->error['pemilik'];
		} else {
			$this->data['error_pemilik'] = '';
		}		
		if (isset($this->error['ke_bank'])) {
    		$this->data['error_ke_bank'] = $this->error['ke_bank'];
		} else {
			$this->data['error_ke_bank'] = '';
		}		
		if (isset($this->error['jumlah'])) {
    		$this->data['error_jumlah'] = $this->error['jumlah'];
		} else {
			$this->data['error_jumlah'] = '';
		}		
		if (isset($this->error['tanggal'])) {
    		$this->data['error_tanggal'] = $this->error['tanggal'];
		} else {
			$this->data['error_tanggal'] = '';
		}
		if (isset($this->error['berita'])) {
    		$this->data['error_berita'] = $this->error['berita'];
		} else {
			$this->data['error_berita'] = '';
		}		
		if (isset($this->error['captcha'])) {
			$this->data['error_captcha'] = $this->error['captcha'];
		} else {
			$this->data['error_captcha'] = '';
		}
		if (isset($this->error['ke_bank'])) {
			$this->data['error_ke_bank'] = $this->error['ke_bank'];
		} else {
			$this->data['error_ke_bank'] = '';
		}	

        $this->data['button_continue'] = $this->language->get('button_continue');
    
		$this->data['action'] = $this->url->link('information/payment');
		
		if ($this->customer->isLogged()) {	
			if ($this->request->server['REQUEST_METHOD'] != 'POST') {
			$customer_info = $this->model_account_customer->getCustomer($this->customer->getId());
			}

			if (isset($this->request->post['nama'])) {
				$this->data['nama'] = $this->request->post['nama'];
			} elseif (isset($customer_info)) {
				$this->data['nama'] = $customer_info['firstname'].' '.$customer_info['lastname'];
			} else {
				$this->data['nama'] = '';
			}

			if (isset($this->request->post['email'])) {
				$this->data['email'] = $this->request->post['email'];
			} elseif (isset($customer_info)) {
				$this->data['email'] = $customer_info['email'];
			} else {
				$this->data['email'] = '';
			}

			if (isset($this->request->post['telp'])) {
				$this->data['telp'] = $this->request->post['telp'];
			} elseif (isset($customer_info)) {
				$this->data['telp'] = $customer_info['telephone'];
			} else {
				$this->data['telp'] = '';
			}
		}else {		
			if (isset($this->request->post['nama'])) {
    			$this->data['nama'] = $this->request->post['nama'];
			} else {
				$this->data['nama'] = '';
			}
			if (isset($this->request->post['email'])) {
    			$this->data['email'] = $this->request->post['email'];
			} else {
				$this->data['email'] = '';
			}
			if (isset($this->request->post['telp'])) {
    			$this->data['telp'] = $this->request->post['telp'];
			} else {
				$this->data['telp'] = '';
			}
		}		
		if (isset($this->request->post['order_id'])) {
    		$this->data['order_id'] = $this->request->post['order_id'];
		} else {
			$this->data['order_id'] = '';
		}		
		if (isset($this->request->post['dari_bank'])) {
    		$this->data['dari_bank'] = $this->request->post['dari_bank'];
		} else {
			$this->data['dari_bank'] = '';
		}
		if (isset($this->request->post['no_rekening'])) {
    		$this->data['no_rekening'] = $this->request->post['no_rekening'];
		} else {
			$this->data['no_rekening'] = '';
		}		
		if (isset($this->request->post['pemilik'])) {
    		$this->data['pemilik'] = $this->request->post['pemilik'];
		} else {
			$this->data['pemilik'] = '';
		}		
		if (isset($this->request->post['ke_bank'])) {
    		$this->data['ke_bank'] = $this->request->post['ke_bank'];
		} else {
			$this->data['ke_bank'] = '';
		}		
		if (isset($this->request->post['jumlah'])) {
    		$this->data['jumlah'] = $this->request->post['jumlah'];
		} else {
			$this->data['jumlah'] = '';
		}		
		if (isset($this->request->post['tanggal'])) {
    		$this->data['tanggal'] = $this->request->post['tanggal'];
		} else {
			$this->data['tanggal'] = '';
		}
		if (isset($this->request->post['berita'])) {
    		$this->data['berita'] = $this->request->post['berita'];
		} else {
			$this->data['berita'] = '';
		}		
		if (isset($this->request->post['captcha'])) {
			$this->data['captcha'] = $this->request->post['captcha'];
		} else {
			$this->data['captcha'] = '';
		}	
			
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/payment.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/information/payment.tpl';
		} else {
			$this->template = 'default/template/information/payment.tpl';
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

  	public function success() {
		$this->language->load('information/payment');

		$this->document->setTitle($this->language->get('heading_title')); 

      	$this->data['breadcrumbs'] = array();

      	$this->data['breadcrumbs'][] = array(
        	'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home'),
        	'separator' => false
      	);

      	$this->data['breadcrumbs'][] = array(
        	'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('information/payment'),
        	'separator' => $this->language->get('text_separator')
      	);			
		
    	$this->data['heading_title'] = $this->language->get('heading_title');

    	$this->data['text_message'] = $this->language->get('text_message');

    	$this->data['button_continue'] = $this->language->get('button_continue');

    	$this->data['continue'] = $this->url->link('common/home');

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/payment.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/information/payment.tpl';
		} else {
			$this->template = 'default/template/information/payment.tpl';
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

	public function captcha() {
		$this->load->library('captcha');
		
		$captcha = new Captcha();
		
		$this->session->data['captcha'] = $captcha->getCode();
		
		$captcha->showImage();
	}
	
  	private function validate() {
    	if ((strlen(utf8_decode($this->request->post['nama'])) < 3) || (strlen(utf8_decode($this->request->post['nama'])) > 32)) {
      		$this->error['nama'] = $this->language->get('error_nama');
    	}

		$pattern = '/^[A-Z0-9._%-+]+@[A-Z0-9][A-Z0-9.-]{0,61}[A-Z0-9]\.[A-Z]{2,6}$/i';
		$text = '/^\s*[a-zA-Z,\s]+\s*$/i';
		$nomor = '/^\d+$/i';
		$date = '/^\d{1,2}\/\d{1,2}\/\d{4}$/i';

    	if (!preg_match($pattern, $this->request->post['email'])) {
      		$this->error['email'] = $this->language->get('error_email');
    	}
	
    	if (!preg_match($nomor, $this->request->post['telp'])) {
      		$this->error['telp'] = $this->language->get('error_telp');
    	}
    	if ((strlen(utf8_decode($this->request->post['order_id'])) < 3) || (strlen(utf8_decode($this->request->post['order_id'])) > 100)) {
      		$this->error['order_id'] = $this->language->get('error_order_id');
    	}
    	if ((strlen(utf8_decode($this->request->post['dari_bank'])) < 2) || (strlen(utf8_decode($this->request->post['dari_bank'])) > 100)) {
      		$this->error['dari_bank'] = $this->language->get('error_dari_bank');
    	}
    	if ((strlen(utf8_decode($this->request->post['no_rekening'])) < 4) || (strlen(utf8_decode($this->request->post['no_rekening'])) > 100)) {
      		$this->error['no_rekening'] = $this->language->get('error_no_rekening');
    	}
    	if ((strlen(utf8_decode($this->request->post['pemilik'])) < 4) || (strlen(utf8_decode($this->request->post['pemilik'])) > 100)) {
      		$this->error['pemilik'] = $this->language->get('error_pemilik');
    	}
    	if ((strlen(utf8_decode($this->request->post['ke_bank'])) < 4) || (strlen(utf8_decode($this->request->post['ke_bank'])) > 100)) {
      		$this->error['ke_bank'] = $this->language->get('error_ke_bank');
    	}
    	if ((strlen(utf8_decode($this->request->post['jumlah'])) < 4) || (strlen(utf8_decode($this->request->post['jumlah'])) > 100)) {
      		$this->error['jumlah'] = $this->language->get('error_jumlah');
    	}
    	/*if (!preg_match($date, $this->request->post['tanggal'])) {
      		$this->error['tanggal'] = $this->language->get('error_tanggal');
    	}
    	if ((strlen(utf8_decode($this->request->post['berita'])) < 10) || (strlen(utf8_decode($this->request->post['berita'])) > 3000)) {
      		$this->error['berita'] = $this->language->get('error_berita');
    	}*/
    	if (!isset($this->session->data['captcha']) || ($this->session->data['captcha'] != $this->request->post['captcha'])) {
      		$this->error['captcha'] = $this->language->get('error_captcha');
    	}
		
		if (!$this->error) {
	  		return TRUE;
		} else {
	  		return FALSE;
		}  	  
  	}
}
?>
