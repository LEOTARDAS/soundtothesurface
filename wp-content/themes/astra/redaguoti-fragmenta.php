<?php
/* Template Name: Redaguoti Fragmentą */
get_header();
?>

<div class="ast-container" style="padding: 30px 0;">
    <div class="profile-edit-wrapper" style="max-width:600px; margin: 0 auto; background:#f9f9f9; padding:30px; border-radius:10px;">
        <?php
        if (function_exists('do_shortcode')) {
            echo do_shortcode('[redaguoti_fragmenta]');
        }
        ?>
    </div>
</div>

<?php get_footer(); ?>
