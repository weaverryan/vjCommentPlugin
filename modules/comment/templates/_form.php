<table summary="">
  <?php foreach($form as $id => $f): ?>
    <?php $attributes = array() ?>

    <?php if($id == "reply_author" && $f->getValue()!= ""): ?>
      <?php use_stylesheet(sfConfig::get('app_vjCommentPlugin_style_web_root').'/css/replyTo.css', "last") ?>
    <?php endif ?>

    <?php if(!$f->isHidden()): ?>
      <?php if($f->hasError()): ?>
        <?php $attributes['class'] = 'error' ?>
        <tr>
          <td></td>
          <td><?php echo $f->renderError() ?></td>
        </tr>
      <?php endif ?>

      <tr id="tr_<?php echo $id ?>">
        <th>
          <?php echo $f->renderLabel(null, $attributes) ?>
        </th>
        <td>
          <?php echo $f->render($attributes) ?>
          <span class="help"><?php echo $f->renderHelp() ?></span>
        </td>
      </tr>

      <?php if($id == "reply_author"): ?>
        <tr id="tr_reply_author_delete">
          <td colspan="2"><?php echo link_to_function(__("Delete the reply", array(), 'vjComment'), "deleteReply()", array('class' => 'delete_reply'))."\n" ?></td>
        </tr>
      <?php endif ?>
      
    <?php endif ?>

  <?php endforeach ?>
</table>
<?php echo $form->renderHiddenFields() ?>