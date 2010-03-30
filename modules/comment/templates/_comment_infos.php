
      <td rowspan="2" class="infos">
        <a name="<?php echo ++$i ?>" class="ancre">#<?php echo $i ?></a>
        <?php if(!$obj->is_delete): ?>
          <?php echo link_to_function(
                  image_tag('/vjCommentPlugin/images/comments.png') ,
                  "reply('".$obj->id."','".$obj->author_name."')",
                  array('title' => __('Reply to this comment', array(), 'vjComment'))) ?>
        <?php endif; ?>
        <?php echo link_to_function(
                image_tag('/vjCommentPlugin/images/error.png') ,
                'window.open(
                  \''.url_for('@commentReport?id='.$obj->id.'&num='.$i).'\',
                  \''.__('Add new comment', array(), 'vjComment').'\',
                    "menubar=no, status=no, scrollbars=no, menubar=no, width=565, height=300")',
                array('target' => '_blank', 'title' => __('Report this comment - New window', array(), 'vjComment'), 'id' => 'opener')) ?><br />
        <?php if(commentTools::isGravatarAvailable() && !$obj->is_delete): ?>
          <?php echo gravatar_image_tag($obj->getAuthorEmail()) ?>
        <?php endif ?>
      </td>