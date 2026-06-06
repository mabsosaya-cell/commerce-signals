<?php

class CS_Cost_Manager
{
    public function __construct()
    {
        add_action(
            'woocommerce_product_options_pricing',
            [$this, 'add_cost_field']
        );

        add_action(
            'woocommerce_process_product_meta',
            [$this, 'save_cost_field']
        );
    }

    public function add_cost_field()
    {
        woocommerce_wp_text_input([
            'id' => '_cs_cost',
            'label' => __('Cost Of Goods', 'commerce-signals'),
            'type' => 'number',
            'custom_attributes' => [
                'step' => '0.01',
                'min' => '0'
            ]
        ]);
    }

    public function save_cost_field($product_id)
    {
        if (!isset($_POST['_cs_cost'])) {
            return;
        }

        update_post_meta(
            $product_id,
            '_cs_cost',
            wc_clean($_POST['_cs_cost'])
        );
    }
}