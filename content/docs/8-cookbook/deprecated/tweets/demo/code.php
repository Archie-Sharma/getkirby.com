<?php $tweets = tweets('getkirby') ?>

<ul class="tweets">
  <?php foreach($tweets as $tweet): ?>
  <li>
    <a class="user" href="<?= $tweet->user()->url() ?>">
      <img src="<?= $tweet->user()->image() ?>" /> 
      <strong><?= $tweet->user()->name() ?></strong>
      <small>@<?= $tweet->user()->username() ?></small>
    </a>    
    <p><?= $tweet->text(true) ?></p>
    <a class="date" href="<?= $tweet->url() ?>"><?= $tweet->date('h:i A - d M y') ?></a>
  </li>
  <?php endforeach ?>
</ul>