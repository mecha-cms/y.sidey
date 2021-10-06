<?php

$schema = [];

if ($site->is('page')) {
    $schema = [
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
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'WebSite',
        'description' => $page->description ?? $site->description,
        'headline' => $page->title ?? $site->title,
        'name' => $page->title ?? $site->title,
        'url' => $url
    ];
}

echo To::JSON($schema);