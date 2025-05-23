<?php
/* Template Name: Apmokėjimas */
get_header();

$author_id = isset($_GET['user_id']) ? intval($_GET['user_id']) : 0;
$amount = isset($_GET['amount']) ? floatval($_GET['amount']) : 0;
$message = isset($_GET['message']) ? sanitize_text_field($_GET['message']) : '';

if (!$author_id || !$amount || $amount < 5) {
    echo '<p>Klaida: neteisingi duomenys.</p>';
    get_footer();
    return;
}

$author = get_userdata($author_id);
?>

<div class="payment-wrapper" style="max-width: 600px; margin: 30px auto; background: #fff; padding: 30px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.05);">
    <h2>Apmokėjimas</h2>

    <p><strong>Autorius:</strong> <?php echo esc_html($author->display_name); ?></p>
    <p><strong>Suma:</strong> €<?php echo number_format($amount, 2); ?></p>
    <?php if (!empty($message)) : ?>
        <p><strong>Žinutė:</strong> <?php echo esc_html($message); ?></p>
    <?php endif; ?>

    <form method="post" action="#" style="margin-top: 20px;">
        <button type="submit" disabled style="background: #28a745; color: white; padding: 12px 24px; border: none; border-rad
