<?php
class ControllerExtensionPaymentOpcVipps extends Controller {
	private $error = array();

	public function index() {
		$this->load->model('setting/setting');

		$this->load->library('opc_vipps');
		$this->load->model('extension/payment/opc_vipps');
		$this->load->language('extension/payment/opc_vipps');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('localisation/order_status');

 
		$data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('payment_opc_vipps', $this->request->post);
			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true));
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/payment/opc_vipps', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['heading_title']         = $this->language->get('heading_title');

		$data['action'] = $this->url->link('extension/payment/opc_vipps', 'user_token=' . $this->session->data['user_token'], true);

		$data['cancel'] = $this->url->link('extension/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true);

		if (isset($this->request->post['payment_opc_vipps_environment'])) {
			$data['payment_opc_vipps_environment'] = $this->request->post['payment_opc_vipps_environment'];
		} elseif ($this->config->has('payment_opc_vipps_environment')) {
			$data['payment_opc_vipps_environment'] = $this->config->get('payment_opc_vipps_environment');
		} else {
			$data['payment_opc_vipps_environment'] = 'test';
		}
		
		if (isset($this->request->post['payment_opc_vipps_profile_name'])) {
			$data['payment_opc_vipps_profile_name'] = $this->request->post['payment_opc_vipps_profile_name'];
		} elseif ($this->config->has('payment_opc_vipps_profile_name')) {
			$data['payment_opc_vipps_profile_name'] = $this->config->get('payment_opc_vipps_profile_name');
		} else {
			$data['payment_opc_vipps_profile_name'] = '';
		}

		if (isset($this->request->post['payment_opc_vipps_merchant_serial'])) {
			$data['payment_opc_vipps_merchant_serial'] = $this->request->post['payment_opc_vipps_merchant_serial'];
		} elseif ($this->config->has('payment_opc_vipps_merchant_serial')) {
			$data['payment_opc_vipps_merchant_serial'] = $this->config->get('payment_opc_vipps_merchant_serial');
		} else {
			$data['payment_opc_vipps_merchant_serial'] = '';
		}


		if (isset($this->request->post['payment_opc_vipps_client_id'])) {
			$data['payment_opc_vipps_client_id'] = $this->request->post['payment_opc_vipps_client_id'];
		} elseif ($this->config->has('payment_opc_vipps_client_id')) {
			$data['payment_opc_vipps_client_id'] = $this->config->get('payment_opc_vipps_client_id');
		} else {
			$data['payment_opc_vipps_client_id'] = '';
		}

		if (isset($this->request->post['payment_opc_vipps_application_secret'])) {
			$data['payment_opc_vipps_application_secret'] = $this->request->post['payment_opc_vipps_application_secret'];
		} elseif ($this->config->has('payment_opc_vipps_application_secret')) {
			$data['payment_opc_vipps_application_secret'] = $this->config->get('payment_opc_vipps_application_secret');
		} else {
			$data['payment_opc_vipps_application_secret'] = '';
		}

		if (isset($this->request->post['payment_opc_vipps_subscription_key_access'])) {
			$data['payment_opc_vipps_subscription_key_access'] = $this->request->post['payment_opc_vipps_subscription_key_access'];
		} elseif ($this->config->has('payment_opc_vipps_subscription_key_access')) {
			$data['payment_opc_vipps_subscription_key_access'] = $this->config->get('payment_opc_vipps_subscription_key_access');
		} else {
			$data['payment_opc_vipps_subscription_key_access'] = '';
		}

		if (isset($this->request->post['payment_opc_vipps_subscription_key_ecommerce'])) {
			$data['payment_opc_vipps_subscription_key_ecommerce'] = $this->request->post['payment_opc_vipps_subscription_key_ecommerce'];
		} elseif ($this->config->has('payment_opc_vipps_subscription_key_ecommerce')) {
			$data['payment_opc_vipps_subscription_key_ecommerce'] = $this->config->get('payment_opc_vipps_subscription_key_ecommerce');
		} else {
			$data['payment_opc_vipps_subscription_key_ecommerce'] = '';
		}

	
		if (isset($this->request->post['payment_opc_vipps_status'])) {
			$data['payment_opc_vipps_status'] = $this->request->post['payment_opc_vipps_status'];
		} elseif ($this->config->has('payment_opc_vipps_status')) {
			$data['payment_opc_vipps_status'] = $this->config->get('payment_opc_vipps_status');
		} else {
			$data['payment_opc_vipps_status'] = '';
		}

		if (isset($this->request->post['payment_opc_vipps_order_status_id'])) {
			$data['payment_opc_vipps_order_status_id'] = $this->request->post['payment_opc_vipps_order_status_id'];
		} else {
			$data['payment_opc_vipps_order_status_id'] = $this->config->get('payment_opc_vipps_order_status_id');
		}	
		
		if (isset($this->request->post['payment_opc_vipps_callback_Prefix'])) {
			$data['payment_opc_vipps_callback_Prefix'] = $this->request->post['payment_opc_vipps_callback_Prefix'];
		} else {
			if($this->config->get('payment_opc_vipps_callback_Prefix')!=''){				
				$data['payment_opc_vipps_callback_Prefix'] = $this->config->get('payment_opc_vipps_callback_Prefix');
			} else {
				$data['payment_opc_vipps_callback_Prefix'] = HTTPS_CATALOG . "index.php?route=extension/payment/opc_vipps/callback";	
			}
		}		
		
		if (isset($this->request->post['payment_opc_vipps_fall_back'])) {
			$data['payment_opc_vipps_fall_back'] = $this->request->post['payment_opc_vipps_fall_back'];
		} else {
			if($this->config->get('payment_opc_vipps_fall_back')!=''){				
				$data['payment_opc_vipps_fall_back'] = $this->config->get('payment_opc_vipps_fall_back');
			} else {
				$data['payment_opc_vipps_fall_back'] = HTTPS_CATALOG . "index.php?route=extension/payment/opc_vipps/fallback";	
			}
		}


		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];

			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}


		$data['token'] = $this->session->data['user_token'];

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/payment/opc_vipps', $data));
	}

	public function install() {
		$this->load->model('extension/payment/opc_vipps');

		$this->model_extension_payment_opc_vipps->install();
		
	}

	public function uninstall() {
		
		$this->load->model('extension/payment/opc_vipps');

		$this->model_extension_payment_opc_vipps->uninstall();
		
	} 
	
	public function testAction(){
		$this->load->library('opc_vipps');
		//$this->opc_vipps->createPayment();
		$access_token = $this->opc_vipps->getAccessToken();
		echo $access_token;
		
		echo "<hr>";
		
		
		
		$payment = $this->opc_vipps->createPayment();
		
		echo "xxx" . $payment;
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/payment/opc_vipps')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if ($this->error && !isset($this->error['warning'])) {
			$this->error['warning'] = $this->language->get('error_warning');
		}

		return !$this->error;
	}

}
