<?php

/**
 * Plugin Name: Network Site Stats
 * Description: Hiển thị thống kê nhanh của các site con trên WordPress Multisite.
 * Version: 1.0
 * Author: Student
 * Network: true
 */

if (!is_multisite()) {
    return;
}

// Thêm menu trong Network Admin
add_action('network_admin_menu', 'nss_register_network_menu');

function nss_register_network_menu()
{
    add_menu_page(
        'Network Site Stats',
        'Site Stats',
        'manage_network',
        'network-site-stats',
        'nss_render_stats_page',
        'dashicons-chart-bar',
        30
    );
}

// Hàm hiển thị giao diện thống kê
function nss_render_stats_page()
{
    $sites = get_sites(); // Lấy danh sách tất cả site
    echo '<div class="wrap"><h1>Network Site Statistics</h1>';
    echo '<table class="widefat fixed striped">';
    echo '<thead><tr>
            <th>ID</th>
            <th>Site Name</th>
            <th>Post Count</th>
            <th>Last Post Date</th>
        </tr></thead><tbody>';

    foreach ($sites as $site) {
        $blog_id = $site->blog_id;

        switch_to_blog($blog_id);

        // Lấy số bài viết
        $post_count = wp_count_posts()->publish;

        // Lấy bài viết mới nhất
        $last_post = get_posts([
            'numberposts' => 1,
            'orderby' => 'date',
            'order' => 'DESC',
        ]);

        if (!empty($last_post)) {
            $last_post_date = $last_post[0]->post_date;
        } else {
            $last_post_date = 'No posts';
        }

        echo '<tr>';
        echo '<td>' . $blog_id . '</td>';
        echo '<td>' . get_bloginfo('name') . '</td>';
        echo '<td>' . $post_count . '</td>';
        echo '<td>' . $last_post_date . '</td>';
        echo '</tr>';

        restore_current_blog();
    }

    echo '</tbody></table></div>';
}
