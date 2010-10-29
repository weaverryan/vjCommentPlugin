<?php use_helper('I18N', 'JavascriptBase') ?>
<?php use_stylesheet(sfConfig::get('app_vjCommentPlugin_style_web_root').'/css/form.css') ?>
<?php use_stylesheet(sfConfig::get('app_vjCommentPlugin_style_web_root').'/css/formComment.css') ?>
<?php use_javascript('/js/jquery.scrollTo.js') ?>
<?php $sf_user->setAttribute('nextComment', $object->getNbComments()+1) ?>

<a name="comment_form"></a>
<div class="form-comment">
  <?php if( vjComment::checkAccessToForm()): ?>
    <?php include_partial('comment/formCommentInner', array('form' => $form)) ?>
  <?php else: ?>
    <div id="notlogged"><?php echo __('Please log in to comment', array(), 'vjComment') ?></div>
  <?php endif ?>
</div>