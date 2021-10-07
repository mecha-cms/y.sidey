<!DOCTYPE html>
<html class lang="<?= $site->language; ?>">
  <head>
    <meta charset="<?= $site->charset; ?>">
    <meta content="Mecha <?= VERSION; ?>" name="generator">
    <meta content="width=device-width" name="viewport">
    <script type="application/ld+json">
      <?= self::schema(); ?>
    </script>
    <?php if ($w = w($page->description ?? $site->description)): ?>
      <meta content="<?= $w; ?>" name="description">
    <?php endif; ?>
    <?php if ('archive' === $page->x): ?>
      <!-- Prevent search engines from indexing pages with `archive` state -->
      <meta content="noindex" name="robots">
    <?php endif; ?>
    <meta content="<?= $page->author; ?>" name="author">
    <title>
      <?= w($t->reverse->join(' - ')); ?>
    </title>
    <link href="<?= $url; ?>/favicon.ico" rel="icon">
    <link href="<?= $url->clean; ?>" rel="canonical">
  </head>
  <body>
    <main role="main">
      <?= self::header(); ?>