<tr>
  <td class="body">
    <?php if(!$obj->is_delete): ?>
      <span id="body_<?php echo $obj->id ?>"><?php echo $obj->getRawValue()->getBody() ?></span>
    <?php else: ?>
      <span class="msg-deleted"><?php echo __('Comment deleted by moderator', array(), 'vjComment') ?></span>
    <?php endif ?>
  </td>
</tr>