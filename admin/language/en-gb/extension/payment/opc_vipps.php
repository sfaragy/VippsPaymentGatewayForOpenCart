<?php

// Tab
$_['tab_register']          = 'Register';
$_['tab_settings']          = 'Settings';

// Text
$_['text_instructions']        = 'How to get Vipps account keys from Vipps Developer Portal<br>
    1. Sign in to the Vipps Portal at <a target="_BLANK" href="https://portal.vipps.no/">https://portal.vipps.no/</a> using Bank ID<br>
    2. Select the “Utvikler” (“Developer”) tab and choose Production Keys. Here you can find the merchant serial number (6 figures)<br>
    3. Click on “Show keys” under the API keys column to see “Client ID”, “Client Secret” and “Vipps Subscription Key” <br>
	
	4. Or more information please visit:<a href="https://github.com/vippsas/vipps-ecom-api/blob/master/v1-migration.md"> https://github.com/vippsas/vipps-ecom-api/blob/master/v1-migration.md</a><br>
	
	5. Or more info please visit: <a href="https://github.com/vippsas/vipps-ecom-api/blob/master/vipps-ecom-api.md"> https://github.com/vippsas/vipps-ecom-api/blob/master/vipps-ecom-api.md </a>';
	
$_['text_opc_vipps']				 = '<a target="_BLANK" href="https://portal.vipps.no/"><img src="view/image/payment/opc_vipps.png" alt="OPC VIPPS" title="OPC VIPPS" style="border: 1px solid #EEEEEE;" /></a>';

$_['text_extension']        = 'Extensions';
$_['text_success']          = 'Success: You have modified OPC VIPPS payment module!';
$_['text_edit']             = 'Edit OPC VIPPS';
$_['text_live']             = 'Live';
$_['text_test']             = 'Test';
$_['text_authorize']             = 'Authorize';
$_['text_capture']             = 'Capture';
$_['text_payment_info']     = 'Payment Info';
$_['text_order_id']         = 'Order ID';
$_['text_amount']           = 'Amount';
$_['text_fee']              = 'Fee';
$_['text_date_added']       = 'Date Added';
$_['text_tracking']         = 'Tracking';
$_['text_barcode']          = 'Barcode';
$_['text_barcode_info']     = '(Print out this unique barcode and stick it on the surface of the parcel)';
$_['text_confirm']          = 'Are you sure you want to update the tracking number?';
$_['text_register_success'] = 'You hade successfully registered. You should receive an email shortly.';
$_['text_tracking_success'] = 'The tracking number was successfully updated.';
$_['text_other']            = 'Other';
$_['text_email']            = 'The registered email address for your OPC VIPPS account is %s';

// Entry
$_['entry_email_address']   = 'Email Address';
$_['entry_password']        = 'Password';
$_['entry_currency']        = 'Currency';
$_['entry_warehouse']       = 'Warehouse';
$_['entry_country']         = 'Country';
$_['entry_merchant_number'] = 'Merchant Number';
$_['entry_secret_key']      = 'Secret Key';
$_['entry_environment']     = 'Environment';
$_['entry_mode']     		= 'Payment Mode';
$_['entry_shipping_fee']    = 'Shipping Fee';
$_['entry_order_status']    = 'Order Status';
$_['entry_status']          = 'Status';
$_['entry_logging']         = 'Debug Logging';
$_['entry_sort_order']      = 'Sort Order';
$_['entry_api_key']         = 'API Key';

// Help
$_['help_email_address']    = 'Please enter the email address for the owner of this business.';
$_['help_password']         = 'Please enter a password between 8 and 30 characters.';
$_['help_currency']         = 'Select the currency used on your website and to withdraw to your bank account.';
$_['help_warehouse']        = 'Select the nearest warehouse you will be shipping to. When you receive orders from Chinese customers (via OPC VIPPS gateway) you can deliver parcels to this warehouse.';
$_['help_country']          = 'Tell us your country, and we will inform you once a warehouse in this country is opened.';
$_['help_merchant_number']  = 'Your personal OPC VIPPS account merchant number.';
$_['help_secret_key']       = 'Your secret key to access the OPC VIPPS API.';
$_['help_shipping_fee']     = 'The shipping cost from your warehouse to OPC VIPPS warehouse. Use two decimal places.';
$_['help_order_status']     = 'The order status after the customer has placed the order.';
$_['help_total']            = 'The checkout total the order must reach before this payment method becomes active. Must be a value with no currency sign.';
$_['help_logging']          = 'Enabling debug will write sensitive data to a log file. You should always disable unless instructed otherwise.';

// Error
$_['error_warning']         = 'Warning: Please check the form carefully for errors!';
$_['error_permission']      = 'Warning: You do not have permission to modify payment OPC VIPPS!';
$_['error_merchant_number'] = 'Merchant Number Required!';
$_['error_secret_key']      = 'Secret Key Required!';
$_['error_shipping_fee']    = 'Shipping fee must be a decimal number!';
$_['error_not_enabled']     = 'Module not enabled!';
$_['error_data_missing']    = 'Data missing!';
$_['error_tracking_length'] = 'Tracking number must be between 1 and 50 characters!';
$_['error_email_address']   = 'Please enter your email address!';
$_['error_email_invalid']   = 'The email address is not valid!';
$_['error_password']        = 'Password must be at least 8 characters!';
$_['error_currency']        = 'Please select a currency!';
$_['error_warehouse']       = 'Please select a warehouse!';
$_['error_country']         = 'Please select a country!';
$_['error_weight']          = 'Please change your <a href="%s">Weight Class</a> setting to grams. It\'s in \'System -> Settings\' in the \'Local\' tab.';
$_['error_bad_response']    = 'An invalid response was received. Please try again later.';

// Button
$_['button_register']       = 'Register';
$_['button_tracking']       = 'Update Tracking Number';
$_['button_barcode']        = 'Generate Barcode';


// Heading
$_['heading_title']		 = 'Vipps eCommerce';

// Text
$_['text_success']		 = 'Success: You have modified vipps Website Payment Checkout account details!';
$_['text_edit']          = 'Edit Vipps eCommerce';
$_['text_pp_pro']		 = '<a target="_BLANK" href=""><img src="view/image/payment/opc_vipps.png" alt="Vipps Website Payment" title="Vipps Website Payment iFrame" style="border: 1px solid #EEEEEE;" /></a>';
$_['text_authorization'] = 'Authorization';
$_['text_sale']						= 'Sale';

// Entry
$_['entry_profile']	 = 'Profile Name';
$_['entry_merchant_serial']	 = 'Merchant Serial';
$_['entry_client_id']	 = 'Vipps Client ID';
$_['entry_application_secret']		 = 'Application Secret';
$_['entry_subscription_key_access']	 = 'Subscription Key (Access Token)';
$_['entry_subscription_key_ecommerce']        = 'Subscription Key (eCommerce)';
$_['entry_fall_back']	 = 'Fall Back URL';
$_['entry_callback_Prefix']        = 'Call Back URL';
$_['entry_card']		 = 'Store Cards';
$_['entry_order_status'] = 'Order Status';
$_['entry_geo_zone']	 = 'Geo Zone';
$_['entry_status']		 = 'Status';
$_['entry_sort_order']	 = 'Sort Order';

// Help
$_['help_test']          = 'Use the live or testing (sandbox) gateway server to process transactions?';
$_['help_total']		 = 'The checkout total the order must reach before this payment method becomes active';

// Error
$_['error_permission']	 = 'Warning: You do not have permission to modify payment vipps Website Payment Checkout!';
$_['error_username']	 = 'API Username Required!';
$_['error_password']	 = 'API Password Required!';
$_['error_signature']	 = 'API Signature Required!';

$_['text_vipps']        = '<a target="_BLANK" href="https://vipps.com/"><img src="view/image/payment/opc_vipps.png" alt="vipps" title="vipps" style="border: 1px solid #EEEEEE; max-width:100px;" /></a>';

$_['text_confirm_refund']       = 'Are you sure you want to refund the payment?';
$_['text_refund_ok']            = 'Refund was successful, order status updated to refunded.';
$_['button_refund']             = 'Refund';
