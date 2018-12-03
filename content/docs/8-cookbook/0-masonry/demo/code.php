<div id="container">
  <ul>
    <?php foreach($page->children()->find('pics')->images()->shuffle() as $pic): ?>
    <li>
      <?php $pic->fitWidth(200) ?>
      <a href="<?= $pic->link() ?>"><img src="<?= $pic->url() ?>" height="<?= $pic->height() ?>" /></a>
    </li>
    <?php endforeach ?>
  </ul>
</div>


