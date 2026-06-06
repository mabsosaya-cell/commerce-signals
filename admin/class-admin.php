<?php

class CS_Admin
{
    public function __construct()
    {
        add_action(
            'admin_menu',
            [$this, 'register_menu']
        );
    }

    public function register_menu()
    {
        add_menu_page(
            'Commerce Signals',
            'Commerce Signals',
            'manage_options',
            'commerce-signals',
            [$this, 'dashboard'],
            'dashicons-chart-line',
            56
        );
    }

    public function dashboard()
    {
        include CS_PATH . 'admin/views/dashboard.php';
    }
}