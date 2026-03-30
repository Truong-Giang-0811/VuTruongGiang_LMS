<?php

/**
 * Plugin Name: LearnPress Stats Dashboard
 * Description: Hiển thị thống kê tổng quan về khóa học và học viên LearnPress.
 * Version: 1.0
 * Author: Vu Truong Giang
 * License: GPL2
 */

// Ngăn chặn truy cập trực tiếp vào file
if (!defined('ABSPATH')) exit;

class LP_Stats_Dashboard
{

    public function __construct()
    {
        // 1. Thêm Widget vào Dashboard Admin
        add_action('wp_dashboard_setup', array($this, 'add_dashboard_widget'));
        add_shortcode('lp_total_stats', array($this, 'render_stats_html'));
    }

    /**
     * Hàm truy vấn dữ liệu từ Database
     * Sử dụng global $wpdb để lấy dữ liệu chính xác nhất
     */
    private function get_lp_data()
    {
        global $wpdb;

        // Lấy tổng số khóa học (Post type là lp_course)
        $total_courses = wp_count_posts('lp_course')->publish;

        // Lấy tổng số học viên (Đếm số User ID duy nhất trong bảng learnpress_user_items)
        $total_students = $wpdb->get_var("
            SELECT COUNT(DISTINCT user_id) 
            FROM {$wpdb->prefix}learnpress_user_items 
            WHERE item_type = 'lp_course'
        ");

        // Lấy số lượng khóa học đã hoàn thành (Status = 'completed')
        $completed_courses = $wpdb->get_var("
            SELECT COUNT(*) 
            FROM {$wpdb->prefix}learnpress_user_items 
            WHERE item_type = 'lp_course' AND status = 'completed'
        ");

        return array(
            'courses'   => $total_courses ? $total_courses : 0,
            'students'  => $total_students ? $total_students : 0,
            'completed' => $completed_courses ? $completed_courses : 0
        );
    }

    /**
     * Hàm tạo giao diện hiển thị (HTML)
     */
    public function render_stats_html()
    {
        $data = $this->get_lp_data();

        $html = '<div style="background: #fff; padding: 15px; border: 1px solid #ccd0d4; border-radius: 4px;">';
        $html .= '<ul style="margin: 0; list-style: none; padding: 0;">';
        $html .= '<li><strong>📚 Tổng số khóa học:</strong> ' . esc_html($data['courses']) . '</li>';
        $html .= '<li><strong>👥 Tổng số học viên:</strong> ' . esc_html($data['students']) . '</li>';
        $html .= '<li><strong>✅ Khóa học hoàn thành:</strong> ' . esc_html($data['completed']) . '</li>';
        $html .= '</ul>';
        $html .= '</div>';

        return $html;
    }

    /**
     * Đăng ký Widget với WordPress Dashboard
     */
    public function add_dashboard_widget()
    {
        wp_add_dashboard_widget(
            'lp_stats_widget',
            'LearnPress Statistics - Vu Truong Giang',
            array($this, 'display_dashboard_widget')
        );
    }

    public function display_dashboard_widget()
    {
        echo $this->render_stats_html();
    }
}

// Khởi tạo class
new LP_Stats_Dashboard();
