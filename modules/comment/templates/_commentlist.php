<?php use_helper('Date', 'JavascriptBase', 'I18N') ?>

<h1><?php echo __('Comments list', array(), 'vjComment') ?></h1>

<table class="list-comments" summary="">
  <?php foreach($comments as $c): ?>
    <?php include_partial("comment/comment", array('obj' => $c, 'i' => ++$i)) ?>
  <?php endforeach; ?>
</table>
