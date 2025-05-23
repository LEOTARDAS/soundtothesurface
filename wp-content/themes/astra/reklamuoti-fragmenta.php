<?php
/* Template Name: Reklamuoti Fragmentą */
get_header();

if (!is_user_logged_in()) {
    echo '<div class="ast-container"><p>Turite būti prisijungęs, kad galėtumėte reklamuoti.</p></div>';
    get_footer(); exit;
}

$fragment_id = isset($_GET['fragment_id']) ? intval($_GET['fragment_id']) : 0;
$post = get_post($fragment_id);

if (!$post || $post->post_type !== 'sample' || $post->post_author != get_current_user_id()) {
    echo '<div class="ast-container"><p>Neleistinas veiksmas arba fragmentas nerastas.</p></div>';
    get_footer(); exit;
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['promo_nonce']) && wp_verify_nonce($_POST['promo_nonce'], 'promo_action')) {
    $amount = floatval($_POST['amount']);

    if ($amount == 5) {
        // Žymime fragmentą kaip reklamuojamą
        update_post_meta($fragment_id, '_promoted_until', strtotime('+7 days'));

        $message = '<p style="color:green; margin-top:20px;"><strong>Fragmentas bus reklamuojamas 7 dienas!</strong></p>';
    } else {
        $message = '<p style="color:red; margin-top:20px;"><strong>Reklamos kaina yra tiksliai 5€.</strong></p>';
    }
}
?>

<div class="ast-container">
    <div class="support-form" style="max-width:500px; margin: 30px auto; padding:30px; background: #f7f7f7; border-radius: 12px;">
        <h2>Reklamuoti fragmentą: <?php echo esc_html(get_the_title($fragment_id)); ?></h2>

        <p>Fragmentas bus reklamuojamas savaitę nuo apmokėjimo.</p>

        <form method="post">
            <?php wp_nonce_field('promo_action', 'promo_nonce'); ?>
            <p>
                <label>Suma (€):</label><br>
                <input type="number" name="amount" value="5" min="5" max="5" step="0.01" readonly>
            </p>
            <p>
                <input type="submit" value="Reklamuoti" style="background: #0073aa; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor:pointer;">
            </p>
        </form>

        <?php echo $message; ?>
    </div>
</div>

<?php get_footer(); ?>
