<?= self::before(); ?>
<section class="posts">
  <?= $alert; ?>
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
    <p>
      <?= i('No %s yet.', 'pages'); ?>
    </p>
  <?php endif; ?>
  <p class="meta">
    <?php if ($next = $pager->next): ?>
      <a href="<?= $next->link; ?>" rel="next">
        <?= i('Next'); ?>
      </a>
    <?php endif; ?>
  </p>
</section>
<?= self::after(); ?>