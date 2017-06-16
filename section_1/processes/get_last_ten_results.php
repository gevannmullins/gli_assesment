<?php


$server_host = $_SERVER['HTTP_HOST'];
define( 'DB_HOST', 'localhost' ); // set database host
define( 'DB_USER', 'admin' ); // set database user
define( 'DB_PASS', 'admin' ); // set database password
define( 'DB_NAME', 'lotto' ); // set database name
define( 'SEND_ERRORS_TO', 'you@yourwebsite.com' ); //set email notification email address
define( 'DISPLAY_DEBUG', true ); //display db errors?

require_once( '../../includes/class_db/class.db.php' );
$database = new DB();

/**
 * Retrieving a single row of data
 */
$query = "SELECT lotto_numbers, powerball_numbers, date_time FROM lotto_results ORDER BY date_time DESC LIMIT 10";
$results = $database->get_results( $query );

?>

<div class="container">
  <?php
  foreach( $results as $row )
  {

  ?>
  <div class="row">
    <div class="col-xs-5">
    <?php echo $row['lotto_numbers']; ?>
    </div>
    <div class="col-xs-4">
      <?php echo $row['powerball_numbers']; ?>
    </div>
    <div class="col-xs-3">
      <?php echo $row['date_time']; ?>
    </div>
  </div>
    <?php
  }
?>
</div>
