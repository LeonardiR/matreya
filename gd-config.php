<?php

define( 'GD_VIP', '198.71.233.204' );
define( 'GD_RESELLER', 1 );
define( 'GD_ASAP_KEY', 'eb594c47394f731270e44d04ea2d88ea' );
define( 'GD_STAGING_SITE', false );
define( 'GD_EASY_MODE', true );
define( 'GD_SITE_CREATED', 1516374342 );

// Newrelic tracking
if ( function_exists( 'newrelic_set_appname' ) ) {
	newrelic_set_appname( 'ea3bdd43-b7de-4378-8008-34e4bc67152c;' . ini_get( 'newrelic.appname' ) );
}

/**
 * Is this is a mobile client?  Can be used by batcache.
 * @return array
 */
function is_mobile_user_agent() {
	return array(
	       "mobile_browser"             => !in_array( $_SERVER['HTTP_X_UA_DEVICE'], array( 'bot', 'pc' ) ),
	       "mobile_browser_tablet"      => false !== strpos( $_SERVER['HTTP_X_UA_DEVICE'], 'tablet-' ),
	       "mobile_browser_smartphones" => in_array( $_SERVER['HTTP_X_UA_DEVICE'], array( 'mobile-iphone', 'mobile-smartphone', 'mobile-firefoxos', 'mobile-generic' ) ),
	       "mobile_browser_android"     => false !== strpos( $_SERVER['HTTP_X_UA_DEVICE'], 'android' )
	);
}