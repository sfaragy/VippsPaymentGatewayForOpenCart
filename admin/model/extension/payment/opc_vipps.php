<?php
class ModelExtensionPaymentOpcVipps extends Model {
	public function install() {
		$this->log('Installing module');
		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "opc_vipps` (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`customer_id` int(11) NOT NULL,
			`order_id` varchar(4) NOT NULL,
			`status` varchar(50) NOT NULL,
			`finalize` TINYINT(1) NOT NULL, 
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8;");
		
		

	}

	public function uninstall() {
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "opc_vipps`");
		
		$this->log('Module uninstalled');
	}


	public function getOrder($order_id) {
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "stripe_checkout_orders` WHERE `order_id` = '" . $order_id . "' LIMIT 1");

		if ($query->num_rows) {
			return $query->row;
		} else {
			return false;
		}
	}
	
	public function fixissue(){
		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "stripe_checkout_card` (
		`stripe_card_id` int(11) NOT NULL,
		  `customer_id` int(11) NOT NULL,
		  `last_four` varchar(4) NOT NULL,
		  `exp_year` varchar(5) NOT NULL,
		  `exp_month` varchar(5) NOT NULL,
		  `brand` varchar(50) NOT NULL,
		  `environment` varchar(5) NOT NULL DEFAULT 'test'
		) ENGINE=MyISAM DEFAULT CHARSET=utf8;");

		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "stripe_checkout_customer` (
		  `customer_id` int(11) NOT NULL,
		  `stripe_customer_id` varchar(255) NOT NULL,
		  `environment` varchar(5) NOT NULL DEFAULT 'test'
		) ENGINE=MyISAM DEFAULT CHARSET=utf8;");


		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "stripe_checkout_order` (
		  `stripe_order_id` varchar(255) NOT NULL,
		  `order_id` int(11) NOT NULL DEFAULT '0',
		  `environment` varchar(5) NOT NULL DEFAULT 'test'
		) ENGINE=MyISAM DEFAULT CHARSET=utf8;");



		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "stripe_checkout_orders` (
		`id` int(11) NOT NULL,
		  `order_id` int(11) NOT NULL,
		  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
		  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
		  `item_number` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
		  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
		  `item_price` float(10,2) NOT NULL,
		  `item_price_currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
		  `paid_amount` float(10,2) NOT NULL,
		  `paid_amount_currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
		  `txn_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
		  `checkout_session_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
		  `payment_status` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
		  `created` datetime NOT NULL,
		  `modified` datetime NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;");


		$this->db->query("ALTER TABLE `" . DB_PREFIX . "stripe_checkout_card`
		 ADD PRIMARY KEY (`stripe_card_id`);");

		$this->db->query("ALTER TABLE `" . DB_PREFIX . "stripe_checkout_customer`
		 ADD PRIMARY KEY (`stripe_customer_id`);");

		$this->db->query("ALTER TABLE `" . DB_PREFIX . "stripe_checkout_order`
		 ADD PRIMARY KEY (`stripe_order_id`);");

		$this->db->query("ALTER TABLE `" . DB_PREFIX . "stripe_checkout_orders`
		 ADD PRIMARY KEY (`id`);");

		$this->db->query("ALTER TABLE `" . DB_PREFIX . "stripe_checkout_card`
		MODIFY `stripe_card_id` int(11) NOT NULL AUTO_INCREMENT;");

		$this->db->query("ALTER TABLE `" . DB_PREFIX . "stripe_checkout_orders`
		MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;");
		
	}

	public function log($data) {
		// if ($this->config->has('payment_stripe_logging') && $this->config->get('payment_stripe_logging')) {
			$log = new Log('stripe.log');

			$log->write($data);
		// }
	}
}
