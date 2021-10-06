<nav class="navigation">
  <ul>
    <li>
      <?php if ($site->is('home')): ?>
        <span>
          <?= i('Home'); ?>
        </span>
      <?php else: ?>
        <a href="<?= $url; ?>">
          <?= i('Home'); ?>
        </a>
      <?php endif; ?>
    </li>
    <?php foreach ($links as $link): ?>
      <li>
        <a<?= $link->current ? ' class="active"' : ""; ?> href="<?= $link->link ?: $link->url; ?>">
          <?= $link->title; ?>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
</nav>