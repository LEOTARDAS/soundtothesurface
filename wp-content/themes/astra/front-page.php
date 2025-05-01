

<?php
// Tik front page header
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
        </div>
    </div>
</div>

<div id="content" class="site-content">
    <div class="ast-container">
        <!-- toliau tavo sample grid ir kita -->
    </div>
</div>

<?php get_footer(); ?>

