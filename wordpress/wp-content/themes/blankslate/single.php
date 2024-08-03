<?php get_header(); ?>

<div class="container">
  <div class="main-content">
    <div class="news-title">
      <h1><?php the_title() ?></h1>
      <p class="author">Author : <a href="<?= site_url('/author/').get_the_author() ?>" target="_blank"><?php the_author() ?></a></p>
      <p class="date"><?= get_the_date('D, d F Y g:i') ?></p>
    </div>
    <?= get_the_post_thumbnail(null, 'post-thumbnail', ['class' => 'news-image']); ?>
    <div class="news-content">
      <?php the_content(null, true) ?>
    </div>
  </div>

  <div class="another">
    <div class="another-news">
      <h3 class="title">Another news</h3>
      <?php 
            $news = new WP_Query(array(
              'category_name' => 'news-update',
              'posts_per_page' => 4,
              'offset' => 3
            ));
              
            if($news->have_posts()) :
              while($news->have_posts()) : $news->the_post()
          ?>

              <a href="<?= get_permalink() ?>">
                <div class="sub-content news">
                  <div class="sub-content-img">
                    <?php the_post_thumbnail() ?>
                  </div>
                  <div class="sub-content-title">
                    <p>
                      <?= the_title() ?>
                    </p>
                    <p class="sub-content-date"><?= get_the_date('D, d F Y, g:i') ?></p>
                  </div>
                </div>
              </a>

          <?php 
                wp_reset_postdata();
            endwhile;
            endif;
        ?>
    </div>

    <div class="events">
        <h3 class="title">Events</h3>
        <?php 
          $events = new WP_Query(array(
            'category_name' => 'covid-19-events',
            'post_per_page' => 4
          ));

          if($events->have_posts()) :
            while($events->have_posts()) : $events->the_post()
        ?>
        <a href="<?= get_the_permalink() ?>"><?php the_title() ?></a>
        <?php 
            endwhile;
          endif
        ?>
      </div>
  </div>
</div>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'entry' ); ?>
<?php if ( comments_open() && !post_password_required() ) { comments_template( '', true ); } ?>
<?php endwhile; endif; ?>
<footer class="footer">
<?php get_template_part( 'nav', 'below-single' ); ?>
</footer>
<?php get_footer(); ?>