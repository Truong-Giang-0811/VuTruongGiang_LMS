<?php
/*
Plugin Name: Student Info Plugin
Description: Hiển thị thông tin sinh viên
Version: 1.1
Author: Your Name
*/

function student_info_plugin($content)
{

    // Chỉ áp dụng cho bài viết (post)
    if (is_single() && in_the_loop() && is_main_query()) {

        $info = '
        <div class="student-box">
            <h3>🎓 Thông tin sinh viên</h3>
            <p><strong>MSSV:</strong> 23810310117</p>
            <p><strong>Họ tên:</strong> Vũ Trường Giang</p>
        </div>
        ';

        return $content . $info;
    }

    return $content;
}

add_filter('the_content', 'student_info_plugin');
// Thêm CSS
function student_plugin_style()
{
    echo '
    <style>
        .student-box {
            border: 2px solid #4CAF50;
            padding: 15px;
            margin-top: 20px;
            border-radius: 10px;
            background: linear-gradient(135deg, #e8f5e9, #ffffff);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .student-box h3 {
            margin-top: 0;
            color: #2e7d32;
        }

        .student-box p {
            margin: 5px 0;
            font-size: 15px;
        }
    </style>
    ';
}
add_action('wp_head', 'student_plugin_style');
