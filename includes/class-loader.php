<?php

class CS_Loader
{
    public static function init()
    {
        require_once CS_PATH . 'admin/class-admin.php';
        require_once CS_PATH . 'includes/class-cost-manager.php';
        require_once CS_PATH . 'includes/class-profit-calculator.php';

        new CS_Admin();
        new CS_Cost_Manager();
        new CS_Profit_Calculator();
    }
}