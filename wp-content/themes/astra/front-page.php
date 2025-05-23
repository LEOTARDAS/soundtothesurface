<?php
get_template_part('header', 'home');
?>

<div class="hero-header">
    <div class="overlay">
        <h1>Tavo įkvėpimo biblioteka</h1>
        <div class="search-bar">
            <form method="get" action="<?php echo home_url(); ?>">
                <input type="search" name="s" placeholder="Ieškok pavyzdžiui: 808 kick">
                <input type="hidden" name="post_type" value="sample">
            </form>

            <form method="get" action="<?php echo home_url('/'); ?>#sample-results" class="sample-filter-form">
                <select name="sample_genre" onchange="if(this.value) this.form.submit();">
                    <option value="">Ieškoti pagal žanrą</option>
                    <?php
                    $terms = get_terms(['taxonomy' => 'sample_genre', 'hide_empty' => false]);
                    foreach ($terms as $term) {
                        echo '<option value="' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</option>';
                    }
                    ?>
                </select>
                <input type="hidden" name="post_type" value="sample">
            </form>
        </div>
    </div>
</div>

<div id="content" class="site-content">
    <!-- Reklamuojami fragmentai -->
    <div class="promoted-section">
        <h2 class="section-title">Reklamuojami fragmentai</h2>
        <div class="sample-list-grid">
            <?php
            $promoted_query = new WP_Query([
                'post_type' => 'sample',
                'meta_key' => '_promoted_until',
                'meta_value' => current_time('Y-m-d H:i:s'),
                'meta_compare' => '>=',
                'posts_per_page' => 6,
            ]);

            if ($promoted_query->have_posts()) :
                while ($promoted_query->have_posts()) : $promoted_query->the_post();
                    $audio_url = get_post_meta(get_the_ID(), '_sample_audio_file', true);
                    ?>
                    <div class="sample-card">
                        <a href="<?php the_permalink(); ?>">
                            <div class="sample-image-placeholder">
                                <?php
                                $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                                if ($thumbnail_url) {
                                    echo '<img src="' . esc_url($thumbnail_url) . '" class="sample-image">';
                                } else {
                                    echo '<div class="sample-default-image">';
                                    echo '<span style="font-size:60px;">🎵</span>';
                                    echo '</div>';
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
                echo '<p style="text-align:center;">Šiuo metu nėra reklamuojamų fragmentų.</p>';
            endif;
            ?>
        </div>
        <div class="view-all-wrapper">
            <a href="<?php echo home_url('/reklamuojami-fragmentai'); ?>" class="view-all-button">Visi reklamuojami fragmentai</a>
        </div>
    </div>

    <!-- Naujienos -->
    <div class="sample-section">
        <h2 class="section-title">Naujienos</h2>
        <div class="sample-list-grid">
            <?php
            $tax_query = [];

            if (!empty($_GET['sample_genre'])) {
                $tax_query[] = [
                    'taxonomy' => 'sample_genre',
                    'field' => 'slug',
                    'terms' => sanitize_text_field($_GET['sample_genre']),
                ];
            }

            $args = [
                'post_type' => 'sample',
                'posts_per_page' => 9,
                'tax_query' => $tax_query,
            ];

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
                                    echo '<img src="' . esc_url($thumbnail_url) . '" class="sample-image">';
                                } else {
                                    echo '<div class="sample-default-image">';
                                    echo '<span style="font-size:60px;">🎵</span>';
                                    echo '</div>';
                                }
                                ?>
                            </div>
                        </a>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p><?php echo esc_html(get_the_excerpt()); ?></p>
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
                echo '<p>Fragmentų dar nėra.</p>';
            endif;
            ?>
        </div>
        <div class="view-all-wrapper">
            <a href="<?php echo get_post_type_archive_link('sample'); ?>" class="view-all-button">Žiūrėti visus fragmentus</a>
        </div>
    </div>
</div>

<?php get_footer(); ?>
