<?= self::enter(); ?>
<section class="post">
  <?= self::alert(); ?>
  <?php if ($page->exist): ?>
    <h2>
      <?= $page->title; ?>
    </h2>
    <?= $page->content; ?>
    <?php if ($site->has('parent')): ?>
      <p class="meta">
        <time datetime="<?= eat($page->time->format('c')); ?>">
          <?= $page->time('%B %d, %Y'); ?>
        </time><?php if (count($tags = $page->tags)): ?>
          &nbsp;&middot;&nbsp;
          <?php $v = false; foreach ($tags as $k => $tag): ?>
            <?= false === $v ? "" : ', '; ?><a href="<?= eat($tag->link); ?>" rel="tag">
              <?= $v = $tag->title; ?>
            </a>
          <?php endforeach; ?>
        <?php endif; ?>
      </p>
    <?php endif; ?>
  <?php else: ?>
    <h2>
      <?= i('Error'); ?>
    </h2>
    <p role="status">
      <?= i('%s does not exist.', 'Page'); ?>
    </p>
  <?php endif; ?>
</section>
<?= self::exit(); ?>