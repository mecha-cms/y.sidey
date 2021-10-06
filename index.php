<?php

$z = defined('DEBUG') && DEBUG ? '.' : '.min.';
Asset::set(__DIR__ . DS . 'asset' . DS . 'css' . DS . 'index' . $z . 'css', 20);

$GLOBALS['links'] = new Anemon((static function($links, $state, $url) {
    $index = LOT . DS . 'page' . strtr($state->path, '/', DS) . '.page';
    $path = $url->path . '/';
    foreach (g(LOT . DS . 'page', 'page') as $k => $v) {
        // Exclude home page
        if ($k === $index) {
            continue;
        }
        $v = new Page($k);
        // Add current state
        $v->current = 0 === strpos($path, '/' . $v->name . '/');
        $links[$k] = $v;
    }
    ksort($links);
    return $links;
})([], $state, $url));

// Data to be embedded in `<script type="application/ld+json">`
$meta = [];
if ($site->is('page')) {
    $meta = [
        '@context' => 'https://schema.org',
        '@type' => 'BlogPosting',
        'dateModified' => $page->exist ? date('c', filemtime($page->path)) : null,
        'datePublished' => $page->exist ? $page->time->format('c') : null,
        'description' => $page->description ?? $site->description,
        'headline' => $page->title ?? $site->title,
        'mainEntityOfPage' => [
            '@id' => $page->url ?? null,
            '@type' => 'WebPage'
        ],
        'url' => $page->url ?? null
    ];
} else {
    $meta = [
        '@context' => 'https://schema.org',
        '@type' => 'WebSite',
        'description' => $page->description ?? $site->description,
        'headline' => $page->title ?? $site->title,
        'name' => $page->title ?? $site->title,
        'url' => $url
    ];
}

$GLOBALS['meta'] = To::JSON($meta);