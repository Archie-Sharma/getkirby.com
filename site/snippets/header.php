<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <?php echo css('assets/css/site.min.css') ?>

  <?php if($page->isHomePage()): ?>
  <title><?php echo html($page->headline()) ?> | <?php echo html($site->title()) ?></title>
  <?php else: ?>
  <title><?php echo html($page->title()) ?> | <?php echo html($site->title()) ?></title>
  <?php endif ?>

  <?php if($page->description() != ''): ?>
  <meta name="description" content="<?php echo html($page->description()) ?>" />
  <?php else: ?>
  <meta name="description" content="<?php echo html($site->description()) ?>" />
  <?php endif ?>

  <meta name="robots" content="noindex, nofollow, noarchive">

  <link rel="icon" href="<?php echo url('assets/images/favicon.png') ?>" type="image/png" />
  <link rel="apple-touch-icon" href="<?php echo url('assets/images/apple-touch-icon.png') ?>" />
  <meta name="apple-mobile-web-app-title" content="<?php echo html($site->title()) ?>">

</head>
<body class="<?php echo str_replace('.', '-', $page->template()) ?>" id="top">

  <div class="site">
