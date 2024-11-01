<?php
/**
 * Show notices in the wordpress UI.
 *
 * @package traumaradar
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_action('admin_notices', 'traumardr_admin_notice');

function traumardr_admin_notice() {
    // Controleer of de gebruiker de juiste rechten heeft
    if (!current_user_can('manage_options')) {
        return;
    }

    // Controleer of de notice al is gedismissed
    if (get_user_meta(get_current_user_id(), 'traumardr_settings_notice_dismissed', true)) {
        return;
    }

    ?>
    <div class="notice notice-info is-dismissible traumardr-notice">
        <p>
            TraumaRadar widget en shortcode gebruiken? Ga naar de <a href="<?php echo esc_url(admin_url('admin.php?page=traumaradar-settings')); ?>">instructiepagina</a> (WordPress Menu > TraumaRadar) om de plugin te configureren.
        </p>
    </div>
    <?php
}

// Voeg JavaScript toe om de notice weg te kunnen klikken
add_action('admin_enqueue_scripts', 'traumardr_admin_notice_script');

function traumardr_admin_notice_script() {
    ?>
    <script type="text/javascript">
       document.addEventListener('DOMContentLoaded', function() {
            jQuery(document).ready(function($) {
                $('.traumardr-notice').on('click', '.notice-dismiss', function() {
                    var ajaxurl = '<?php echo esc_url_raw(admin_url('admin-ajax.php')); ?>';
                    $.post(ajaxurl, {
                        action: 'traumardr_dismiss_notice'
                    });
                    $(this).closest('.notice').remove();
                });
            });
       });
    </script>
    <?php
}

// AJAX-handler om de status van de notice op te slaan
add_action('wp_ajax_traumardr_dismiss_notice', 'traumardr_dismiss_notice');

function traumardr_dismiss_notice() {
    update_user_meta(get_current_user_id(), 'traumardr_settings_notice_dismissed', true);
    wp_die();
}
