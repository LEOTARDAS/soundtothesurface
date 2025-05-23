<?php
get_header();
$author = get_queried_object();
?>

<div class="author-profile-wrapper">
    <div class="profile-box">
        <div class="author-top">
            <?php
                $profile_picture_id = get_user_meta($author->ID, 'profile_picture', true);
                if ($profile_picture_id) {
                    echo wp_get_attachment_image($profile_picture_id, 'thumbnail', false, array('class' => 'author-avatar'));
                } else {
                    echo get_avatar($author->ID, 96, '', '', array('class' => 'author-avatar'));
                }
            ?>
            <div class="author-meta">
                <h1>
                    <?php
                    $first = get_user_meta($author->ID, 'first_name', true);
                    $last  = get_user_meta($author->ID, 'last_name', true);
                    echo esc_html(trim($first . ' ' . $last)) ?: esc_html($author->display_name);
                    ?>
                </h1>
                <?php if (get_current_user_id() === $author->ID) : ?>
                    <a href="<?php echo esc_url(site_url('/redaguoti-profili/')); ?>" class="profile-edit-btn">Redaguoti profilį</a>
                    <a href="<?php echo esc_url(wp_logout_url(home_url())); ?>" class="profile-logout-btn">Atsijungti</a>
                <?php endif; ?>
            </div>
        </div>
        <p><strong>Aprašymas:</strong> <?php echo esc_html(get_the_author_meta('description', $author->ID)); ?></p>
    </div>

    <div class="author-samples">
        <h2 style="text-align: center;">Įkelti fragmentai:</h2>
        <div class="author-samples-grid">
            <?php
            $args = array(
                'post_type' => 'sample',
                'posts_per_page' => -1,
                'author' => $author->ID,
            );
            $samples = new WP_Query($args);

            if ($samples->have_posts()) :
                while ($samples->have_posts()) : $samples->the_post();
                    $audio_url = get_post_meta(get_the_ID(), '_sample_audio_file', true);
                    $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                    if (!$thumbnail_url) {
                        $thumbnail_url = wp_get_attachment_url(64); // numatytoji miniatiūra
                    }
                    ?>
                    <div class="sample-card">
                        <a href="<?php the_permalink(); ?>">
                            <div class="sample-image-placeholder">
                                <img src="<?php echo esc_url($thumbnail_url); ?>" alt="Fragmento paveikslėlis" class="sample-image">
                            </div>
                        </a>

                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                        <?php if ($audio_url): ?>
                            <audio controls controlsList="nodownload">
                                <source src="<?php echo esc_url($audio_url); ?>" type="audio/mpeg">
                                Jūsų naršyklė nepalaiko audio grotuvo.
                            </audio>
                        <?php endif; ?>

                        <?php if (get_current_user_id() === get_the_author_meta('ID')) : ?>
                            <a href="<?php echo esc_url(site_url('/redaguoti-fragmenta/?fragment_id=' . get_the_ID())); ?>" class="profile-edit-btn" style="margin-top:10px;">Redaguoti</a>
                        <?php endif; ?>
                        <?php if (get_current_user_id() === get_the_author_meta('ID')) : ?>
    <a href="<?php echo esc_url(site_url('/reklamuoti-fragmenta/?fragment_id=' . get_the_ID())); ?>" 
       class="profile-edit-btn" 
       style="margin-top:10px; display:inline-block; background:#FFA500;">
        Reklamuoti
    </a>
<?php endif; ?>

                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>Šis vartotojas dar neįkėlė jokių fragmentų.</p>';
            endif;
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
