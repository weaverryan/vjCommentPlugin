<tbody class="comment<?php if($obj->is_delete) echo " deleted"; ?>">
  <tr>
    <?php include_partial("comment/comment_author", array('website' => $obj->getAuthorWebsite(), 'name' => $obj->getAuthor(), 'date' => $obj->getCreatedAt())) ?>
    <?php include_partial("comment/comment_infos", array('obj' => $obj, 'i' => $i)) ?>
  </tr>
  <?php include_partial("comment/comment_body", array('obj' => $obj)) ?>
</tbody>