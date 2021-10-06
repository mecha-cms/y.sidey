<?= self::before(); ?>
<section class="post">
  <h2>
    <?= $page->title; ?>
  </h2>
  <?= $page->content; ?>
  <p class="meta">
    <time datetime="<?= $page->time->format('c'); ?>">
      <?= $page->time('%B %d, %Y'); ?>
    </time><?php if ($tags = $page->tags): ?>
      <!-- TODO: List all tags here... -->
    <?php endif; ?>
  </p>
</section>
<?= self::after(); ?>