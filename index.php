<?php
require __DIR__ . '/inc/data.php';
require __DIR__ . '/inc/components.php';
require __DIR__ . '/inc/pages.php';

/**
 * Single landing page: every request renders the investor page.
 */
$page = investorPage();
?><!doctype html>
<html lang="en" data-theme="light">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="theme-color" content="#ffffff" />
    <title>Finnovate | Financial clarity, designed around you</title>
    <script>document.documentElement.dataset.theme = localStorage.getItem('finnovate-theme') || 'light';</script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=DM+Serif+Display:ital@0;1&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./styles.css" />
    <link rel="stylesheet" href="./motion.css" />
  </head>
  <body>
    <div class="cursor-glow" aria-hidden="true"></div>
    <div id="app"><?= $page ?></div>
    <script src="./app.js"></script>
  </body>
</html>
