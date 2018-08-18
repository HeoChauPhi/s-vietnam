<?php
/**
 * Admin settings page.
 */

class CustomBrowsersSettingsPage {
  /**
  * Holds the values to be used in the fields callbacks
  */
  private $options;

  /**
  * Start up
  */
  public function __construct() {
    add_action('admin_menu', array($this, 'add_plugin_page' ));
    add_action('admin_init', array($this, 'page_init'));
  }

  /**
  * Add options page
  */
  public function add_plugin_page() {
    // This page will be under "Settings"
    add_options_page(
      'Browsers Board Settings',
      'Browsers Board',
      'manage_options',
      'browsers-setting-admin',
      array($this, 'create_admin_page')
    );
  }

  /**
  * Options page callback
  */
  public function create_admin_page() {
    // Set class property
    $this->options = get_option('custom_browsers_board_settings');

    ?>
    <div class="wrap">
      <h1><?php echo __('Browsers Board Settings', 'custom_browsers'); ?></h1>
      <form method="post" action="options.php" class="custom-browsers-setting">
      <?php
        // This prints out all hidden setting fields
        settings_fields('custom_browsers_option_config');
        do_settings_sections('custom-browsers-setting-admin');
        submit_button();
      ?>
      </form>
    </div>
    <?php
  }

  /**
  * Register and add settings
  */
  public function page_init() {
    // Register Setting
    register_setting(
      'custom_browsers_option_config', 
      'custom_browsers_board_settings',
      array( $this, 'custom_browsers_sanitize' )
    );

    // Setting Section
    add_settings_section(
      'setting_section_id', // ID
      __('Browsers Desctiptions Setting', 'custom_browsers'), // Title
      array( $this, 'print_section_info' ), // Callback
      'custom-browsers-setting-admin' // Page
    );

    // Setting Fields
    add_settings_field(
      'time_set',
      __('Message display time again (second):', 'custom_browsers'),
      array( $this, 'form_number' ), // Callback
      'custom-browsers-setting-admin', // Page
      'setting_section_id',
      'time_set'
    );

    /*add_settings_field(
      'all_desc',
      __('Defualt Browsers Description:', 'custom_browsers'),
      array( $this, 'form_textarea' ), // Callback
      'custom-browsers-setting-admin', // Page
      'setting_section_id',
      'all_desc'
    );*/

    add_settings_field(
      'ie_desc',
      __('Internet Explorer Description:', 'custom_browsers'),
      array( $this, 'form_textarea' ), // Callback
      'custom-browsers-setting-admin', // Page
      'setting_section_id',
      'ie_desc'
    );

    add_settings_field(
      'ie_checkbox',
      __('Display for All Internet Explorer versions:', 'custom_browsers'),
      array( $this, 'form_checkbox' ), // Callback
      'custom-browsers-setting-admin', // Page
      'setting_section_id',
      'ie_checkbox'
    );

    add_settings_field(
      'yandex_desc',
      __('Yandex Description:', 'custom_browsers'),
      array( $this, 'form_textarea' ), // Callback
      'custom-browsers-setting-admin', // Page
      'setting_section_id',
      'yandex_desc'
    );

    add_settings_field(
      'edge_desc',
      __('Edge Description:', 'custom_browsers'),
      array( $this, 'form_textarea' ), // Callback
      'custom-browsers-setting-admin', // Page
      'setting_section_id',
      'edge_desc'
    );

    add_settings_field(
      'opera_desc',
      __('Opera Description:', 'custom_browsers'),
      array( $this, 'form_textarea' ), // Callback
      'custom-browsers-setting-admin', // Page
      'setting_section_id',
      'opera_desc'
    );

    add_settings_field(
      'chrome_desc',
      __('Chrome Description:', 'custom_browsers'),
      array( $this, 'form_textarea' ), // Callback
      'custom-browsers-setting-admin', // Page
      'setting_section_id',
      'chrome_desc'
    );

    add_settings_field(
      'safari_desc',
      __('Safari Description:', 'custom_browsers'),
      array( $this, 'form_textarea' ), // Callback
      'custom-browsers-setting-admin', // Page
      'setting_section_id',
      'safari_desc'
    );

    add_settings_field(
      'firefox_desc',
      __('Firefox Description:', 'custom_browsers'),
      array( $this, 'form_textarea' ), // Callback
      'custom-browsers-setting-admin', // Page
      'setting_section_id',
      'firefox_desc'
    );
  }

  /**
   * Sanitize each setting field as needed
   *
   * @param array $input Contains all settings fields as array keys
   */
  public function custom_browsers_sanitize( $input ) {
    $new_input = array();

    if( isset( $input['time_set'] ) )
      $new_input['time_set']      = $input['time_set'];

    /*if( isset( $input['all_desc'] ) )
      $new_input['all_desc']      = $input['all_desc'];*/

    if( isset( $input['ie_desc'] ) )
      $new_input['ie_desc']       = $input['ie_desc'];

    if( isset( $input['ie_checkbox'] ) )
      $new_input['ie_checkbox']   = $input['ie_checkbox'];

    if( isset( $input['yandex_desc'] ) )
      $new_input['yandex_desc']   = $input['yandex_desc'];

    if( isset( $input['edge_desc'] ) )
      $new_input['edge_desc']     = $input['edge_desc'];

    if( isset( $input['opera_desc'] ) )
      $new_input['opera_desc']    = $input['opera_desc'];

    if( isset( $input['chrome_desc'] ) )
      $new_input['chrome_desc']   = $input['chrome_desc'];

    if( isset( $input['safari_desc'] ) )
      $new_input['safari_desc']   = $input['safari_desc'];

    if( isset( $input['firefox_desc'] ) )
      $new_input['firefox_desc']  = $input['firefox_desc'];

    return $new_input;
  }

  /**
  * Print the Section text
  */
  public function print_section_info() {
    $section_markup = '<div>';
    $section_markup .= '<div>' . __('<i>Use the shortcode</i> <strong>[custom_browsers_detect]</strong> <i>where you markup!</i>', 'custom_browsers') . '</div>';
    $section_markup .= '<div>' . __('<i>Use the keyword</i> <strong>{%browser%}</strong> <i>where you need it!</i>', 'custom_browsers') . '</div>';
    $section_markup .= '<div>';
    echo $section_markup;
  }

  /**
  * Get the settings option array and print one of its values
  */
  public function form_textfield($name) {
    $value = isset($this->options[$name]) ? esc_attr($this->options[$name]) : '';
    printf('<input type="text" size=60 id="form-id-%s" name="custom_browsers_board_settings[%s]" value="%s" />', $name, $name, $value);
  }

  /**
  * Get the settings option array and print one of its values
  */
  public function form_number($name) {
    $value = isset($this->options[$name]) ? esc_attr($this->options[$name]) : '60';
    printf('<input type="number" size=60 id="form-id-%s" name="custom_browsers_board_settings[%s]" value="%s" min=-1 />', $name, $name, $value);
  }

  /**
  * Get the settings option array and print one of its values
  */
  public function form_checkbox($name) {
    if ( $this->options[$name] == 'on' ) {
      $value = 'checked';
    }
    printf('<input type="checkbox" id="form-id-%s" name="custom_browsers_board_settings[%s]" %s />', $name, $name, $value);
  }

  /**
  * Get the settings option array and print one of its values
  */
  public function form_textarea($name) {
    $value = isset($this->options[$name]) ? esc_attr($this->options[$name]) : '{%browser%}';
    printf('<textarea rows="4" class="large-text" type="textarea" id="form-id-%s" name="custom_browsers_board_settings[%s]">%s</textarea>', $name, $name, $value);
  }
}
