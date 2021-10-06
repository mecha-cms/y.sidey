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