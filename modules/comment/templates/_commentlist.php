<?php use_helper('Date', 'JavascriptBase', 'I18N') ?>

<h3><?php echo __('Comments', array(), 'vjComment') ?></h3>

<table class="list-comments" summary="">
  <?php foreach($comments as $c): ?>
    <?php include_partial("comment/comment", array('obj' => $c, 'i' => ++$i)) ?>
  <?php endforeach; ?>
</table>
