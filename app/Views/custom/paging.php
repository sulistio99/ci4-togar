<?php $pager->setSurroundCount(2) ?>

<div class="block-27 text-center">
  <ul>
    <?php if ($pager->hasPreviousPage()) : ?>
      <li>
        <a href="<?= $pager->getFirst() ?>"><i class="ion-ios-arrow-back"></i></a>
      </li>
    <?php endif ?>


    <?php foreach ($pager->links() as $link) : ?>
      <li <?= $link['active'] ? 'class="page-item active"' : '' ?>>
        <a href="<?= $link['uri'] ?>"><?= $link['title'] ?></a>
      </li>
    <?php endforeach ?>

    <?php if ($pager->hasNextPage()) : ?>
      <li>
        <a href="<?= $pager->getLast() ?>"><i class="ion-ios-arrow-forward"></i></a>
      </li>
    <?php endif ?>
  </ul>
</div>