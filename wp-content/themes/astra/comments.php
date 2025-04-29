<?php
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if (have_comments()) : ?>
        <h2 class="comments-title">Atsiliepimai</h2>

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
$user_id = get_current_user_id();
$has_commented = false;

if ($user_id) {
    $existing_comments = get_comments([
        'post_id' => get_the_ID(),
        'user_id' => $user_id,
        'count' => true,
    ]);

    if ($existing_comments > 0) {
        $has_commented = true;
    }
}
?>


<?php
$user_id = get_current_user_id();
$has_commented = false;

if ($user_id) {
    $existing_comments = get_comments([
        'post_id' => get_the_ID(),
        'user_id' => $user_id,
        'count' => true,
    ]);

    if ($existing_comments > 0) {
        $has_commented = true;
    }
}
?>

<?php if (!$has_commented) : ?>
    <?php comment_form(); ?>
<?php else : ?>
    <p class="already-commented" style="font-style: italic; color: #555;">
        Jūs jau parašėte atsiliepimą prie šio fragmento.
    </p>
<?php endif; ?>

</div><!-- #comments -->
