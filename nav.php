<nav class="navigation">
  <ul>
    <li>
      <a<?= $site->is('home') ? ' class="active"' : ""; ?> href="<?= eat($url); ?>">
        <?= i('Home'); ?>
      </a>
    </li>
    <?php foreach ($links as $link): ?>
      <?php $children = $link->children ?? false; ?>
      <li>
        <a<?= $link->current ? ' class="active"' : ""; ?> href="<?= eat($link->link ?: ($link->url . ($children && $children->count ? '/1' : ""))); ?>">
          <?= $link->title; ?>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
</nav>