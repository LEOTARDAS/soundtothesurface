<?php
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            Atsiliepimai
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style' => 'ol',
                'short_ping' => true,
                'avatar_size' => 50,
                'callback' => 'custom_comment_display', // <- mūsų specialus komentaro atvaizdavimas su žvaigždutėm
            ));
            ?>
        </ol>

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
            <nav class="comment-navigation" role="navigation">
                <div class="nav-previous"><?php previous_comments_link('&larr; Ankstesni komentarai'); ?></div>
                <div class="nav-next"><?php next_comments_link('Naujesni komentarai &rarr;'); ?></div>
            </nav>
        <?php endif; ?>

    <?php endif; ?>

    <?php
    // Jei komentarai uždaryti ir jau yra komentarų
    if (!comments_open() && get_comments_number()) :
    ?>
        <p class="no-comments">Komentarai uždaryti.</p>
    <?php endif; ?>

    <?php
    // Komentarų forma
    comment_form();
    ?>

</div><!-- #comments -->
