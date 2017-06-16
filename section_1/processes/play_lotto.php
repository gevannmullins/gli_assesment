<?php

// new instance of the lotto class
require_once('./lotto_class.php');
$lotto_player = new Lotto_Player();

// database connection using the database class
$server_host = $_SERVER['HTTP_HOST'];
define( 'DB_HOST', 'localhost' ); // set database host
define( 'DB_USER', 'admin' ); // set database user
define( 'DB_PASS', 'admin' ); // set database password
define( 'DB_NAME', 'lotto' ); // set database name
define( 'SEND_ERRORS_TO', 'you@yourwebsite.com' ); //set email notification email address
define( 'DISPLAY_DEBUG', true ); //display db errors?

require_once( '../../includes/class_db/class.db.php' );
$database = new DB();

// get lotto numbers
$results = $lotto_player->get_lotto_numbers();
// get powerball numbers
$powerball_results = $lotto_player->get_powerball_numbers();


/**
* Inserting data
**/
$lotto_insert = array(
    'lotto_numbers' => json_encode($results),
    'powerball_numbers' => json_encode($powerball_results), //Random thing to insert
    'date_time' => date('Y-m-d H:i:s')
);
$add_query = $database->insert( 'lotto_results', $lotto_insert );
if( $add_query )
{
    echo '<p>Successfully added lotto result database.</p>';
}

?>

<style>

</style>

<div>
  <h3>Lotto Number: </h3>
  <?php
    foreach($results as $result){
      ?>
      <div style="position: relative; text-align: center; padding: 5px; display: inline; border: 1px solid #0f0f0f; border-radius: 12px;">
        <?php echo $result; ?>
      </div>
      <?php
    }
  ?>
</div>

<div>
  <h3>Powerball Number: </h3>
  <?php
    foreach($powerball_results as $powerball_result){
      ?>
      <div style="position: relative; text-align: center; padding: 5px; display: inline; border: 1px solid #0f0f0f; border-radius: 12px;">
        <?php echo json_decode($powerball_result); ?>
      </div>
      <?php
    }
  ?>
</div>
