<?php

require_once('./lotto_class.php');
$lotto_player = new Lotto_Player();

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
$names = array(
    'lotto_numbers' => json_encode($results),
    'powerball_numbers' => json_encode($powerball_results), //Random thing to insert
    'date_time' => date('Y-m-d H:i:s')
);
$add_query = $database->insert( 'lotto_results', $names );
if( $add_query )
{
    echo '<p>Successfully inserted &quot;'. print_r($names['lotto_numbers']). '&quot; into the database.</p>';
}



?>
<link href="../../resources/css/custom_styles.css" />

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
        <?php echo $powerball_result; ?>
      </div>
      <?php
    }
  ?>
</div>
