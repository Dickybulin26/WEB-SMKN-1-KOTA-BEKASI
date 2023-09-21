<?php

$agenda = new WP_Query([
    'post_type' => 'post',
    'post_status' => 'publish',
    'category_name' => 'agenda',
    'posts_per_page' => 5,
]);

$pengumuman = new WP_Query([
    'post_type' => 'post',
    'post_status' => 'publish',
    'category_name' => 'pengumuman',
    'posts_per_page' => 5,
]);
?>

<main class="biru">
    
    <div class="agenda category">
        <div class="title">
            <div class="text">Agenda</div>
            <a href="#" class="view">View More</a>
        </div>
        <div class="contents">
<?php
if ($agenda->have_posts()) :

    while ($agenda->have_posts()) :
?>
            <a href="<?php the_permalink(); ?>" class="content">
                <div class="title"><?php the_post(); ?></div>
                <div class="date"><?php the_date(); ?></div>
            </a>
<?php
    endwhile;
    wp_reset_postdata();
endif
?>
        </div>
    </div>
    <div class="pengumuman category">
        <div class="title">
            <div class="text">Pengumuman</div>
            <a href="#" class="view">View More</a>
        </div>
        <div class="contents">
            <a href="#" class="content">
                <div class="image"></div>
                <p class="text">Sebanyak 1.037 siswa mengikuti UI/UX Designer yang di selenggarakan oleh
                    dicoding.com.</p>
            </a>
            <a href="#" class="content">
                <div class="image"></div>
                <p class="text">Sebanyak 1.037 siswa mengikuti UI/UX Designer yang di selenggarakan oleh
                    dicoding.com.</p>
            </a>
            <a href="#" class="content">
                <div class="image"></div>
                <p class="text">Sebanyak 1.037 siswa mengikuti UI/UX Designer yang di selenggarakan oleh
                    dicoding.com.</p>
            </a>
        </div>
    </div>
</main>