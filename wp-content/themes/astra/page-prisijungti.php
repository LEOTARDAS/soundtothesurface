<?php
/**
 * Template Name: Prisijungimo puslapis
 */

ob_start();

get_header();

if (headers_sent()) {
    die("Klaida: Negalima naudoti wp_redirect, nes antraštės jau išsiųstos.");
}

get_header();

if (is_user_logged_in()) {
    wp_redirect(home_url('/author/' . wp_get_current_user()->user_login));
    exit;
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login_nonce']) && wp_verify_nonce($_POST['login_nonce'], 'user_login')) {
    $creds = [
        'user_login'    => sanitize_user($_POST['username']),
        'user_password' => $_POST['password'],
        'remember'      => true
    ];
    $user = wp_signon($creds, false);

    if (is_wp_error($user)) {
        $errors[] = 'Neteisingas vartotojo vardas arba slaptažodis.';
    } else {
        wp_redirect(home_url('/author/' . $user->user_login));
        exit;
    }
}
?>

<div class="login-form" style="max-width:400px; margin:auto;">
    <h2>Prisijungimas</h2>

    <?php if ($errors): ?>
        <div style="color:red; margin-bottom:15px;">
            <?php foreach ($errors as $error): ?>
                <p><?php echo esc_html($error); ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form method="POST">
        <p>
            <label>Vartotojo vardas arba el. paštas</label>
            <input type="text" name="username" required />
        </p>
        <p>
            <label>Slaptažodis</label>
            <input type="password" name="password" required />
        </p>
        <?php wp_nonce_field('user_login', 'login_nonce'); ?>
        <p>
            <button type="submit">Prisijungti</button>
        </p>
    </form>
</div>

<?php get_footer(); ?>
