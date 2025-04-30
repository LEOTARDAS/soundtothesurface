<?php
/**
 * Template Name: Registracijos puslapis
 */

 ob_start();

get_header();

if (is_user_logged_in()) {
    wp_redirect(home_url());
    exit;
}

// Apdorojimas
$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_register_nonce']) && wp_verify_nonce($_POST['user_register_nonce'], 'user_register')) {
    $username   = sanitize_user($_POST['username']);
    $email      = sanitize_email($_POST['email']);
    $password   = $_POST['password'];

    if (empty($username) || empty($email) || empty($password)) {
        $errors[] = 'Visi laukeliai yra privalomi.';
    }

    if (!is_email($email)) {
        $errors[] = 'Neteisingas el. pašto adresas.';
    }

    if (username_exists($username) || email_exists($email)) {
        $errors[] = 'Toks vartotojas jau egzistuoja.';
    }

    if (empty($errors)) {
        $user_id = wp_create_user($username, $password, $email);
        if (!is_wp_error($user_id)) {
            $success = true;
            wp_redirect(home_url('/prisijungti/'));
            exit;
        } else {
            $errors[] = 'Nepavyko užregistruoti vartotojo.';
        }
    }
}
?>

<div class="registration-form" style="max-width: 400px; margin: auto;">
    <h2>Registracija</h2>

    <?php if ($errors): ?>
        <div style="color:red; margin-bottom: 15px;">
            <?php foreach ($errors as $error): ?>
                <p><?php echo esc_html($error); ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form method="POST">
        <p>
            <label>Vartotojo vardas</label>
            <input type="text" name="username" required />
        </p>
        <p>
            <label>El. paštas</label>
            <input type="email" name="email" required />
        </p>
        <p>
            <label>Slaptažodis</label>
            <input type="password" name="password" id="reg-password" required />
            <div id="password-error" style="color: red; font-size: 14px; margin-top: 5px;"></div>
        </p>
        <?php wp_nonce_field('user_register', 'user_register_nonce'); ?>
        <p>
            <button type="submit">Registruotis</button>
        </p>
    </form>
</div>

<?php get_footer(); ?>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    const passwordInput = document.getElementById('reg-password');
    const errorDiv = document.getElementById('password-error');

    form.addEventListener('submit', function (e) {
        const password = passwordInput.value;

        const strongEnough = password.length >= 8 &&
                             /[A-Z]/.test(password) &&
                             /[a-z]/.test(password) &&
                             /[0-9]/.test(password);

        if (!strongEnough) {
            e.preventDefault();
            errorDiv.textContent = 'Slaptažodis turi būti bent 8 simbolių ilgio, turėti didžiąsias ir mažąsias raides bei skaičių.';
        } else {
            errorDiv.textContent = ''; // išvalom jei klaidos nebeliko
        }
    });
});
</script>
