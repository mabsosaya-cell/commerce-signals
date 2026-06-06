<?php

class CS_Activator
{
    public static function activate()
    {
        global $wpdb;

        $table = $wpdb->prefix . 'cs_profit_logs';

        $charset_collate = $wpdb->get_charset_collate();

        $sql = "
        CREATE TABLE {$table} (
            id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
            order_id BIGINT UNSIGNED NOT NULL,
            revenue DECIMAL(12,2) NOT NULL,
            cost DECIMAL(12,2) NOT NULL,
            profit DECIMAL(12,2) NOT NULL,
            created_at DATETIME NOT NULL,
            PRIMARY KEY (id),
            KEY order_id (order_id)
        ) {$charset_collate};
        ";

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';

        dbDelta($sql);
    }
}