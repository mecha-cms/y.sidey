<?= self::before(); ?>
<section class="post">
  <?= $alert; ?>
  <h2>
    <?= $page->title; ?>
  </h2>
  <?= $page->content; ?>
  <?php if ($site->has('parent')): ?>
    <p class="meta">
      <time datetime="<?= $page->time->format('c'); ?>">
        <?= $page->time('%B %d, %Y'); ?>
      </time><?php if (count($tags = $page->tags)): ?>
        &nbsp;&middot;&nbsp;
        <?php foreach ($tags as $k => $tag): ?>
          <?= 0 !== $k ? ', ' : ""; ?><a href="<?= $tag->link; ?>" rel="tag">
            <?= $tag->title; ?>
          </a>
        <?php endforeach; ?>
      <?php endif; ?>
    </p>
  <?php endif; ?>
</section>
<?= self::after(); ?>