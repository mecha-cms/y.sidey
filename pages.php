<?= self::enter(); ?>
<section class="posts">
  <?= self::alert(); ?>
  <?php if ($page->exist): ?>
    <?php if ($pages->count): ?>
      <ul>
        <?php foreach ($pages as $page): ?>
          <li>
            <?php if ($link = $page->link): ?>
              <a href="<?= $link; ?>" rel="nofollow" target="_blank">
                <?= $page->title; ?>
              </a>
            <?php else: ?>
              <a href="<?= $page->url; ?>">
                <?= $page->title; ?>
              </a>
            <?php endif; ?>
            <time datetime="<?= $page->time->format('c'); ?>">
              <?= $page->time->format('d-m-Y'); ?>
            </time>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php else: ?>
      <h2>
        <?= i('Error'); ?>
      </h2>
      <?php if ($site->has('part')): ?>
        <p role="status">
          <?= i('No more %s to show.', 'pages'); ?>
        </p>
      <?php else: ?>
        <p role="status">
          <?= i('No %s yet.', 'pages'); ?>
        </p>
      <?php endif; ?>
    <?php endif; ?>
    <p class="meta">
      <?php if ($next = $pager->next): ?>
        <a href="<?= $next->link; ?>" rel="next" title="<?= $next->description; ?>">
          <?= $next->title ?? i('Next'); ?>
        </a>
      <?php endif; ?>
    </p>
  <?php else: ?>
    <p role="status">
      <?= i('%s does not exist.', 'Page'); ?>
    </p>
  <?php endif; ?>
</section>
<?= self::exit(); ?>