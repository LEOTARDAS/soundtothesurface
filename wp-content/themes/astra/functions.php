<?php
/**
 * Astra functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Define Constants
 */
define( 'ASTRA_THEME_VERSION', '4.10.1' );
define( 'ASTRA_THEME_SETTINGS', 'astra-settings' );
define( 'ASTRA_THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'ASTRA_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );
define( 'ASTRA_THEME_ORG_VERSION', file_exists( ASTRA_THEME_DIR . 'inc/w-org-version.php' ) );

/**
 * Minimum Version requirement of the Astra Pro addon.
 * This constant will be used to display the notice asking user to update the Astra addon to the version defined below.
 */
define( 'ASTRA_EXT_MIN_VER', '4.10.0' );

/**
 * Load in-house compatibility.
 */
if ( ASTRA_THEME_ORG_VERSION ) {
	require_once ASTRA_THEME_DIR . 'inc/w-org-version.php';
}

/**
 * Setup helper functions of Astra.
 */
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-theme-options.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-theme-strings.php';
require_once ASTRA_THEME_DIR . 'inc/core/common-functions.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-icons.php';

define( 'ASTRA_WEBSITE_BASE_URL', 'https://wpastra.com' );

/**
 * ToDo: Deprecate constants in future versions as they are no longer used in the codebase.
 */
define( 'ASTRA_PRO_UPGRADE_URL', ASTRA_THEME_ORG_VERSION ? astra_get_pro_url( '/pricing/', 'free-theme', 'dashboard', 'upgrade' ) : 'https://woocommerce.com/products/astra-pro/' );
define( 'ASTRA_PRO_CUSTOMIZER_UPGRADE_URL', ASTRA_THEME_ORG_VERSION ? astra_get_pro_url( '/pricing/', 'free-theme', 'customizer', 'upgrade' ) : 'https://woocommerce.com/products/astra-pro/' );

/**
 * Update theme
 */
require_once ASTRA_THEME_DIR . 'inc/theme-update/astra-update-functions.php';
require_once ASTRA_THEME_DIR . 'inc/theme-update/class-astra-theme-background-updater.php';

/**
 * Fonts Files
 */
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-font-families.php';
if ( is_admin() ) {
	require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts-data.php';
}

require_once ASTRA_THEME_DIR . 'inc/lib/webfont/class-astra-webfont-loader.php';
require_once ASTRA_THEME_DIR . 'inc/lib/docs/class-astra-docs-loader.php';
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts.php';

require_once ASTRA_THEME_DIR . 'inc/dynamic-css/custom-menu-old-header.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/container-layouts.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/astra-icons.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-walker-page.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-enqueue-scripts.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-gutenberg-editor-css.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-wp-editor-css.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/block-editor-compatibility.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/inline-on-mobile.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/content-background.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/dark-mode.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-dynamic-css.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-global-palette.php';

// Enable NPS Survey only if the starter templates version is < 4.3.7 or > 4.4.4 to prevent fatal error.
if ( ! defined( 'ASTRA_SITES_VER' ) || version_compare( ASTRA_SITES_VER, '4.3.7', '<' ) || version_compare( ASTRA_SITES_VER, '4.4.4', '>' ) ) {
	// NPS Survey Integration
	require_once ASTRA_THEME_DIR . 'inc/lib/class-astra-nps-notice.php';
	require_once ASTRA_THEME_DIR . 'inc/lib/class-astra-nps-survey.php';
}

/**
 * Custom template tags for this theme.
 */
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-attr.php';
require_once ASTRA_THEME_DIR . 'inc/template-tags.php';

require_once ASTRA_THEME_DIR . 'inc/widgets.php';
require_once ASTRA_THEME_DIR . 'inc/core/theme-hooks.php';
require_once ASTRA_THEME_DIR . 'inc/admin-functions.php';
require_once ASTRA_THEME_DIR . 'inc/core/sidebar-manager.php';

/**
 * Markup Functions
 */
require_once ASTRA_THEME_DIR . 'inc/markup-extras.php';
require_once ASTRA_THEME_DIR . 'inc/extras.php';
require_once ASTRA_THEME_DIR . 'inc/blog/blog-config.php';
require_once ASTRA_THEME_DIR . 'inc/blog/blog.php';
require_once ASTRA_THEME_DIR . 'inc/blog/single-blog.php';

/**
 * Markup Files
 */
require_once ASTRA_THEME_DIR . 'inc/template-parts.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-loop.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-mobile-header.php';

/**
 * Functions and definitions.
 */
require_once ASTRA_THEME_DIR . 'inc/class-astra-after-setup-theme.php';

// Required files.
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-helper.php';

require_once ASTRA_THEME_DIR . 'inc/schema/class-astra-schema.php';

/* Setup API */
require_once ASTRA_THEME_DIR . 'admin/includes/class-astra-api-init.php';

if ( is_admin() ) {
	/**
	 * Admin Menu Settings
	 */
	require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-settings.php';
	require_once ASTRA_THEME_DIR . 'admin/class-astra-admin-loader.php';
	require_once ASTRA_THEME_DIR . 'inc/lib/astra-notices/class-astra-notices.php';
}

/**
 * Metabox additions.
 */
require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-boxes.php';

require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-box-operations.php';

/**
 * Customizer additions.
 */
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-customizer.php';

/**
 * Astra Modules.
 */
require_once ASTRA_THEME_DIR . 'inc/modules/posts-structures/class-astra-post-structures.php';
require_once ASTRA_THEME_DIR . 'inc/modules/related-posts/class-astra-related-posts.php';

/**
 * Compatibility
 */
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-gutenberg.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-jetpack.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/woocommerce/class-astra-woocommerce.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/edd/class-astra-edd.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/lifterlms/class-astra-lifterlms.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/learndash/class-astra-learndash.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-builder.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bb-ultimate-addon.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-contact-form-7.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-visual-composer.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-site-origin.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-gravity-forms.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bne-flyout.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-ubermeu.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-divi-builder.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-amp.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-yoast-seo.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/surecart/class-astra-surecart.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-starter-content.php';
require_once ASTRA_THEME_DIR . 'inc/addons/transparent-header/class-astra-ext-transparent-header.php';
require_once ASTRA_THEME_DIR . 'inc/addons/breadcrumbs/class-astra-breadcrumbs.php';
require_once ASTRA_THEME_DIR . 'inc/addons/scroll-to-top/class-astra-scroll-to-top.php';
require_once ASTRA_THEME_DIR . 'inc/addons/heading-colors/class-astra-heading-colors.php';
require_once ASTRA_THEME_DIR . 'inc/builder/class-astra-builder-loader.php';

// Elementor Compatibility requires PHP 5.4 for namespaces.
if ( version_compare( PHP_VERSION, '5.4', '>=' ) ) {
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor.php';
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor-pro.php';
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-web-stories.php';
}

// Beaver Themer compatibility requires PHP 5.3 for anonymous functions.
if ( version_compare( PHP_VERSION, '5.3', '>=' ) ) {
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-themer.php';
}

require_once ASTRA_THEME_DIR . 'inc/core/markup/class-astra-markup.php';

/**
 * Load deprecated functions
 */
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-filters.php';
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-hooks.php';
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-functions.php';

function astra_child_enqueue_styles() {
    wp_enqueue_style('astra-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'astra_child_enqueue_styles');

// 1. Registruojam žanrų taksonomiją (atskirai nuo CPT)
function register_sample_genre_taxonomy() {
    $labels = array(
        'name'              => 'Žanrai',
        'singular_name'     => 'Žanras',
        'search_items'      => 'Ieškoti žanrų',
        'all_items'         => 'Visi žanrai',
        'edit_item'         => 'Redaguoti žanrą',
        'update_item'       => 'Atnaujinti žanrą',
        'add_new_item'      => 'Pridėti naują žanrą',
        'new_item_name'     => 'Naujo žanro pavadinimas',
        'menu_name'         => 'Žanrai',
    );

    register_taxonomy('sample_genre', 'sample', array(
        'hierarchical'      => false,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'rewrite'           => array('slug' => 'genre'),
        'show_in_rest'      => true,
    ));
}
add_action('init', 'register_sample_genre_taxonomy');


// 2. Registruojam įrašų tipą "sample"
function create_sample_post_type() {
    $labels = array(
        'name' => _x('Samples', 'Post Type General Name', 'textdomain'),
        'singular_name' => _x('Sample', 'Post Type Singular Name', 'textdomain'),
        'menu_name' => __('Samples', 'textdomain'),
        'name_admin_bar' => __('Sample', 'textdomain'),
        'add_new_item' => __('Add New Sample', 'textdomain'),
        'edit_item' => __('Edit Sample', 'textdomain'),
        'new_item' => __('New Sample', 'textdomain'),
        'view_item' => __('View Sample', 'textdomain'),
        'all_items' => __('All Samples', 'textdomain'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'samples'),
        'supports' => array('title', 'editor', 'thumbnail', 'author', 'custom-fields', 'comments'),
        'menu_icon' => 'dashicons-format-audio',
        'show_in_rest' => true,
        'taxonomies' => array('sample_genre'), // susiejam CPT su taksonomija
        'capability_type' => 'post',
    );

    register_post_type('sample', $args);
}
add_action('init', 'create_sample_post_type');


// 3. Meta box pridėjimas
function add_sample_meta_boxes() {
    add_meta_box(
        'sample_audio_file',
        'Muzikos failas',
        'render_sample_audio_file_box',
        'sample',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'add_sample_meta_boxes');

function render_sample_audio_file_box($post) {
    $audio_file_url = get_post_meta($post->ID, '_sample_audio_file', true);
    echo '<label for="sample_audio_file">Audio failo URL:</label><br>';
    echo '<input type="text" id="sample_audio_file" name="sample_audio_file" value="' . esc_attr($audio_file_url) . '" size="80" />';
    echo '<p>Įrašyk pilną URL į failą (arba įkelk per Media Library ir įklijuok nuorodą).</p>';
}

function save_sample_audio_file($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;
    if (isset($_POST['sample_audio_file'])) {
        update_post_meta($post_id, '_sample_audio_file', sanitize_text_field($_POST['sample_audio_file']));
    }
}
add_action('save_post', 'save_sample_audio_file');


// 4. AJAX reitingų funkcija
function save_sample_rating() {
    $post_id = intval($_POST['post_id']);
    $rating = intval($_POST['rating']);
    $user_id = get_current_user_id();

    if ($post_id && $rating >= 1 && $rating <= 5 && $user_id) {
        $rated_users = get_post_meta($post_id, '_sample_rated_users', true);
        if (!is_array($rated_users)) {
            $rated_users = array();
        }

        $current_rating = get_post_meta($post_id, '_sample_rating', true);
        $current_votes = get_post_meta($post_id, '_sample_votes', true);

        if (isset($rated_users[$user_id])) {
            $current_rating -= intval($rated_users[$user_id]);
            $current_rating += $rating;
            $rated_users[$user_id] = $rating;
        } else {
            $current_rating += $rating;
            $current_votes += 1;
            $rated_users[$user_id] = $rating;
        }

        update_post_meta($post_id, '_sample_rating', $current_rating);
        update_post_meta($post_id, '_sample_votes', $current_votes);
        update_post_meta($post_id, '_sample_rated_users', $rated_users);

        echo 'Ačiū už įvertinimą!';
    }

    wp_die();
}
add_action('wp_ajax_save_sample_rating', 'save_sample_rating');
add_action('wp_ajax_nopriv_save_sample_rating', 'save_sample_rating');


// 5. Stilių įkėlimas
function enqueue_sample_rating_styles() {
    if (is_singular('sample')) {
        wp_enqueue_style('sample-rating-css', get_template_directory_uri() . '/css/sample-rating.css');
    }
}
add_action('wp_enqueue_scripts', 'enqueue_sample_rating_styles');

// Pridėti rating lauką prie komentarų formos
function add_rating_to_comment_form() {
    echo '<p class="comment-form-rating">
        <label for="rating">Įvertinimas (žvaigždutėmis) <span class="required">*</span></label>
        <select name="rating" id="rating" required>
            <option value="">Pasirinkite įvertinimą</option>
            <option value="5">★★★★★ - Puiku</option>
            <option value="4">★★★★☆ - Labai gerai</option>
            <option value="3">★★★☆☆ - Gerai</option>
            <option value="2">★★☆☆☆ - Vidutiniškai</option>
            <option value="1">★☆☆☆☆ - Prastai</option>
        </select>
    </p>';
}
add_action('comment_form_logged_in_after', 'add_rating_to_comment_form');
add_action('comment_form_after_fields', 'add_rating_to_comment_form');
add_filter('comment_form_defaults', 'customize_comment_form_texts');
function customize_comment_form_texts($defaults) {
    $user = wp_get_current_user();
    
    if ($user->exists()) {
        $defaults['logged_in_as'] = '';
    }
    
    return $defaults;
}
add_filter('comment_form_defaults', 'customize_comment_form_texts_lt');
function customize_comment_form_texts_lt($defaults) {
    $user = wp_get_current_user();

    // Komentarų formos tekstai
    $defaults['title_reply'] = 'Palikite komentarą';
    $defaults['label_submit'] = 'Pateikti komentarą';
    $defaults['comment_field'] = '<p class="comment-form-comment">
        <label for="comment">Komentaras *</label>
        <textarea id="comment" name="comment" cols="45" rows="8" required></textarea>
    </p>';

    return $defaults;
}
add_filter('gettext', 'translate_comment_buttons_lt', 20, 3);
function translate_comment_buttons_lt($translated_text, $text, $domain) {
    switch ($translated_text) {
        case 'Save':
            return 'Išsaugoti';
        case 'Cancel':
            return 'Atšaukti';
        case 'Delete':
            return 'Ištrinti';
        case 'Click to edit':
            return 'Spauskite norėdami redaguoti';
        case 'You have already left feedback on this sample.':
            return 'Jūs jau parašėte atsiliepimą prie šio fragmento.';
        default:
            return $translated_text;
    }
}

// Išsaugoti rating kai komentaras sukuriamas
function save_comment_rating($comment_id) {
    if (isset($_POST['rating']) && $_POST['rating'] != '') {
        $rating = intval($_POST['rating']);
        add_comment_meta($comment_id, 'rating', $rating);
    }
}
add_action('comment_post', 'save_comment_rating');

// Rodyti komentarą su žvaigždutėmis
function custom_comment_display($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    $rating = get_comment_meta(get_comment_ID(), 'rating', true);
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>" data-rating="<?php echo esc_attr($rating); ?>">
        <div id="comment-<?php comment_ID(); ?>" class="comment">
            <div class="comment-author vcard" style="margin-bottom: 10px;">
                <?php echo get_avatar($comment, 40); ?>
                <strong><?php comment_author_link(); ?></strong>
            </div>

            <div class="comment-meta commentmetadata" style="margin-bottom: 10px; color: #777;">
                <?php if ($rating): ?>
                    <div class="comment-rating" style="font-size: 20px; color: gold; margin-bottom: 10px;">
                        <?php for ($i = 1; $i <= 5; $i++) {
                            echo ($i <= $rating) ? '★' : '☆';
                        } ?>
                    </div>
                <?php endif; ?>
                <small><?php comment_date(); ?> <?php comment_time(); ?></small>
            </div>

            <div class="comment-text">
                <?php comment_text(); ?>
            </div>
        </div>
    </li>
    <?php
}
add_filter('simple_comment_editing_seconds', function() {
    return 315360000; // kadangi įskiepis ima laiką kada galima redaguoti komentarą - padaryta 10 metų
});

add_action('wp_footer', function() { // papildomai laikmatis išjungtas
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Paslepia laikmatį redagavimo lange
            document.querySelectorAll('.sce-timer').forEach(el => el.remove());
            document.querySelectorAll('.sce-seperator').forEach(el => el.remove());
        });
    </script>
    <?php
});

add_action('wp_footer', function () {
    if (!is_singular('sample')) return;

    ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('select[name="rating"]').forEach(function(select) {
            const commentForm = select.closest('li.comment, .comment');
            if (commentForm) {
                const rating = commentForm.getAttribute('data-rating');
                if (rating) {
                    select.value = rating;
                }
            }
        });
    });
    </script>
    <?php
});


add_filter('comment_edit_pre', function($comment_content) {
    if (is_admin()) return $comment_content;

    $comment_id = get_comment_ID();
    $rating = get_comment_meta($comment_id, 'rating', true);

    if ($rating) {
        // JavaScript pusėje surasime ir pažymėsime select laukelį
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            var select = document.querySelector('select[name=rating]');
            if (select) select.value = '" . esc_js($rating) . "';
        });
        </script>";
    }

    return $comment_content;
});

add_action('edit_comment', function($comment_id) {
    if (isset($_POST['rating'])) {
        update_comment_meta($comment_id, 'rating', intval($_POST['rating']));
    }
});

// 1. Pridedam AJAX palaikymą žvaigždučių įrašymui, kai komentaras redaguojamas
add_action('wp_ajax_sce_save_comment', function () {
    $comment_id = intval($_POST['comment_ID']);
    if (isset($_POST['rating'])) {
        update_comment_meta($comment_id, 'rating', intval($_POST['rating']));
    }
});

// 2. Įkeliam esamą žvaigždučių įvertinimą į redagavimo formą per JavaScript
add_action('wp_footer', function () {
    if (!is_singular('sample')) return;

    ?>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Ieško visų komentarų
        document.querySelectorAll('.comment').forEach(function(comment) {
            const commentID = comment.id.replace('comment-', '');
            const ratingEl = comment.querySelector('[data-rating]');
            const select = comment.querySelector('select[name="rating"]');
            if (ratingEl && select) {
                select.value = ratingEl.dataset.rating;
            }
        });
    });
    </script>
    <?php
});

// Padidinti parsisiuntimų skaičių per AJAX
add_action('wp_ajax_sample_download', 'increment_sample_downloads');
add_action('wp_ajax_nopriv_sample_download', 'increment_sample_downloads');

function increment_sample_downloads() {
    $post_id = intval($_POST['post_id']);
    if ($post_id) {
        $count = get_post_meta($post_id, '_sample_downloads', true);
        $count = $count ? intval($count) + 1 : 1;
        update_post_meta($post_id, '_sample_downloads', $count);
        echo $count;
    }
    wp_die();
}

function render_profile_edit_form() {
    if (!is_user_logged_in()) {
        return '<p>Turite būti prisijungęs, kad galėtumėte redaguoti savo profilį.</p>';
    }

    $user_id = get_current_user_id();
    $user_info = get_userdata($user_id);

    ob_start();
    ?>
    <form id="profile-edit-form" method="post" enctype="multipart/form-data" style="max-width:500px; margin: 20px auto; background: #f7f7f7; padding: 30px; border-radius: 10px;">
        <h2>Redaguoti profilį</h2>

        <p>
            <label>Vardas</label><br>
            <input type="text" name="first_name" value="<?php echo esc_attr($user_info->first_name); ?>">
        </p>

        <p>
            <label>Pavardė</label><br>
            <input type="text" name="last_name" value="<?php echo esc_attr($user_info->last_name); ?>">
        </p>

        <p>
            <label>Aprašymas apie save</label><br>
            <textarea name="description" rows="5"><?php echo esc_attr(get_the_author_meta('description', $user_id)); ?></textarea>
        </p>

        <p>
            <label>Profilio nuotrauka (avataras)</label><br>
            <input type="file" name="profile_picture">
        </p>

        <p>
            <input type="submit" name="update_profile" value="Išsaugoti" style="background: #0073aa; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor:pointer;">
        </p>
    </form>
    <?php
    return ob_get_clean();
}
add_shortcode('redaguoti_profili', 'render_profile_edit_form');

// Apdoroti profilio redagavimo formą
function handle_profile_edit_form() {
    if (!is_user_logged_in() || !isset($_POST['update_profile'])) {
        return;
    }

    $user_id = get_current_user_id();

        // Atnaujinam tik jei pateiktas laukas ir jis ne tuščias
        if (isset($_POST['first_name']) && $_POST['first_name'] !== '') {
            update_user_meta($user_id, 'first_name', sanitize_text_field($_POST['first_name']));
        }

        if (isset($_POST['last_name'])) {
            $last_name = sanitize_text_field($_POST['last_name']);
            if ($last_name === '') {
                delete_user_meta($user_id, 'last_name');
            } else {
                wp_update_user(array(
                    'ID' => $user_id,
                    'last_name' => $last_name
                ));
            }
        }
        

        if (isset($_POST['description'])) {
            $description = sanitize_text_field($_POST['description']);
            if ($description === '') {
                delete_user_meta($user_id, 'description');
            } else {
                update_user_meta($user_id, 'description', $description);
            }
        }


    // Profilio nuotrauka
    if (!empty($_FILES['profile_picture']['tmp_name'])) {
        require_once(ABSPATH . 'wp-admin/includes/file.php');
        require_once(ABSPATH . 'wp-admin/includes/image.php');

        $file = $_FILES['profile_picture'];
        $upload = wp_handle_upload($file, array('test_form' => false));

        if (!isset($upload['error'])) {
            $attachment = array(
                'post_mime_type' => $upload['type'],
                'post_title'     => sanitize_file_name($upload['file']),
                'post_content'   => '',
                'post_status'    => 'inherit'
            );
            $attachment_id = wp_insert_attachment($attachment, $upload['file']);
            require_once(ABSPATH . 'wp-admin/includes/image.php');
            $attach_data = wp_generate_attachment_metadata($attachment_id, $upload['file']);
            wp_update_attachment_metadata($attachment_id, $attach_data);

            update_user_meta($user_id, 'profile_picture', $attachment_id);
        }
    }

    wp_redirect(get_author_posts_url($user_id));
    exit;

}
add_action('template_redirect', 'handle_profile_edit_form');

function custom_frontpage_styles() {
    if (is_front_page()) {
        wp_enqueue_style('custom-front-style', get_template_directory_uri() . '/css/front-page.css');
    }
}
add_action('wp_enqueue_scripts', 'custom_frontpage_styles');

function allow_audio_file_types($mime_types) {
    $mime_types['wav'] = 'audio/wav';
    $mime_types['mp3'] = 'audio/mpeg';
    return $mime_types;
}
add_filter('upload_mimes', 'allow_audio_file_types');

add_filter('show_admin_bar', function() {
    return current_user_can('administrator');
});

add_action('wp_ajax_filter_samples_by_genre', 'filter_samples_by_genre');
add_action('wp_ajax_nopriv_filter_samples_by_genre', 'filter_samples_by_genre');

function filter_samples_by_genre() {
    $genre = isset($_POST['genre']) ? sanitize_text_field($_POST['genre']) : '';

    $args = [
        'post_type' => 'sample',
        'posts_per_page' => -1,
    ];

    if (!empty($genre)) {
        $args['tax_query'] = [[
            'taxonomy' => 'sample_genre',
            'field' => 'slug',
            'terms' => $genre
        ]];
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            $audio_url = get_post_meta(get_the_ID(), '_sample_audio_file', true);
            ?>
            <div class="sample-card">
                <a href="<?php the_permalink(); ?>">
                    <div class="sample-image-placeholder">
                        <?php
                        $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                        if ($thumbnail_url) {
                            echo '<img src="' . esc_url($thumbnail_url) . '" alt="Fragmento paveikslėlis">';
                        } else {
                            echo '<div class="sample-default-image"><span>🎵</span></div>';
                        }
                        ?>
                    </div>
                </a>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <?php if ($audio_url): ?>
                    <audio controls>
                        <source src="<?php echo esc_url($audio_url); ?>" type="audio/mpeg">
                    </audio>
                <?php endif; ?>
            </div>
            <?php
        endwhile;
        wp_reset_postdata();
    else :
        echo '<p>Nėra fragmentų šiam žanrui.</p>';
    endif;

    wp_die();
}
function include_custom_style_for_edit_fragment() {
    if (is_page('redaguoti-fragmenta')) {
        wp_enqueue_style('custom-style', get_stylesheet_uri()); // tai yra style.css
    }
}
add_action('wp_enqueue_scripts', 'include_custom_style_for_edit_fragment');



function handle_sample_update_redirect() {
    if (
        is_page('redaguoti-fragmenta') &&
        isset($_POST['edit_sample_nonce']) &&
        wp_verify_nonce($_POST['edit_sample_nonce'], 'edit_sample') &&
        isset($_GET['fragment_id'])
    ) {
        $fragment_id = intval($_GET['fragment_id']);
        $post = get_post($fragment_id);

        if (
            $post &&
            $post->post_type === 'sample' &&
            $post->post_author == get_current_user_id()
        ) {
            $new_title = sanitize_text_field($_POST['sample_title']);
            $new_content = sanitize_textarea_field($_POST['sample_description']);
            $new_genre = intval($_POST['sample_genre']);

            wp_update_post([
                'ID' => $fragment_id,
                'post_title' => $new_title,
                'post_content' => $new_content
            ]);

            wp_set_post_terms($fragment_id, [$new_genre], 'sample_genre', false);

            wp_redirect(get_author_posts_url(get_current_user_id()));
            exit;
        }
    }
}
add_action('template_redirect', 'handle_sample_update_redirect');

function redaguoti_fragmenta_shortcode() {
    if (!is_user_logged_in()) {
        return '<p>Turite būti prisijungęs, kad galėtumėte redaguoti fragmentą.</p>';
    }

    if (!isset($_GET['fragment_id']) || !get_post($_GET['fragment_id'])) {
        return '<p>Nurodytas fragmentas nerastas.</p>';
    }

    $fragment_id = intval($_GET['fragment_id']);
    $post = get_post($fragment_id);

    if ($post->post_type !== 'sample') {
        return '<p>Netinkamas fragmentas.</p>';
    }

    if ($post->post_author != get_current_user_id()) {
        return '<p>Neturite teisės redaguoti šio fragmento.</p>';
    }

    $current_title = esc_attr($post->post_title);
    $current_content = esc_textarea($post->post_content);
    $current_terms = wp_get_post_terms($fragment_id, 'sample_genre');
    $current_term_id = $current_terms && !is_wp_error($current_terms) ? $current_terms[0]->term_id : 0;

    ob_start(); ?>
     <h2 style="text-align: center; margin-top: 40px;">Fragmento redagavimas</h2>
    <form method="post" style="display:flex; flex-direction:column; gap:15px; max-width:600px; margin:30px auto;">
        <?php wp_nonce_field('edit_sample', 'edit_sample_nonce'); ?>

        <label>Pavadinimas</label>
        <input type="text" name="sample_title" value="<?php echo $current_title; ?>" required>

        <label>Aprašymas</label>
        <textarea name="sample_description" rows="5"><?php echo $current_content; ?></textarea>

        <label>Žanras</label>
        <select name="sample_genre">
            <option value="">– Pasirinkite žanrą –</option>
            <?php
            $genres = get_terms([
                'taxonomy' => 'sample_genre',
                'hide_empty' => false
            ]);
            foreach ($genres as $genre) {
                echo '<option value="' . esc_attr($genre->term_id) . '" ' . selected($current_term_id, $genre->term_id, false) . '>' . esc_html($genre->name) . '</option>';
            }
            ?>
        </select>

        <input type="submit" name="update_sample" value="Išsaugoti" style="background: #0073aa; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor:pointer;">
    </form>
    <?php
    return ob_get_clean();
}
add_shortcode('redaguoti_fragmenta', 'redaguoti_fragmenta_shortcode');
add_action('wp_footer', function () {
    if (!is_singular('sample')) return;
    ?>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const ratingLabels = document.querySelectorAll('.comment-form-rating label');

        ratingLabels.forEach(function (label) {
            const next = label.nextSibling;

            // Pašalina viską tarp <label> ir <select> jeigu tai tekstinis mazgas
            if (next && next.nodeType === Node.TEXT_NODE && next.textContent.trim().match(/^\d+$/)) {
                next.remove();
            }

            // Papildomai pašalina span'us jei yra (jei įskiepis tokius kuria)
            const spans = label.parentElement.querySelectorAll('span');
            spans.forEach(span => span.remove());
        });
    });
    </script>
    <?php
});
add_filter('comment_edit_pre', function($content) {
    if (is_singular('sample')) {
        return $content . '<p style="color:red; font-weight:bold;">(Įvertinimai negali būti redaguojami)</p>';
    }
    return $content;
});

add_filter('comment_edit_allowed', function($allowed, $comment) {
    if (is_singular('sample')) {
        return false;
    }
    return $allowed;
}, 10, 2);