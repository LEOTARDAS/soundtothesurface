<?php
/* Template Name: Remti Autorių */
get_header();

// Tik prisijungusiems vartotojams
if (!is_user_logged_in()) {
    echo '<div class="ast-container"><p>Turite būti prisijungęs, kad galėtumėte remti autorių.</p></div>';
    get_footer();
    exit;
}

// Gauti remiamo vartotojo ID
$receiver_id = isset($_GET['user_id']) ? intval($_GET['user_id']) : 0;
$receiver = get_userdata($receiver_id);

if (!$receiver) {
    echo '<div class="ast-container"><p>Autorius nerastas.</p></div>';
    get_footer();
    exit;
}

// Formos apdorojimas
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['support_nonce']) && wp_verify_nonce($_POST['support_nonce'], 'support_action')) {
    $amount = floatval($_POST['amount']);
    $note = sanitize_textarea_field($_POST['message']);

    if ($amount >= 5) {
        // Šiuo metu tik simuliacija – čia gali būti Stripe, el. laiško siuntimas ar duomenų bazė
        $message = '<p style="color:green; margin-top:20px;"><strong>Ačiū! Jūsų parama išsiųsta.</strong></p>';
    } else {
        $message = '<p style="color:red; margin-top:20px;"><strong>Minimali paramos suma yra 5€.</strong></p>';
    }
}
?>

<div class="ast-container">
    <div class="support-form" style="max-width:500px; margin: 30px auto; padding:30px; background: #f7f7f7; border-radius: 12px;">
        <h2>Remti autorių: <?php echo esc_html($receiver->display_name); ?></h2>

        <form method="post">
            <?php wp_nonce_field('support_action', 'support_nonce'); ?>
            <p>
                <label for="amount">Suma (€):</label><br>
                <input type="number" name="amount" min="5" step="1" required>
            </p>
            <p>
                <label for="message">Žinutė (pasirinktinai):</label><br>
                <textarea name="message" rows="4"></textarea>
            </p>
            <p>
                <input type="submit" value="Remti" style="background: #0073aa; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor:pointer;">
            </p>
        </form>

        <?php echo $message; ?>
    </div>
</div>

<?php get_footer(); ?>
