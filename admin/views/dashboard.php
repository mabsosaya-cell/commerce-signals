<?php

global $wpdb;

$table = $wpdb->prefix . 'cs_profit_logs';

$total_revenue = $wpdb->get_var(
    "SELECT SUM(revenue) FROM {$table}"
);

$total_profit = $wpdb->get_var(
    "SELECT SUM(profit) FROM {$table}"
);

?>

<div class="wrap">

<h1>Commerce Signals</h1>

<div class="card">
    <h2>Total Revenue</h2>
    <p><?php echo wc_price($total_revenue); ?></p>
</div>

<div class="card">
    <h2>Total Profit</h2>
    <p><?php echo wc_price($total_profit); ?></p>
</div>

</div>