<?php 

/**
 * Order Date
 * Order Number
 * 
 * Payment Type (Payment Method)
 * Amount to Collect (Price)
 * 
 * Piece (Qty)
 * Description
 * 
 * Name (User Name)
 * Mobile (User Phone)
 * City, Country, Area
 */

$templater = WPI()->templater();
$invoice = $templater->invoice;

$invoice_info = $invoice->get_invoice_info();
$order_item_totals = $invoice->get_order_item_totals();
$columns_data = $invoice->get_columns_data();

$order_details = [
  'Order Date: %s' => get_value( $invoice_info['order_date'] ),
  'Order Number: #%s' => get_value( $invoice_info['order_number'] ),
];

$payment_details = [
  'Payment Type: %s' => get_value( $invoice_info['payment_method'] ),
  'Amount to Collect: %s' => get_value( $order_item_totals['order_total'] ),
];

$columns_details = [

];

function get_value( $data, $sanitize_fn = 'sanitize_text_field' ) {
  return call_user_func( $sanitize_fn, $data['value'] );
}

echo '<pre>';
var_dump($columns_data);
echo '</pre>';

?>

<?php /*

<div class="main">
  <div class="details details_order">
    <p><?php printf( __( 'Order Date: %s' ), '2020-07-25 13:40:00' ); ?></p>
    <p><?php printf( __( 'Order Number: %s' ), '#3926' ); ?></p>
  </div>

  <div class="details details_next details_payment">
    <p><?php printf( __( 'Payment Type: %s' ), 'cod' ); ?></p>
    <p><?php printf( __( 'Amount to Collect: %d' ), 344 ); ?></p>
  </div>

  <div class="details details_next details_price">
    <p><?php printf( __( 'Piece: %d' ), 1 ); ?></p>
    <p><?php printf( __( 'Description: %s' ), '|Seago ...' ); ?></p>
  </div>

  <div class="details details_next details_sender">
    <h4 class="details__title"><?php echo esc_html__( 'Sender Detail' ); ?></h4>
    <p><?php printf( __( 'Name: %s' ), 'Ay7aja' ); ?></p>
    <p><?php printf( __( 'Mobile: %s' ), '0541040190' ); ?></p>
    <p><?php printf( __( 'City: %s' ), 'Jeddah' ); ?></p>
    <p><?php printf( __( 'Country: %s' ), 'SA' ); ?></p>
    <p><?php printf( __( 'Area: %s' ), '...' ); ?></p>
  </div>

  <div class="details details_next details_customer">
    <h4 class="details__title"><?php echo esc_html__( 'Customer Detail' ); ?></h4>
    <p><?php printf( __( 'Name: %s' ), '...' ); ?></p>
    <p><?php printf( __( 'Mobile: %s' ), '0505707289' ); ?></p>
    <p><?php printf( __( 'City: %s' ), '...' ); ?></p>
    <p><?php printf( __( 'Country: %s' ), 'SA' ); ?></p>
    <p><?php printf( __( 'Area: %s' ), '...' ); ?></p>
  </div>
</div>

*/ ?>