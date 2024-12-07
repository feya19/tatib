<?php

if (!function_exists('get_localized_date_parts')) {
    function get_localized_date_parts($datetime)
    {
        $days = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        ];

        $months = [
            'January' => 'Januari',
            'February' => 'Februari',
            'March' => 'Maret',
            'April' => 'April',
            'May' => 'Mei',
            'June' => 'Juni',
            'July' => 'Juli',
            'August' => 'Agustus',
            'September' => 'September',
            'October' => 'Oktober',
            'November' => 'November',
            'December' => 'Desember'
        ];

        try {
            $date = new DateTime($datetime);

            return [
                'day_name' => $days[$date->format('l')],
                'day' => $date->format('d'),
                'month_name' => $months[$date->format('F')],
                'year' => $date->format('Y'),
                'time' => $date->format('H:i')
            ];
        } catch (Exception $e) {
            return null; // Handle invalid date inputs
        }
    }
}

if (!function_exists('human_date')) {
    function human_date($datetime)
    {
        $parts = get_localized_date_parts($datetime);

        if (!$parts) {
            return '-';
        }

        return "{$parts['day_name']}, {$parts['day']} {$parts['month_name']} {$parts['year']}";
    }
}

if (!function_exists('datetime')) {
    function datetime($datetime)
    {
        $parts = get_localized_date_parts($datetime);

        if (!$parts) {
            return '-';
        }

        return "{$parts['day']} {$parts['month_name']} {$parts['year']} {$parts['time']}";
    }
}
