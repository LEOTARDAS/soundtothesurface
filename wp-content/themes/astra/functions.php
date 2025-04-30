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

//** Pridėjimas Sample (Fragmento) įrašų tipą
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
        'capability_type' => 'post',
    );

    register_post_type('sample', $args);

	function add_sample_meta_boxes() {
		add_meta_box(
			'sample_audio_file',             // Meta box ID
			'Muzikos failas',                 // Meta box pavadinimas
			'render_sample_audio_file_box',   // Funkcija, kuri atvaizduos turinį
			'sample',                         // Post tipo pavadinimas (mūsų CPT)
			'normal',                         // Rodymo vieta
			'default'                         // Prioritetas
		);
	}
	add_action('add_meta_boxes', 'add_sample_meta_boxes');
	
	// Meta box formos turinys
	function render_sample_audio_file_box($post) {
		// Paimam saugotą reikšmę, jei jau yra
		$audio_file_url = get_post_meta($post->ID, '_sample_audio_file', true);
	
		// HTML laukas
		echo '<label for="sample_audio_file">Audio failo URL:</label><br>';
		echo '<input type="text" id="sample_audio_file" name="sample_audio_file" value="' . esc_attr($audio_file_url) . '" size="80" />';
		echo '<p>Įrašyk pilną URL į failą (arba įkelk per Media Library ir įklijuok nuorodą).</p>';
	}
	
	// Išsaugoti meta box duomenis
	function save_sample_audio_file($post_id) {
		// Ar tai automatinis saugojimas?
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
	
		// Ar vartotojas turi teisę redaguoti įrašą?
		if (!current_user_can('edit_post', $post_id)) return;
	
		// Ar yra įrašytas laukelis?
		if (isset($_POST['sample_audio_file'])) {
			update_post_meta($post_id, '_sample_audio_file', sanitize_text_field($_POST['sample_audio_file']));
		}
	}
	add_action('save_post', 'save_sample_audio_file');

// Ajax funkcija su galimybe perbalsuoti
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
            // Vartotojas jau balsavo anksčiau - atnaujinam vertinimą

            // Pirmiausia atimam seną reitingą
            $current_rating -= intval($rated_users[$user_id]);

            // Paskui pridedam naują
            $current_rating += $rating;

            $rated_users[$user_id] = $rating; // Atnaujinam jo vertinimą

        } else {
            // Pirmas balsavimas
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

function enqueue_sample_rating_styles() {
    if (is_singular('sample')) { // Tik kai atidarytas Sample įrašas
        wp_enqueue_style('sample-rating-css', get_template_directory_uri() . '/css/sample-rating.css');
    }
}
add_action('wp_enqueue_scripts', 'enqueue_sample_rating_styles');

}
add_action('init', 'create_sample_post_type');

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
    document.querySelectorAll('select[name="rating"]').forEach(function(select) {
    const commentForm = select.closest('li.comment, .comment'); // Ieškome artimiausio komentaro
    if (commentForm) {
        const rating = commentForm.getAttribute('data-rating');
        if (rating) {
            select.value = rating;
        }
    }
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

if (isset($_POST['password'])) {
    $password = $_POST['password'];

    $strongEnough = strlen($password) >= 8 &&
                    preg_match('/[A-Z]/', $password) &&
                    preg_match('/[a-z]/', $password) &&
                    preg_match('/[0-9]/', $password);

    if (!$strongEnough) {
        $errors[] = 'Slaptažodis per silpnas. Jis turi būti bent 8 simbolių ilgio, turėti didžiųjų ir mažųjų raidžių bei bent vieną skaičių.';
    }
}