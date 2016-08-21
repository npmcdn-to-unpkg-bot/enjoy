<?php
/**
 * WooCommerce Order Functions
 *
 * Functions for order specific things.
 *
 * @author 		WooThemes
 * @category 	Core
 * @package 	WooCommerce/Functions
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Get all order statuses.
 *
 * @since 2.2
 * @return array
 */
function wc_get_order_statuses() {
	$order_statuses = array(
		'wc-pending'    => _x( 'Pending Payment', 'Order status', 'woocommerce' ),
		'wc-processing' => _x( 'У роботі', 'Order status', 'woocommerce' ),
		'wc-on-hold'    => _x( 'On Hold', 'Order status', 'woocommerce' ),
		'wc-completed'  => _x( 'Виконано', 'Order status', 'woocommerce' ),
		'wc-cancelled'  => _x( 'Відмінено', 'Order status', 'woocommerce' ),
		'wc-refunded'   => _x( 'Refunded', 'Order status', 'woocommerce' ),
		'wc-failed'     => _x( 'Failed', 'Order status', 'woocommerce' ),
	);
	return apply_filters( 'wc_order_statuses', $order_statuses );
}

/**
 * See if a string is an order status.
 * @param  string $maybe_status Status, including any wc- prefix
 * @return bool
 */
function wc_is_order_status( $maybe_status ) {
	$order_statuses = wc_get_order_statuses();
	return isset( $order_statuses[ $maybe_status ] );
}

/**
 * Main function for returning orders, uses the WC_Order_Factory class.
 *
 * @since  2.2
 * @param  mixed $the_order Post object or post ID of the order.
 * @return WC_Order
 */
function wc_get_order( $the_order = false ) {
	if ( ! did_action( 'woocommerce_init' ) ) {
		_doing_it_wrong( __FUNCTION__, __( 'wc_get_order should not be called before the woocommerce_init action.', 'woocommerce' ), '2.5' );
		return false;
	}
	return WC()->order_factory->get_order( $the_order );
}

/**
 * Get the nice name for an order status.
 *
 * @since  2.2
 * @param  string $status
 * @return string
 */
function wc_get_order_status_name( $status ) {
	$statuses = wc_get_order_statuses();
	$status   = 'wc-' === substr( $status, 0, 3 ) ? substr( $status, 3 ) : $status;
	$status   = isset( $statuses[ 'wc-' . $status ] ) ? $statuses[ 'wc-' . $status ] : $status;

	return $status;
}

/**
 * Finds an Order ID based on an order key.
 *
 * @access public
 * @param string $order_key An order key has generated by
 * @return int The ID of an order, or 0 if the order could not be found
 */
function wc_get_order_id_by_order_key( $order_key ) {
	global $wpdb;

	// Faster than get_posts()
	$order_id = $wpdb->get_var( $wpdb->prepare( "SELECT post_id FROM {$wpdb->prefix}postmeta WHERE meta_key = '_order_key' AND meta_value = %s", $order_key ) );

	return $order_id;
}

/**
 * Get all registered order types.
 *
 * $for optionally define what you are getting order types for so only relevent types are returned.
 *
 * e.g. for 'order-meta-boxes', 'order-count'
 *
 * @since  2.2
 * @param  string $for
 * @return array
 */
function wc_get_order_types( $for = '' ) {
	global $wc_order_types;

	if ( ! is_array( $wc_order_types ) ) {
		$wc_order_types = array();
	}

	$order_types = array();

	switch ( $for ) {
		case 'order-count' :
			foreach ( $wc_order_types as $type => $args ) {
				if ( ! $args['exclude_from_order_count'] ) {
					$order_types[] = $type;
				}
			}
		break;
		case 'order-meta-boxes' :
			foreach ( $wc_order_types as $type => $args ) {
				if ( $args['add_order_meta_boxes'] ) {
					$order_types[] = $type;
				}
			}
		break;
		case 'view-orders' :
			foreach ( $wc_order_types as $type => $args ) {
				if ( ! $args['exclude_from_order_views'] ) {
					$order_types[] = $type;
				}
			}
		break;
		case 'reports' :
			foreach ( $wc_order_types as $type => $args ) {
				if ( ! $args['exclude_from_order_reports'] ) {
					$order_types[] = $type;
				}
			}
		break;
		case 'sales-reports' :
			foreach ( $wc_order_types as $type => $args ) {
				if ( ! $args['exclude_from_order_sales_reports'] ) {
					$order_types[] = $type;
				}
			}
		break;
		case 'order-webhooks' :
			foreach ( $wc_order_types as $type => $args ) {
				if ( ! $args['exclude_from_order_webhooks'] ) {
					$order_types[] = $type;
				}
			}
		break;
		default :
			$order_types = array_keys( $wc_order_types );
		break;
	}

	return apply_filters( 'wc_order_types', $order_types, $for );
}

/**
 * Get an order type by post type name.
 * @param  string post type name
 * @return bool|array of datails about the order type
 */
function wc_get_order_type( $type ) {
	global $wc_order_types;

	if ( isset( $wc_order_types[ $type ] ) ) {
		return $wc_order_types[ $type ];
	} else {
		return false;
	}
}

/**
 * Register order type. Do not use before init.
 *
 * Wrapper for register post type, as well as a method of telling WC which.
 * post types are types of orders, and having them treated as such.
 *
 * $args are passed to register_post_type, but there are a few specific to this function:
 * 		- exclude_from_orders_screen (bool) Whether or not this order type also get shown in the main.
 * 		orders screen.
 * 		- add_order_meta_boxes (bool) Whether or not the order type gets shop_order meta boxes.
 * 		- exclude_from_order_count (bool) Whether or not this order type is excluded from counts.
 * 		- exclude_from_order_views (bool) Whether or not this order type is visible by customers when.
 * 		viewing orders e.g. on the my account page.
 * 		- exclude_from_order_reports (bool) Whether or not to exclude this type from core reports.
 * 		- exclude_from_order_sales_reports (bool) Whether or not to exclude this type from core sales reports.
 *
 * @since  2.2
 * @see    register_post_type for $args used in that function
 * @param  string $type Post type. (max. 20 characters, can not contain capital letters or spaces)
 * @param  array $args An array of arguments.
 * @return bool Success or failure
 */
function wc_register_order_type( $type, $args = array() ) {
	if ( post_type_exists( $type ) ) {
		return false;
	}

	global $wc_order_types;

	if ( ! is_array( $wc_order_types ) ) {
		$wc_order_types = array();
	}

	// Register as a post type
	if ( is_wp_error( register_post_type( $type, $args ) ) ) {
		return false;
	}

	// Register for WC usage
	$order_type_args = array(
		'exclude_from_orders_screen'       => false,
		'add_order_meta_boxes'             => true,
		'exclude_from_order_count'         => false,
		'exclude_from_order_views'         => false,
		'exclude_from_order_webhooks'      => false,
		'exclude_from_order_reports'       => false,
		'exclude_from_order_sales_reports' => false,
		'class_name'                       => 'WC_Order'
	);

	$args                    = array_intersect_key( $args, $order_type_args );
	$args                    = wp_parse_args( $args, $order_type_args );
	$wc_order_types[ $type ] = $args;

	return true;
}

/**
 * Grant downloadable product access to the file identified by $download_id.
 *
 * @access public
 * @param string $download_id file identifier
 * @param int $product_id product identifier
 * @param WC_Order $order the order
 * @param  int $qty purchased
 * @return int|bool insert id or false on failure
 */
function wc_downloadable_file_permission( $download_id, $product_id, $order, $qty = 1 ) {
	global $wpdb;

	$user_email = sanitize_email( $order->billing_email );
	$limit      = trim( get_post_meta( $product_id, '_download_limit', true ) );
	$expiry     = trim( get_post_meta( $product_id, '_download_expiry', true ) );

	$limit      = empty( $limit ) ? '' : absint( $limit ) * $qty;

	// Default value is NULL in the table schema
	$expiry     = empty( $expiry ) ? null : absint( $expiry );

	if ( $expiry ) {
		$order_completed_date = date_i18n( "Y-m-d", strtotime( $order->completed_date ) );
		$expiry = date_i18n( "Y-m-d", strtotime( $order_completed_date . ' + ' . $expiry . ' DAY' ) );
	}

	$data = apply_filters( 'woocommerce_downloadable_file_permission_data', array(
		'download_id'			=> $download_id,
		'product_id' 			=> $product_id,
		'user_id' 				=> absint( $order->user_id ),
		'user_email' 			=> $user_email,
		'order_id' 				=> $order->id,
		'order_key' 			=> $order->order_key,
		'downloads_remaining' 	=> $limit,
		'access_granted'		=> current_time( 'mysql' ),
		'download_count'		=> 0
	));

	$format = apply_filters( 'woocommerce_downloadable_file_permission_format', array(
		'%s',
		'%s',
		'%s',
		'%s',
		'%s',
		'%s',
		'%s',
		'%s',
		'%d'
	), $data);

	if ( ! is_null( $expiry ) ) {
			$data['access_expires'] = $expiry;
			$format[] = '%s';
	}

	// Downloadable product - give access to the customer
	$result = $wpdb->insert( $wpdb->prefix . 'woocommerce_downloadable_product_permissions',
		$data,
		$format
	);

	do_action( 'woocommerce_grant_product_download_access', $data );

	return $result ? $wpdb->insert_id : false;
}

/**
 * Order Status completed - GIVE DOWNLOADABLE PRODUCT ACCESS TO CUSTOMER.
 *
 * @access public
 * @param int $order_id
 */
function wc_downloadable_product_permissions( $order_id ) {
	if ( get_post_meta( $order_id, '_download_permissions_granted', true ) == 1 ) {
		return; // Only do this once
	}

	$order = wc_get_order( $order_id );

	if ( $order && $order->has_status( 'processing' ) && get_option( 'woocommerce_downloads_grant_access_after_payment' ) == 'no' ) {
		return;
	}

	if ( sizeof( $order->get_items() ) > 0 ) {
		foreach ( $order->get_items() as $item ) {
			$_product = $order->get_product_from_item( $item );

			if ( $_product && $_product->exists() && $_product->is_downloadable() ) {
				$downloads = $_product->get_files();

				foreach ( array_keys( $downloads ) as $download_id ) {
					wc_downloadable_file_permission( $download_id, $item['variation_id'] > 0 ? $item['variation_id'] : $item['product_id'], $order, $item['qty'] );
				}
			}
		}
	}

	update_post_meta( $order_id, '_download_permissions_granted', 1 );

	do_action( 'woocommerce_grant_product_download_permissions', $order_id );
}
add_action( 'woocommerce_order_status_completed', 'wc_downloadable_product_permissions' );
add_action( 'woocommerce_order_status_processing', 'wc_downloadable_product_permissions' );


/**
 * Add a item to an order (for example a line item).
 *
 * @access public
 * @param int $order_id
 * @return mixed
 */
function wc_add_order_item( $order_id, $item ) {
	global $wpdb;

	$order_id = absint( $order_id );

	if ( ! $order_id )
		return false;

	$defaults = array(
		'order_item_name' 		=> '',
		'order_item_type' 		=> 'line_item',
	);

	$item = wp_parse_args( $item, $defaults );

	$wpdb->insert(
		$wpdb->prefix . "woocommerce_order_items",
		array(
			'order_item_name' 		=> $item['order_item_name'],
			'order_item_type' 		=> $item['order_item_type'],
			'order_id'				=> $order_id
		),
		array(
			'%s', '%s', '%d'
		)
	);

	$item_id = absint( $wpdb->insert_id );

	do_action( 'woocommerce_new_order_item', $item_id, $item, $order_id );

	return $item_id;
}

/**
 * Update an item for an order.
 *
 * @since 2.2
 * @param int $item_id
 * @param array $args either `order_item_type` or `order_item_name`
 * @return bool true if successfully updated, false otherwise
 */
function wc_update_order_item( $item_id, $args ) {
	global $wpdb;

	$update = $wpdb->update( $wpdb->prefix . 'woocommerce_order_items', $args, array( 'order_item_id' => $item_id ) );

	if ( false === $update ) {
		return false;
	}

	do_action( 'woocommerce_update_order_item', $item_id, $args );

	return true;
}

/**
 * Delete an item from the order it belongs to based on item id.
 *
 * @access public
 * @param int $item_id
 * @return bool
 */
function wc_delete_order_item( $item_id ) {
	global $wpdb;

	$item_id = absint( $item_id );

	if ( ! $item_id )
		return false;

	do_action( 'woocommerce_before_delete_order_item', $item_id );

	$wpdb->query( $wpdb->prepare( "DELETE FROM {$wpdb->prefix}woocommerce_order_items WHERE order_item_id = %d", $item_id ) );
	$wpdb->query( $wpdb->prepare( "DELETE FROM {$wpdb->prefix}woocommerce_order_itemmeta WHERE order_item_id = %d", $item_id ) );

	do_action( 'woocommerce_delete_order_item', $item_id );

	return true;
}

/**
 * WooCommerce Order Item Meta API - Update term meta.
 *
 * @access public
 * @param mixed $item_id
 * @param mixed $meta_key
 * @param mixed $meta_value
 * @param string $prev_value (default: '')
 * @return bool
 */
function wc_update_order_item_meta( $item_id, $meta_key, $meta_value, $prev_value = '' ) {
	return update_metadata( 'order_item', $item_id, $meta_key, $meta_value, $prev_value );
}

/**
 * WooCommerce Order Item Meta API - Add term meta.
 *
 * @access public
 * @param mixed $item_id
 * @param mixed $meta_key
 * @param mixed $meta_value
 * @param bool $unique (default: false)
 * @return bool
 */
function wc_add_order_item_meta( $item_id, $meta_key, $meta_value, $unique = false ) {
	return add_metadata( 'order_item', $item_id, $meta_key, $meta_value, $unique );
}

/**
 * WooCommerce Order Item Meta API - Delete term meta.
 *
 * @access public
 * @param mixed $item_id
 * @param mixed $meta_key
 * @param string $meta_value (default: '')
 * @param bool $delete_all (default: false)
 * @return bool
 */
function wc_delete_order_item_meta( $item_id, $meta_key, $meta_value = '', $delete_all = false ) {
	return delete_metadata( 'order_item', $item_id, $meta_key, $meta_value, $delete_all );
}

/**
 * WooCommerce Order Item Meta API - Get term meta.
 *
 * @access public
 * @param mixed $item_id
 * @param mixed $key
 * @param bool $single (default: true)
 * @return mixed
 */
function wc_get_order_item_meta( $item_id, $key, $single = true ) {
	return get_metadata( 'order_item', $item_id, $key, $single );
}

/**
 * Cancel all unpaid orders after held duration to prevent stock lock for those products.
 *
 * @access public
 */
function wc_cancel_unpaid_orders() {
	global $wpdb;

	$held_duration = get_option( 'woocommerce_hold_stock_minutes' );

	if ( $held_duration < 1 || get_option( 'woocommerce_manage_stock' ) != 'yes' )
		return;

	$date = date( "Y-m-d H:i:s", strtotime( '-' . absint( $held_duration ) . ' MINUTES', current_time( 'timestamp' ) ) );

	$unpaid_orders = $wpdb->get_col( $wpdb->prepare( "
		SELECT posts.ID
		FROM {$wpdb->posts} AS posts
		WHERE 	posts.post_type   IN ('" . implode( "','", wc_get_order_types() ) . "')
		AND 	posts.post_status = 'wc-pending'
		AND 	posts.post_modified < %s
	", $date ) );

	if ( $unpaid_orders ) {
		foreach ( $unpaid_orders as $unpaid_order ) {
			$order = wc_get_order( $unpaid_order );

			if ( apply_filters( 'woocommerce_cancel_unpaid_order', 'checkout' === get_post_meta( $unpaid_order, '_created_via', true ), $order ) ) {
				$order->update_status( 'cancelled', __( 'Unpaid order cancelled - time limit reached.', 'woocommerce' ) );
			}
		}
	}

	wp_clear_scheduled_hook( 'woocommerce_cancel_unpaid_orders' );
	wp_schedule_single_event( time() + ( absint( $held_duration ) * 60 ), 'woocommerce_cancel_unpaid_orders' );
}
add_action( 'woocommerce_cancel_unpaid_orders', 'wc_cancel_unpaid_orders' );

/**
 * Return the count of processing orders.
 *
 * @access public
 * @return int
 */
function wc_processing_order_count() {
	return wc_orders_count( 'processing' );
}

/**
 * Return the orders count of a specific order status.
 *
 * @access public
 * @param string $status
 * @return int
 */
function wc_orders_count( $status ) {
	$count = 0;

	$order_statuses = array_keys( wc_get_order_statuses() );

	if ( ! in_array( 'wc-' . $status, $order_statuses ) ) {
		return 0;
	}

	foreach ( wc_get_order_types( 'order-count' ) as $type ) {
		$this_count  = wp_count_posts( $type, 'readable' );
		$count      += isset( $this_count->{'wc-' . $status} ) ? $this_count->{'wc-' . $status} : 0;
	}

	return $count;
}

/**
 * Clear all transients cache for order data.
 *
 * @param int $post_id (default: 0)
 */
function wc_delete_shop_order_transients( $post_id = 0 ) {
	$post_id             = absint( $post_id );
	$transients_to_clear = array();

	// Clear report transients
	$reports = WC_Admin_Reports::get_reports();

	foreach ( $reports as $report_group ) {
		foreach ( $report_group['reports'] as $report_key => $report ) {
			$transients_to_clear[] = 'wc_report_' . $report_key;
		}
	}

	// clear API report transient
	$transients_to_clear[] = 'wc_admin_report';

	// Clear transients where we have names
	foreach( $transients_to_clear as $transient ) {
		delete_transient( $transient );
	}

	// Increments the transient version to invalidate cache
	WC_Cache_Helper::get_transient_version( 'orders', true );

	// Do the same for regular cache
	WC_Cache_Helper::incr_cache_prefix( 'orders' );

	do_action( 'woocommerce_delete_shop_order_transients', $post_id );
}

/**
 * See if we only ship to billing addresses.
 * @return bool
 */
function wc_ship_to_billing_address_only() {
	return 'billing_only' === get_option( 'woocommerce_ship_to_destination' );
}

/**
 * Create a new order refund programmatically.
 *
 * Returns a new refund object on success which can then be used to add additional data.
 *
 * @since 2.2
 * @param array $args
 * @return WC_Order_Refund|WP_Error
 */
function wc_create_refund( $args = array() ) {
	$default_args = array(
		'amount'     => '',
		'reason'     => null,
		'order_id'   => 0,
		'refund_id'  => 0,
		'line_items' => array(),
		'date'       => current_time( 'mysql', 0 )
	);

	$args        = wp_parse_args( $args, $default_args );
	$refund_data = array();

	// prevent negative refunds
	if ( 0 > $args['amount'] ) {
		$args['amount'] = 0;
	}

	if ( $args['refund_id'] > 0 ) {
		$updating          = true;
		$refund_data['ID'] = $args['refund_id'];
	} else {
		$updating                     = false;
		$refund_data['post_type']     = 'shop_order_refund';
		$refund_data['post_status']   = 'wc-completed';
		$refund_data['ping_status']   = 'closed';
		$refund_data['post_author']   = get_current_user_id() ? get_current_user_id() : 1;
		$refund_data['post_password'] = uniqid( 'refund_' );
		$refund_data['post_parent']   = absint( $args['order_id'] );
		$refund_data['post_title']    = sprintf( __( 'Refund &ndash; %s', 'woocommerce' ), strftime( _x( '%b %d, %Y @ %I:%M %p', 'Order date parsed by strftime', 'woocommerce' ) ) );
		$refund_data['post_date']     = $args['date'];
	}

	if ( ! is_null( $args['reason'] ) ) {
		$refund_data['post_excerpt'] = $args['reason'];
	}

	if ( $updating ) {
		$refund_id = wp_update_post( $refund_data );
	} else {
		$refund_id = wp_insert_post( apply_filters( 'woocommerce_new_refund_data', $refund_data ), true );
	}

	if ( is_wp_error( $refund_id ) ) {
		return $refund_id;
	}

	if ( ! $updating ) {
		// Default refund meta data
		update_post_meta( $refund_id, '_refund_amount', wc_format_decimal( $args['amount'] ) );

		// Get refund object
		$refund = wc_get_order( $refund_id );
		$order  = wc_get_order( $args['order_id'] );

		// Refund currency is the same used for the parent order
		update_post_meta( $refund_id, '_order_currency', $order->get_order_currency() );

		// Negative line items
		if ( sizeof( $args['line_items'] ) > 0 ) {
			$order_items = $order->get_items( array( 'line_item', 'fee', 'shipping' ) );

			foreach ( $args['line_items'] as $refund_item_id => $refund_item ) {
				if ( isset( $order_items[ $refund_item_id ] ) ) {
					if ( empty( $refund_item['qty'] ) && empty( $refund_item['refund_total'] ) && empty( $refund_item['refund_tax'] ) ) {
						continue;
					}

					// Prevents errors when the order has no taxes
					if ( ! isset( $refund_item['refund_tax'] ) ) {
						$refund_item['refund_tax'] = array();
					}

					switch ( $order_items[ $refund_item_id ]['type'] ) {
						case 'line_item' :
							$line_item_args = array(
								'totals' => array(
									'subtotal'     => wc_format_refund_total( $refund_item['refund_total'] ),
									'total'        => wc_format_refund_total( $refund_item['refund_total'] ),
									'subtotal_tax' => wc_format_refund_total( array_sum( $refund_item['refund_tax'] ) ),
									'tax'          => wc_format_refund_total( array_sum( $refund_item['refund_tax'] ) ),
									'tax_data'     => array( 'total' => array_map( 'wc_format_refund_total', $refund_item['refund_tax'] ), 'subtotal' => array_map( 'wc_format_refund_total', $refund_item['refund_tax'] ) )
								)
							);
							$new_item_id = $refund->add_product( $order->get_product_from_item( $order_items[ $refund_item_id ] ), isset( $refund_item['qty'] ) ? $refund_item['qty'] : 0, $line_item_args );
							wc_add_order_item_meta( $new_item_id, '_refunded_item_id', $refund_item_id );
						break;
						case 'shipping' :
							$shipping        = new stdClass();
							$shipping->label = $order_items[ $refund_item_id ]['name'];
							$shipping->id    = $order_items[ $refund_item_id ]['method_id'];
							$shipping->cost  = wc_format_refund_total( $refund_item['refund_total'] );
							$shipping->taxes = array_map( 'wc_format_refund_total', $refund_item['refund_tax'] );

							$new_item_id = $refund->add_shipping( $shipping );
							wc_add_order_item_meta( $new_item_id, '_refunded_item_id', $refund_item_id );
						break;
						case 'fee' :
							$fee            = new stdClass();
							$fee->name      = $order_items[ $refund_item_id ]['name'];
							$fee->tax_class = $order_items[ $refund_item_id ]['tax_class'];
							$fee->taxable   = $fee->tax_class !== '0';
							$fee->amount    = wc_format_refund_total( $refund_item['refund_total'] );
							$fee->tax       = wc_format_refund_total( array_sum( $refund_item['refund_tax'] ) );
							$fee->tax_data  = array_map( 'wc_format_refund_total', $refund_item['refund_tax'] );

							$new_item_id = $refund->add_fee( $fee );
							wc_add_order_item_meta( $new_item_id, '_refunded_item_id', $refund_item_id );
						break;
					}
				}
			}
			$refund->update_taxes();
		}

		$refund->calculate_totals( false );

		// Set total to total refunded which may vary from order items
		$refund->set_total( wc_format_decimal( $args['amount'] ) * -1, 'total' );

		do_action( 'woocommerce_refund_created', $refund_id, $args );
	}

	// Clear transients
	wc_delete_shop_order_transients( $args['order_id'] );

	return new WC_Order_Refund( $refund_id );
}

/**
 * Get tax class by tax id.
 *
 * @since 2.2
 * @param int $tax_id
 * @return string
 */
function wc_get_tax_class_by_tax_id( $tax_id ) {
	global $wpdb;

	$tax_class = $wpdb->get_var( $wpdb->prepare( "SELECT tax_rate_class FROM {$wpdb->prefix}woocommerce_tax_rates WHERE tax_rate_id = %d", $tax_id ) );

	return wc_clean( $tax_class );
}

/**
 * Get payment gateway class by order data.
 *
 * @since 2.2
 * @param int|WC_Order $order
 * @return WC_Payment_Gateway|bool
 */
function wc_get_payment_gateway_by_order( $order ) {
	if ( WC()->payment_gateways() ) {
		$payment_gateways = WC()->payment_gateways->payment_gateways();
	} else {
		$payment_gateways = array();
	}

	if ( ! is_object( $order ) ) {
		$order_id = absint( $order );
		$order    = wc_get_order( $order_id );
	}

	return isset( $payment_gateways[ $order->payment_method ] ) ? $payment_gateways[ $order->payment_method ] : false;
}

/**
 * When refunding an order, create a refund line item if the partial refunds do not match order total.
 *
 * This is manual; no gateway refund will be performed.
 *
 * @since 2.4
 * @param int $order_id
 */
function wc_order_fully_refunded( $order_id ) {
	$order       = wc_get_order( $order_id );
	$max_refund  = wc_format_decimal( $order->get_total() - $order->get_total_refunded() );

	if ( ! $max_refund ) {
		return;
	}

	// Create the refund object
	$refund = wc_create_refund( array(
		'amount'     => $max_refund,
		'reason'     => __( 'Order Fully Refunded', 'woocommerce' ),
		'order_id'   => $order_id,
		'line_items' => array()
	) );

	wc_delete_shop_order_transients( $order_id );
}
add_action( 'woocommerce_order_status_refunded', 'wc_order_fully_refunded' );
