<?php

class CS_Profit_Calculator
{
    public function __construct()
    {
        add_action(
            'woocommerce_order_status_completed',
            [$this, 'calculate_profit']
        );
    }

    public function calculate_profit($order_id)
    {
        global $wpdb;

        $order = wc_get_order($order_id);

        if (!$order) {
            return;
        }

        $revenue = (float)$order->get_total();
        $cost = 0;

        foreach ($order->get_items() as $item)
        {
            $product_id = $item->get_product_id();

            $unit_cost = (float)get_post_meta(
                $product_id,
                '_cs_cost',
                true
            );

            $cost += $unit_cost * $item->get_quantity();
        }

        $profit = $revenue - $cost;

        $wpdb->insert(
            $wpdb->prefix . 'cs_profit_logs',
            [
                'order_id' => $order_id,
                'revenue' => $revenue,
                'cost' => $cost,
                'profit' => $profit,
                'created_at' => current_time('mysql')
            ]
        );
    }
}