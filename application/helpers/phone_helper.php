<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('format_phone')) {
    function format_phone($phone) {
        // Remove all non-numeric characters from the phone number
        $phone = preg_replace('/[^0-9]/', '', $phone);

        // Add a dash (-) after every fourth character in the phone number
        $phone = substr_replace($phone, '-', 4, 0);
        $phone = substr_replace($phone, '-', 9, 0);

        return $phone;
    }
}

?>