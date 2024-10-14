<?php
get_header();
?>
<div class="container">
  <main>
    <div class="detail-article category">
      <div class="image">
        <?= the_post_thumbnail() ?>
        <div class="text">
          <div class="author">
            <?= get_avatar(get_the_author_ID()) ?>
            <?= the_author_nickname() ?? 'smkn1bekasi' ?>
          </div>
          <div class="title">
            <?= the_title() ?>
          </div>
          <div class="date">
            <i class="fa-regular fa-calendar-days"></i> <?= get_the_date() ?>
          </div>
        </div>
      </div>
      <div class="contents">
        <?= the_content() ?>
      </div>
    </div>
  </main>
</div>
<?php
get_footer();
?>