<?php
define( 'DB_HOST', 'localhost' ); // set database host
define( 'DB_USER', 'admin' ); // set database user
define( 'DB_PASS', 'admin' ); // set database password
define( 'DB_NAME', 'gli' ); // set database name
define( 'SEND_ERRORS_TO', 'you@yourwebsite.com' ); //set email notification email address
define( 'DISPLAY_DEBUG', true ); //display db errors?

/**
* include and create a new instance of the DBClass
**/
require_once( '../includes/class_db/class.db.php' );
$database = new DB();

# $sqlSource = file_get_contents('../includes/class_db/example-data.sql');

# mysqli_multi_query($sql,$sqlSource);

/**
 * Filter all post data
 */
if( isset( $_POST ) )
{
    foreach( $_POST as $key => $value )
    {
        $_POST[$key] = $database->filter( $value );
    }
}

?>

		<div class="container">
			<div class="row">
				<div class="col-xs-12">

					<h2 class="section_title">
						Section 3 - Questions and Answers
					</h2>

				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">

          <!-- question 1 -->
          <table border=1 width="100%" cellpadding="5" align="center">
          <thead>
          	<th>Customer Name</th>
          	<th>Number of purchases</th>
          	<th>Total amount spent</th>
          	<th>Average amount spent</th>
          </thead>
          <?php
          	$customers = "SELECT * FROM customers";
          	$results = $database->get_results($customers);
          	foreach ($results as $result)
          	{
          		// get the customer's details
          		$customer_id = $result['customer_id'];
          		$customer_name = $result['name'];

          		// get all the customer's purchase history information
          		$customer_purchases = "SELECT * FROM customer_products AS c_p JOIN products AS p ON c_p.product_id=p.product_id WHERE customer_id=$customer_id";

          		// count the amount of purchases the customer made
          		$purchase_count = $database->num_rows($customer_purchases);

          		//query to calculate the total cost of the customer's purchases
          		$cost_res = [];
          		$total_costs = "SELECT cost FROM products AS p RIGHT JOIN customer_products AS c_p ON p.product_id=c_p.product_id WHERE c_p.customer_id=$customer_id";
          		$cost_results = $database->get_results($total_costs);
          		foreach ($cost_results as $cr) {
          			$cost_res[] = $cr['cost'];
          		}

          		if (count($cost_res) !== 0) {
          			$cost = array_sum($cost_res);
          			$cost_avg = $cost/count($cost_res);

          		} else {
          			$cost = 0;
          			$cost_avg = 0;
          		}

          		?>
          	<tr>
          		<td><?php echo $customer_name; ?></td>
          		<td>
          		<?php
          			echo $purchase_count;
          		?>
          		</td>
          		<td><?php echo $cost; ?></td>
          		<td><?php echo $cost_avg; ?></td>
          	</tr>

          		<?php
          	}
          ?>
          </table>

          <p align="left">
          <ul>
          	<li>1.Please provide the SQL query to find:
          		<ul>
          			<li>
          				<p>the Total number of purchases,</p>
          					<?php
          						$query = "SELECT * FROM customer_products";
          						$count = $database->num_rows($query);
          					?>
          				<pre>
          				$customer_purchases = "SELECT * FROM customer_products AS c_p JOIN products AS p ON c_p.product_id=p.product_id WHERE customer_id=$customer_id";
          				// count the amount of purchases the customer made
          				$purchase_count = $database->num_rows($customer_purchases);
          				</pre>
          			</li>
          			<li>
          				<p>the Total amount spent</p>
          				<pre>
          					$total_costs = "SELECT cost FROM products AS p RIGHT JOIN customer_products AS c_p ON p.product_id=c_p.product_id WHERE c_p.customer_id=$customer_id";
          				</pre>

          			</li>
          	   <li>
          	   	and the Average spent by each customer, regardless of whether purchases were made.
          	   </li>

          		</ul>

          	</li>
          </ul>


          </p>


          <!-- question 2 -->
          <table border=1 width="100%" cellpadding="5" align="center">
          <thead>
          	<th>Purchase Date</th>
          	<th>Number of purchases</th>
          	<th>Total amount spent</th>
          	<th>Average amount spent</th>
          </thead>
          <?php
          	$purchase_dates = "SELECT * FROM customer_products GROUP BY purchase_date";
          	$results = $database->get_results($purchase_dates);
          	foreach ($results as $result)
          	{
          		// get the customer's details
          		$customer_id = $result['customer_id'];
          		$product_id = $result['product_id'];
          		$purchase_date = $result['purchase_date'];

          		// get all the customer's purchase history information
          		$purchases = "SELECT * FROM customer_products WHERE purchase_date=$purchase_date";

          		// count the amount of purchases the customer made
          		$purchase_count = $database->num_rows($purchases);

          		//query to calculate the total cost of the customer's purchases
          		$cost_res = [];
          		$total_costs = "SELECT cost FROM products AS p RIGHT JOIN customer_products AS c_p ON p.product_id=c_p.product_id WHERE c_p.customer_id=$customer_id";
          		$cost_results = $database->get_results($total_costs);
          		foreach ($cost_results as $cr) {
          			$cost_res[] = $cr['cost'];
          		}

          		if (count($cost_res) !== 0) {
          			$cost = array_sum($cost_res);
          			$cost_avg = $cost/count($cost_res);

          		} else {
          			$cost = 0;
          			$cost_avg = 0;
          		}

          		?>
          	<tr>
          		<td><?php echo $purchase_date; ?></td>
          		<td>
          		<?php
          			echo $customer_id;
          		?>
          		</td>
          		<td><?php echo $cost; ?></td>
          		<td><?php echo $cost_avg; ?></td>
          	</tr>

          		<?php
          	}
          ?>
          </table>

          <p align="left">
          <ul>
          	<li>1.Please provide the SQL query to find:
          		<ul>
          			<li>
          				<p>the Total number of purchases,</p>
          					<?php
          						$query = "SELECT * FROM customer_products";
          						$count = $database->num_rows($query);
          					?>
          				<pre>
          				$customer_purchases = "SELECT * FROM customer_products AS c_p JOIN products AS p ON c_p.product_id=p.product_id WHERE customer_id=$customer_id";
          				// count the amount of purchases the customer made
          				$purchase_count = $database->num_rows($customer_purchases);
          				</pre>
          			</li>
          			<li>
          				<p>the Total amount spent</p>
          				<pre>
          					$total_costs = "SELECT cost FROM products AS p RIGHT JOIN customer_products AS c_p ON p.product_id=c_p.product_id WHERE c_p.customer_id=$customer_id";
          				</pre>

          			</li>
          	   <li>
          	   	and the Average spent by each customer, regardless of whether purchases were made.
          	   </li>

          		</ul>

          	</li>
          </ul>


          </p>
				</div>
			</div>

		</div>
