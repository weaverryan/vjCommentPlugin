<?php use_helper('I18N') ?>
<?php use_stylesheet(sfConfig::get('app_vjCommentPlugin_style_web_root').'/css/form.css') ?>
<?php use_stylesheet(sfConfig::get('app_vjCommentPlugin_style_web_root').'/css/reportComment.css') ?>
<div class="form-comment">
  <form action="" method="post" id="reportComment">
  <fieldset>
    <legend><?php echo __('Report a comment', array(), 'vjComment') ?></legend>
    <?php include_partial("comment/form", array('form' => $form)) ?>
    <tr>
      <td colspan="2" class="submit">
        <input type="submit" value="<?php echo __('send', array(), 'vjComment') ?>" class="submit" />
      </td>
    </tr>
  </table>
  </fieldset>
  </form>
</div>