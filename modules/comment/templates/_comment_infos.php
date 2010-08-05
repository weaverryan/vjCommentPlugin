<td rowspan="2" class="infos">
  <a name="<?php echo $i ?>" class="ancre">#<?php echo $i ?></a>
  <?php if(!$obj->is_delete): ?>
    <?php echo link_to_function(
      image_tag(sfConfig::get('app_vjCommentPlugin_style_web_root').'/images/comments.png'),
      sprintf("reply('%s','%s')", $obj->id, $obj->getAuthorName()),
      array('title' => __('Reply to this comment', array(), 'vjComment'))
    ) ?>

    <?php if (sfConfig::get('app_vjCommentPlugin_enable_comment_reporting')): ?>
      <?php echo link_to_function(
        image_tag(sfConfig::get('app_vjCommentPlugin_style_web_root').'/images/error.png'),
        sprintf(
          "window.open('%s','%s', 'menubar=no, status=no, scrollbars=no, menubar=no, width=565, height=300')",
          url_for('@commentReport?id='.$obj->id.'&num='.$i),
          __('Add new comment', array(), 'vjComment')
        ),
        array('target' => '_blank', 'title' => __('Report this comment - New window', array(), 'vjComment'))) ?>
      <br />
    <?php endif; ?>
  <?php endif; ?>
  
  <?php if(commentTools::isGravatarAvailable() && !$obj->is_delete): ?>
    <?php echo gravatar_image_tag($obj->getAuthorEmail()) ?>
  <?php endif ?>
</td>