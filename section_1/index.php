<?php
define( 'DB_HOST', 'localhost' ); // set database host
define( 'DB_USER', 'root' ); // set database user
define( 'DB_PASS', 'root' ); // set database password
define( 'DB_NAME', 'gli_test' ); // set database name
define( 'SEND_ERRORS_TO', 'you@yourwebsite.com' ); //set email notification email address
define( 'DISPLAY_DEBUG', true ); //display db errors?

require_once( '../includes/class_db/class.db.php' );
$database = new DB();




/**
 * Retrieve results of a standard query
 */
$query = "SELECT name FROM customers";
$results = $database->get_results( $query );
foreach( $results as $row )
{
    echo $row['name'] .'<br />';
}





?>


