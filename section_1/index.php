<?php
$document_root = $_SERVER['DOCUMENT_ROOT'];
$server_host = $_SERVER['HTTP_HOST'];
define( 'DB_HOST', 'localhost' ); // set database host
define( 'DB_USER', 'admin' ); // set database user
define( 'DB_PASS', 'admin' ); // set database password
define( 'DB_NAME', 'gli' ); // set database name
define( 'SEND_ERRORS_TO', 'you@yourwebsite.com' ); //set email notification email address
define( 'DISPLAY_DEBUG', true ); //display db errors?

require_once( '../includes/class_db/class.db.php' );
$database = new DB();

require_once('processes/lotto_class.php');
$lotto_player = new Lotto_Player();

?>

<div class="container">

  <div class="row">
    <div class="col-xs-12">
      <h2 class="section_title">
        <h2 class="section_title">Section 1 - Lotto Results Section</h2>
      </h2>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 play_result_container">

    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 text-center buttons_container">
      <a href="section_1/processes/play_lotto.php" class="ajax_btn play_lotto_btn">Play Lotto</a>
      <a href="section_1/processes/export_results.php" class="ajax_btn export_results_btn">Play Lotto</a>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 latest_result_container">

      <h3>Latest 10 Results</h3>
      <div class="latest_results">

      </div>

    </div>
  </div>

</div>

<script language="javascript">
$(document).ready(function(){

  // play button
  $('.play_lotto_btn').on('click', function(e){
    e.preventDefault();
    // get all needed values
    var href = $(this).attr('href');

    $.ajax({
      url: href,
      success: function(result){
        $(".play_result_container").html(result);
      }
    });
    // refresh the latest results
    $('.latest_results').load('section_1/processes/get_last_ten_results.php');

  });

  // display latest 10 results
  $('.latest_results').load('section_1/processes/get_last_ten_results.php');

});
</script>
