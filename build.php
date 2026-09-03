<?php
/**
 * Static build for Vercel.
 *
 * Vercel has no PHP runtime, so the page is rendered ahead of time and the
 * resulting index.html is what gets deployed. index.php stays the source of
 * truth — it reads no request state, so its output is deterministic.
 *
 * Re-run after editing index.php or anything under inc/, then commit index.html:
 *
 *   php build.php
 */

ob_start();
require __DIR__ . '/index.php';
$html = ob_get_clean();

file_put_contents(__DIR__ . '/index.html', $html);

printf("index.html written (%d bytes)\n", strlen($html));
