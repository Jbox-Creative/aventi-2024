<?php
// Check UTM parameters in URL on init
add_action('init','check_utms');
function check_utms() {
    // If they are present, then set them as cookies
    if (isset($_GET['utm_crcampaign'])) {
        setcookie('utm_crcampaign', $_GET['utm_crcampaign'], time()+ (7 * 24 * 60 * 60), '/');
        $_COOKIE['utm_crcampaign'] = $_GET['utm_crcampaign']; // Just in case.
    }

    if (isset($_GET['utm_campaign'])) {
        setcookie('utm_campaign', $_GET['utm_campaign'], time()+ (7 * 24 * 60 * 60), '/');
        $_COOKIE['utm_campaign'] = $_GET['utm_campaign']; // Just in case.
    }
}

// Populate GF field for UTM CR Campaign
add_filter('gform_field_value_utm_crcampaign', 'populate_utm_crcampaign');
function populate_utm_crcampaign($term) {
    if (isset($_COOKIE['utm_crcampaign'])) {
        return $_COOKIE['utm_crcampaign'];
    }
    return '';
}

// Populate GF field for UTM Campaign
add_filter('gform_field_value_utm_campaign', 'populate_utm_campaign');
function populate_utm_campaign($term) {
    if (isset($_COOKIE['utm_campaign'])) {
        return $_COOKIE['utm_campaign'];
    }
    return '';
}