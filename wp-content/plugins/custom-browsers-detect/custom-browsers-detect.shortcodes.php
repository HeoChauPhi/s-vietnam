<?php
add_shortcode('custom_browsers_detect', 'custom_browsers_register_shortcode');
function custom_browsers_register_shortcode($attrs) {
  extract(shortcode_atts (array(), $attrs));

  ob_start();

    $browsers_detected  = get_option('custom_browsers_board_settings');
    $arr_browsers       = ["MSIE", "Trident", "YaBrowser", "Edge", "OPR", "Chrome", "Safari", "Firefox"];
    $agent              = $_SERVER['HTTP_USER_AGENT'];

    $user_browser   = '';
    $class_browser  = '';
    foreach ($arr_browsers as $browser) {
      if (strpos($agent, $browser) !== false) {
        $user_browser = $browser;
        break;
      } 
    }

    switch ($user_browser) {
      case 'MSIE':
      case 'Trident':
        $browser_desc   = $browsers_detected['ie_desc'];
        if ( $browsers_detected['ie_checkbox'] == 'on' ) {
          $user_browser   = str_replace('{%browser%}', 'Internet Explorer', $browser_desc);
        } else {
          if (strpos($agent, 'MSIE 8.0') || strpos($agent, 'MSIE 9.0') || strpos($agent, 'MSIE 10.0')) {
            $user_browser   = str_replace('{%browser%}', 'Internet Explorer', $browser_desc);
          } else {
            $user_browser   = '';
          }
        }
        $class_browser  = ' internet-explorer';
        break;

      case 'YaBrowser':
        $browser_desc   = $browsers_detected['yandex_desc'];
        $user_browser   = str_replace('{%browser%}', 'Yandex Explorer', $browser_desc);
        $class_browser  = ' yandex-explorer';
        break;

      case 'Edge':
        $browser_desc   = $browsers_detected['edge_desc'];
        $user_browser   = str_replace('{%browser%}', 'Edge Explorer', $browser_desc);
        $class_browser  = ' edge-explorer';
        break;

      case 'OPR':
        $browser_desc   = $browsers_detected['opera_desc'];
        $user_browser   = str_replace('{%browser%}', 'Opera Explorer', $browser_desc);
        $class_browser  = ' opera-explorer';
        break;

      case 'Chrome':
        $browser_desc   = $browsers_detected['chrome_desc'];
        $user_browser   = str_replace('{%browser%}', 'Chrome Explorer', $browser_desc);
        $class_browser  = ' chrome-explorer';
        break;

      case 'Safari':
        $browser_desc   = $browsers_detected['safari_desc'];
        $user_browser   = str_replace('{%browser%}', 'Safari Explorer', $browser_desc);
        $class_browser  = ' safari-explorer';
        break;

      case 'Firefox':
        $browser_desc   = $browsers_detected['firefox_desc'];
        $user_browser   = str_replace('{%browser%}', 'Firefox Explorer', $browser_desc);
        $class_browser  = ' firefox-explorer';
        break;

      default:
        $browser_desc = $browsers_detected['all_desc'];
        $user_browser = str_replace('{%browser%}', '', $browser_desc);
        break;
    }

    $browser_markup = '<div class="custom-browser-detected' . $class_browser . '" data-time-set="' . $browsers_detected['time_set'] . '">';
    $browser_markup .= '<div class="custom-browser-body">';
    $browser_markup .= '<span class="custom-browser-close">&#10799;</span>';
    $browser_markup .= '<div class="custom-browser-content">' . nl2br($user_browser) . '</div>';
    $browser_markup .= '</div>';
    $browser_markup .= '</div>';
    if ($user_browser) {
      echo $browser_markup;
    }

  $content = ob_get_contents();
  ob_end_clean();
  return $content;
  wp_reset_postdata();
}