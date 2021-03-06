<?php

$_SERVER['SERVER_PROTOCOL'] = 'HTTP/1.1';
$_SERVER['SERVER_NAME'] = '';
$PHP_SELF = $GLOBALS['PHP_SELF'] = $_SERVER['PHP_SELF'] = '/index.php';

#define( 'EDD_USE_PHP_SESSIONS', false );

$_tests_dir = getenv('WP_TESTS_DIR');
if ( !$_tests_dir ) $_tests_dir = '/tmp/wordpress-tests-lib';

require_once $_tests_dir . '/includes/functions.php';

function _manually_load_plugin() {
	# /home/travis/build/nextgenthemes/advanced-responsive-video-embedder
	require dirname( __FILE__ ) . '/../advanced-responsive-video-embedder.php';
	#require '/tmp/arve-pro/arve-pro.php';
}
tests_add_filter( 'muplugins_loaded', '_manually_load_plugin' );

require $_tests_dir . '/includes/bootstrap.php';

activate_plugin( 'advanced-responsive-video-embedder/advanced-responsive-video-embedder.php' );
#activate_plugin( 'arve-pro/arve-pro.php' );

#require '/tmp/fake-activate.php';

global $current_user;

$current_user = new WP_User(1);
$current_user->set_role('administrator');
wp_update_user( array( 'ID' => 1, 'first_name' => 'Admin', 'last_name' => 'User' ) );

// Include helpers
#require_once 'helpers/shims.php';
#require_once 'helpers/class-helper-download.php';
#require_once 'helpers/class-helper-payment.php';
#require_once 'helpers/class-helper-discount.php';
