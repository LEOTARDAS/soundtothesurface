<?php
/* Template Name: Įkelti fragmentą */

if (!is_user_logged_in()) {
    wp_redirect(wp_login_url());
    exit;
}

require_once(ABSPATH . 'wp-admin/includes/file.php');
require_once(ABSPATH . 'wp-admin/includes/media.php');
require_once(ABSPATH . 'wp-admin/includes/image.php');

$current_user = wp_get_current_user();
$default_thumbnail_id = 1; // Nustatyk šį ID per Media Library

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_sample'])) {
    check_admin_referer('submit_sample_form', 'submit_sample_nonce');

    $title = sanitize_text_field($_POST['title']);
    $description = sanitize_textarea_field($_POST['description']);
    $genre = isset($_POST['genre']) ? intval($_POST['genre']) : null;

    // 1. Sukuriam įrašą
    $post_id = wp_insert_post([
        'post_title'   => $title,
        'post_content' => $description,
        'post_type'    => 'sample',
        'post_status'  => 'publish',
        'post_author'  => $current_user->ID,
    ]);

    if ($post_id && !is_wp_error($post_id)) {

        // 2. Priskiriame žanrą, jei yra
        if ($genre) {
            wp_set_object_terms($post_id, [$genre], 'sample_genre');
        }

        // 3. Įkeliame garso failą ir saugome URL į _sample_audio_file
        if (!empty($_FILES['audio_file']['name'])) {
            $file = $_FILES['audio_file'];

            $upload = wp_handle_upload($file, array('test_form' => false));

            if (isset($upload['url']) && isset($upload['file'])) {
                // Sukuriam media įrašą rankiniu būdu
                $attachment = array(
                    'post_mime_type' => $upload['type'],
                    'post_title'     => sanitize_file_name($file['name']),
                    'post_content'   => '',
                    'post_status'    => 'inherit'
                );

                $audio_id = wp_insert_attachment($attachment, $upload['file'], $post_id);

                require_once(ABSPATH . 'wp-admin/includes/image.php');
                $attach_data = wp_generate_attachment_metadata($audio_id, $upload['file']);
                wp_update_attachment_metadata($audio_id, $attach_data);

                // Įrašom URL į LAUKĄ, kuris rodomas WP UI: _sample_audio_file
                update_post_meta($post_id, '_sample_audio_file', $upload['url']);
            } else {
                $error = 'Klaida įkeliant garso failą: ' . $upload['error'];
            }
        } else {
            $error = 'Garso failas yra privalomas.';
        }

        // 4. Miniatiūra – pasirenkama arba bazinė
        if (!empty($_FILES['thumbnail']['name'])) {
            $thumb_id = media_handle_upload('thumbnail', $post_id);
            if (!is_wp_error($thumb_id)) {
                set_post_thumbnail($post_id, $thumb_id);
            }
        } else {
            set_post_thumbnail($post_id, $default_thumbnail_id);
        }

        // 5. Jei viskas tvarkoje – peradresuojam
        if (empty($error)) {
            wp_redirect(get_permalink($post_id));
            exit;
        }
    } else {
        $error = 'Nepavyko sukurti įrašo.';
    }
}
?>

<?php get_header(); ?>

<div class="upload-wrapper">
    <h2>Įkelti muzikos fragmentą</h2>

    <?php if (!empty($error)) : ?>
        <p style="color:red;"><?php echo esc_html($error); ?></p>
    <?php endif; ?>

    <form class="sample-upload-form" method="post" enctype="multipart/form-data">
        <?php wp_nonce_field('submit_sample_form', 'submit_sample_nonce'); ?>

        <div class="form-group">
            <label>Pavadinimas*</label>
            <input type="text" name="title" required>
        </div>

        <div class="form-group">
            <label>Aprašymas</label>
            <textarea name="description"></textarea>
        </div>

        <div class="form-group">
            <label>Garso failas (.mp3, .wav)*</label>
            <input type="file" name="audio_file" accept="audio/*" required>
        </div>

        <div class="form-group">
            <label>Miniatiūra (pasirinktinai)</label>
            <input type="file" name="thumbnail" accept="image/*" onchange="previewThumbnail(this)">
            <img id="thumbnail-preview" style="max-width: 300px; display: none; margin-top: 10px; border-radius: 10px;">
        </div>

        <div class="form-group full">
            <label>Žanras (pasirinktinai)</label>
            <?php
            wp_dropdown_categories([
                'taxonomy' => 'sample_genre',
                'name'     => 'genre',
                'show_option_none' => '– Pasirinkite žanrą –',
                'hide_empty' => false,
            ]);
            ?>
        </div>

        <div class="form-group full">
            <input type="submit" name="submit_sample" value="Įkelti fragmentą">
        </div>
    </form>
</div>

<script>
function previewThumbnail(input) {
    const preview = document.getElementById('thumbnail-preview');
    const file = input.files[0];

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(file);
    } else {
        preview.src = '';
        preview.style.display = 'none';
    }
}
</script>

<?php get_footer(); ?>