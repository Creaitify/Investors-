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
    <title>Financial Planning for Investors &amp; HNIs | Finnovate Financial Fitness Check-up</title>
    <meta name="description" content="Unbiased financial planning for investors and HNIs. Get a ₹999 portfolio health check-up: your fitness score, a 9-page report and a 45-minute expert review." />
    <link rel="canonical" href="<?= SITE_URL ?>/" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Finnovate" />
    <meta property="og:url" content="<?= SITE_URL ?>/" />
    <meta property="og:title" content="Financial Planning for Investors &amp; HNIs | Finnovate Financial Fitness Check-up" />
    <meta property="og:description" content="Unbiased financial planning for investors and HNIs. Get a ₹999 portfolio health check-up: your fitness score, a 9-page report and a 45-minute expert review." />
    <meta property="og:image" content="<?= SITE_URL ?>/assets/investors/lighthouse-compass-banner.png" />
    <meta property="og:image:alt" content="Finnovate Financial Fitness Check-up" />
    <script type="application/ld+json"><?= structuredData() ?></script>
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
