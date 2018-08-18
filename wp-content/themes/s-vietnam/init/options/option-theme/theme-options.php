<?php
/**
 * Admin settings page.
 */

class SVNSettingsPage {
  /**
  * Holds the values to be used in the fields callbacks
  */
  private $options;

  /**
  * Start up
  */
  public function __construct() {
    add_action('admin_menu', array($this, 's_vietnam_add_setting_page' ));
    add_action('admin_init', array($this, 's_vietnam_page_init'));
  }

  /**
  * Add options page
  */
  public function s_vietnam_add_setting_page() {
    // This page will be under "Settings"
    add_options_page(
      __('PDJ Theme Setting', 's_vietnam_theme'),
      __('Theme Setting', 's_vietnam_theme'),
      'manage_options',
      's-vietnam-setting-admin',
      array($this, 's_vietnam_reate_admin_page')
    );
  }

  /**
  * Options page callback
  */
  public function s_vietnam_reate_admin_page() {
    // Set class property
    $this->options = get_option('s_vietnam_board_settings');

    ?>
    <div class="wrap">
      <h1><?php echo __('Theme settings', 's_vietnam_theme') ?></h1>
      <form method="post" action="options.php">
      <?php
        // This prints out all hidden setting fields
        settings_fields('s_vietnam_option_config');
        do_settings_sections('s-vietnam-setting-admin');
        submit_button();
      ?>
      </form>
    </div>
    <?php
  }

  /**
  * Register and add settings
  */
  public function s_vietnam_page_init() {
    register_setting(
      's_vietnam_option_config', 
      's_vietnam_board_settings',
      array( $this, 's_vietnam_sanitize' )
    );

    // Setting ID
    add_settings_section(
      'pdj_google_api', // ID
      __('Google API', 's_vietnam_theme'), // Title
      array( $this, 's_vietnam_google_print_section_info' ), // Callback
      's-vietnam-setting-admin' // Page
    );

    add_settings_field(
      'pdj_google_api_key',
      __('Google API Key', 's_vietnam_theme'),
      array( $this, 's_vietnam_form_textfield' ), // Callback
      's-vietnam-setting-admin', // Page
      'pdj_google_api',
      'pdj_google_api_key'
    );
  }

  /**
   * Sanitize each setting field as needed
   *
   * @param array $input Contains all settings fields as array keys
   */
  public function s_vietnam_sanitize( $input ) {
    $new_input = array();

    if( isset( $input['pdj_google_api_key'] ) )
      $new_input['pdj_google_api_key'] = sanitize_text_field( $input['pdj_google_api_key'] );

    return $new_input;
  }

  /**
  * Print the Section text
  */
  public function s_vietnam_google_print_section_info() {
    echo __("", 's_vietnam_theme');
  }

  /**
  * Get the settings option array and print one of its values
  */
  public function s_vietnam_form_checkbox($name) {
    $value = isset($this->options[$name]) ? esc_attr($this->options[$name]) : '';
    $checked = "";
    if($value){
      $checked = " checked='checked' ";
    }
    printf('<input type="checkbox" id="form-id-%s" name="s_vietnam_board_settings[%s]" value="1" %s/>', $name, $name, $checked);
  }

  public function s_vietnam_form_textfield($name) {
    $value = isset($this->options[$name]) ? esc_attr($this->options[$name]) : '';
    printf('<input type="text" size=60 id="form-id-%s" name="s_vietnam_board_settings[%s]" value="%s" />', $name, $name, $value);
  }

  public function s_vietnam_form_textarea($name) {
    $value = isset($this->options[$name]) ? esc_attr($this->options[$name]) : '';
    printf('<textarea cols="100%%" rows="3" type="textarea" id="form-id-%s" name="s_vietnam_board_settings[%s]">%s</textarea>', $name, $name, $value);
  }
}
