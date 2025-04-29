<?php
get_header();

if (have_posts()) :
    while (have_posts()) : the_post();
    
    $download_count = get_post_meta(get_the_ID(), '_sample_downloads', true);
    $download_count = $download_count ? $download_count : 0;
    ?>
<div class="sample-container">
    <div class="sample-left sample-fade-in delay-1">
        <div class="sample-image-placeholder">
            <?php
            $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
            if ($thumbnail_url) {
                echo '<img src="' . esc_url($thumbnail_url) . '" alt="Fragmento paveikslėlis" style="max-width:100%; height:auto;">';
            } else {
                echo '<div class="sample-default-image">';
                echo '<span style="font-size:80px;">🎵</span>';
                echo '</div>';
            }
            ?>
        </div>
    </div>

    <div class="sample-right">
        <h1 class="sample-title sample-fade-in delay-2"><?php the_title(); ?></h1>

		
        <div class="sample-audio-block sample-fade-in delay-3">
            <h3>Klausykitės fragmento:</h3>
            <?php
            $audio_file_url = get_post_meta(get_the_ID(), '_sample_audio_file', true);
            if (!empty($audio_file_url)) {
                echo '<audio controls controlsList="nodownload" style="width:100%; max-width:600px;">';
                echo '<source src="' . esc_url($audio_file_url) . '" type="audio/mpeg">';
                echo 'Jūsų naršyklė nepalaiko audio grotuvo.';
                echo '</audio>';
            }
            ?>
        </div>
        <?php if (!empty($audio_file_url)) : ?>
    <div class="sample-download-block sample-fade-in delay-4">
        <a href="<?php echo esc_url($audio_file_url); ?>"
           download 
           class="download-button"
           onclick="registerDownload(<?php echo get_the_ID(); ?>)">
            <img src="http://localhost:8080/soundtothesurface/wp-content/uploads/2025/04/download-icon.png" alt="Download" style="width: 20px; height: 20px;">
            Download
        </a>
        <p id="download-count" style="margin-top:10px;">Atsisiuntimų skaičius: <strong><?php echo $download_count; ?></strong></p>
    </div>
<?php endif; ?>

        <div class="sample-rating-block sample-fade-in delay-4">
    <h3>Fragmento įvertinimas:</h3>
    <?php
    // Gauti visų komentarų reitingus
    $comments = get_comments(array(
        'post_id' => get_the_ID(),
        'status' => 'approve',
    ));

    $ratings = [];
    foreach ($comments as $comment) {
        $r = get_comment_meta($comment->comment_ID, 'rating', true);
        if ($r) {
            $ratings[] = intval($r);
        }
    }

    if (count($ratings) > 0) {
        $avg_rating = round(array_sum($ratings) / count($ratings), 1);
        echo '<div style="font-size:24px; color:gold;">';
        for ($i = 1; $i <= 5; $i++) {
            echo ($i <= $avg_rating) ? '★' : '☆';
        }
        echo '</div>';
        echo '<p style="margin-top: 5px;">Vidutinis įvertinimas: <strong>' . $avg_rating . '</strong></p>';
    } else {
        echo '<p>Dar nėra įvertinimų.</p>';
    }
    ?>
</div>

		<div class="sample-description sample-fade-in delay-2">
        	<?php the_content(); ?>
    	</div>
		<?php
			// Rodyti komentarų formą
			if (comments_open() || get_comments_number()) {
				comments_template();
			}
			?>
        </div>
    </div>
</div>

<?php endwhile; endif; ?>
<div id="rating-message" style="display:none; position:fixed; bottom:20px; left:50%; transform:translateX(-50%); background:black; color:white; padding:10px 20px; border-radius:5px; z-index:9999; box-shadow:0 2px 5px rgba(0,0,0,0.3);"></div>
<?php
$user_id = get_current_user_id();
$rated_users = get_post_meta(get_the_ID(), '_sample_rated_users', true);
$user_rating = 0;
if (is_array($rated_users) && isset($rated_users[$user_id])) {
    $user_rating = intval($rated_users[$user_id]);
}
?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const stars = document.querySelectorAll('.star');
    const userRatedValue = <?php echo json_encode($user_rating); ?>;
    let hasRated = userRatedValue > 0 ? true : false;

    // Jei jau buvo balsavęs, iš karto parodyti pasirinkimą
    if (userRatedValue > 0) {
        selectStars(userRatedValue);
    }

    stars.forEach(function(star) {
        star.addEventListener('mouseover', function() {
            const value = parseInt(this.getAttribute('data-value'));
            highlightStars(value);
        });

        star.addEventListener('mouseout', function() {
            resetStars();
            if (userRatedValue > 0) {
                selectStars(userRatedValue);
            }
        });

        star.addEventListener('click', function() {
            var rating = this.getAttribute('data-value');
            var postID = <?php echo json_encode(get_the_ID()); ?>;

            selectStars(parseInt(rating)); // Vizualiai pažymim

            var xhr = new XMLHttpRequest();
            xhr.open('POST', <?php echo json_encode(admin_url('admin-ajax.php')); ?>, true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('action=save_sample_rating&post_id=' + postID + '&rating=' + rating);

            xhr.onload = function() {
                if (xhr.status == 200) {
                    if (!hasRated) {
                        var messageBox = document.getElementById('rating-message');
                        messageBox.style.display = 'block';
                        messageBox.innerText = xhr.responseText;

                        setTimeout(function() {
                            messageBox.style.display = 'none';
                            location.reload();
                        }, 1500);

                        hasRated = true;
                    } else {
                        location.reload();
                    }
                }
            };
        });
    });

    function highlightStars(rating) {
        stars.forEach(function(star) {
            star.classList.remove('hovered');
            if (parseInt(star.getAttribute('data-value')) <= rating) {
                star.classList.add('hovered');
            }
        });
    }

    function resetStars() {
        stars.forEach(function(star) {
            star.classList.remove('hovered');
            star.classList.remove('selected');
        });
    }

    function selectStars(rating) {
        stars.forEach(function(star) {
            star.classList.remove('selected');
            if (parseInt(star.getAttribute('data-value')) <= rating) {
                star.classList.add('selected');
            }
        });
    }
});

function registerDownload(postID) {
    fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'action=sample_download&post_id=' + postID
    })
    .then(response => response.text())
    .then(data => {
        // Atnaujinti skaičių DOM'e
        const el = document.getElementById('download-count');
        if (el) {
            el.innerHTML = 'Atsisiuntimų skaičius: <strong>' + data + '</strong>';
        }
    });
}
</script>
<?php

get_footer();
?>