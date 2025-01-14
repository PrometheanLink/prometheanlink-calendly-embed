<?php
/**
 * Plugin Name: PrometheanLink Calendly Embed
 * Description: A simple plugin to embed a Calendly booking page via a shortcode. 
 * Version: 1.0
 * Author: PrometheanLink - https://prometheanlink.com
 * License: GPL2
 */

// SECURITY: Avoid direct file access.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * 1) Register a setting to store the Calendly URL
 */
function prometheanlink_calendly_register_settings() {
    // 'prometheanlink_calendly_options' is the name of the option in the database
    register_setting( 'prometheanlink_calendly_settings_group', 'prometheanlink_calendly_url' );
}
add_action( 'admin_init', 'prometheanlink_calendly_register_settings' );

/**
 * 2) Add a settings page under the "Settings" menu
 */
function prometheanlink_calendly_add_settings_page() {
    add_options_page(
        'PrometheanLink Calendly Settings',
        'Calendly Embed',
        'manage_options',
        'prometheanlink-calendly-settings',
        'prometheanlink_calendly_render_settings_page'
    );
}
add_action( 'admin_menu', 'prometheanlink_calendly_add_settings_page' );

/**
 * 3) Render the settings page
 */
function prometheanlink_calendly_render_settings_page() {
    // Check user permissions.
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }

    // Handle form submission
    if ( isset( $_POST['prometheanlink_calendly_url'] ) ) {
        // Security: Validate nonce
        if ( ! isset( $_POST['prometheanlink_calendly_nonce'] ) 
             || ! wp_verify_nonce( $_POST['prometheanlink_calendly_nonce'], 'prometheanlink_calendly_save_settings' ) 
        ) {
            wp_die( 'Invalid nonce' );
        }

        // Sanitize user input
        $calendly_url = esc_url_raw( $_POST['prometheanlink_calendly_url'] );

        // Update the option in the database
        update_option( 'prometheanlink_calendly_url', $calendly_url );

        // Show an update message
        ?>
        <div class="updated notice">
            <p>Calendly URL updated.</p>
        </div>
        <?php
    }

    // Get the stored URL
    $stored_url = get_option( 'prometheanlink_calendly_url', '' );
    ?>

    <div class="wrap">
        <h1>PrometheanLink Calendly Settings</h1>
        <form method="POST" action="">
            <?php wp_nonce_field( 'prometheanlink_calendly_save_settings', 'prometheanlink_calendly_nonce' ); ?>

            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Your Calendly URL</th>
                    <td>
                        <input 
                            type="text" 
                            name="prometheanlink_calendly_url" 
                            value="<?php echo esc_attr( $stored_url ); ?>" 
                            placeholder="e.g. https://calendly.com/username/event-type"
                            size="50"
                        />
                        <p class="description">
                            Paste the direct link to your Calendly event type or profile.
                        </p>
                    </td>
                </tr>
            </table>

            <?php submit_button( 'Save Changes' ); ?>
        </form>
    </div>
    <?php
}

/**
 * 4) Enqueue Calendly's embed script on the front end (only if the shortcode is present)
 */
function prometheanlink_calendly_enqueue_scripts() {
    // This script is hosted by Calendly
    wp_enqueue_script(
        'calendly-widget', 
        'https://assets.calendly.com/assets/external/widget.js', 
        array(), 
        null, 
        true
    );
}
add_action( 'wp_enqueue_scripts', 'prometheanlink_calendly_enqueue_scripts' );

/**
 * 5) Create a shortcode [promethean_calendly] to output the embed
 */
function prometheanlink_calendly_shortcode( $atts ) {
    // Get the Calendly URL from the settings
    $calendly_url = get_option( 'prometheanlink_calendly_url', '' );
    if ( empty( $calendly_url ) ) {
        return '<p>Please configure your Calendly URL in Settings > Calendly Embed.</p>';
    }

    // Optional: handle width/height from shortcode attributes
    $atts = shortcode_atts( array(
        'width'  => '100%',
        'height' => '650',
    ), $atts, 'promethean_calendly' );
    
    // Calendly inline embed code
    // More info here: https://help.calendly.com/hc/en-us/articles/360020187734-Embedding-Calendly-on-your-website
    $embed_html = sprintf(
        '<div class="calendly-inline-widget" data-url="%1$s" style="min-width:320px; height:%2$dpx;"></div>',
        esc_url( $calendly_url ),
        esc_attr( $atts['height'] )
    );

    // Return the embed code
    return $embed_html;
}
add_shortcode( 'promethean_calendly', 'prometheanlink_calendly_shortcode' );
