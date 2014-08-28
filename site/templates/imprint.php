<?php snippet('header') ?>

<main class="main grid" role="main">

  <h1 class="alpha">Imprint</h1>

  <section class="col-3-6 text">
    <h2 class="beta">Contact & Responsibility</h2>
    <?php echo kirbytext($page->contact()) ?>
  </section>

  <section class="col-3-6 last text">
    <h2 class="beta">Disclaimer</h2>
    <?php echo kirbytext($page->disclaimer()) ?>
  </section>

</main>

<?php snippet('footer') ?>