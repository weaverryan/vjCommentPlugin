<div id="comment_list">
<?php if($object->hasComments()): ?>
  <?php use_helper('Date', 'JavascriptBase', 'I18N') ?>
  <?php use_stylesheet(sfConfig::get('app_vjCommentPlugin_style_web_root').'/css/comment.css') ?>
  <?php use_javascript(sfConfig::get('app_vjCommentPlugin_style_web_root').'/js/reply.js') ?>
  <?php if(commentTools::isGravatarAvailable()): ?>
    <?php use_helper('Gravatar') ?>
  <?php endif ?>
  <?php include_partial("comment/commentlist", array('comments' => $object->getAllComments(), 'i' =>0)) ?>
<?php else: ?>
  <div><h1><?php echo __('Be the first to comment', array(), 'vjComment') ?></h1></div>
<?php endif ?>
</div>