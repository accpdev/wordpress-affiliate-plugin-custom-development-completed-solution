<?php
if (empty($no_load)){
	require_once '../../../../wp-load.php';
}
if (!defined('UAP_PATH')){
	define('UAP_PATH', plugin_dir_path(__DIR__));
}
require_once UAP_PATH . 'classes/PayoutStripe.class.php';

$object = new PayoutStripe();
$object->do_webhook();
exit;
