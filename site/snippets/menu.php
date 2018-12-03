<nav class="menu cf" role="navigation">

  <ul class="menu-left">
    <?php foreach($pages->visible() as $item): ?><!--
 --><li<?php e($item->isOpen(), ' class="is-active"') ?>><a href="<?php echo $item->url() ?>"><?php echo html($item->title()) ?></a></li><!--
 --><?php endforeach ?>
  </ul><!--
--><ul class="menu-right">
    <li class="<?php e($page->uid() == 'try', ' is-active') ?>"><a title="Download and test Kirby on your local machine as long as you want." href="<?php echo url('try') ?>">Try</a></li><!--
 --><li class="<?php e($page->uid() == 'made-with-kirby-and-love', ' is-active') ?>"><a class="red" title="Build an awesome website with Kirby!" href="<?php echo url('made-with-kirby-and-love') ?>">&#9829;</a></li><!--
 --><li class="<?php e($page->uid() == 'buy', ' is-active') ?>"><a title="Buy a Kirby license" href="<?php echo url('buy') ?>">Buy</a></li>
  </ul>

</nav>
