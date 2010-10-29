<?php
/**
 * Determine if we should use javascript or not. If we are supposed to,
 * then we use the ajax url. Else, we look to see if the user has sent
 * us a custom url (via a request attribute). If nothing has been sent,
 * then the action will be blank, meaning this form submits to itself,
 * which usually works just fine for non-ajax situations.
 */
?>
<?php $useJavascript = sfConfig::get('app_vjCommentPlugin_use_ajax') ?>
<?php $formAction = $useJavascript ? url_for('commentAjaxAdd') : $sf_request->getAttribute('comment_submit_url') ?>

<?php use_helper('I18N', 'JavascriptBase') ?>
<form action="<?php echo $formAction ?>" method="post">
  <fieldset>
    <legend><?php echo __('Add new comment', array(), 'vjComment') ?></legend>
    <?php include_partial("comment/form", array('form' => $form)) ?>

    <table>
      <tr>
        <td colspan="2" class="submit">
          <?php if(sfConfig::get('app_vjCommentPlugin_jquery')): use_helper('jQuery'); ?>
            <?php echo jq_submit_to_remote('ajax_submit', __('send', array(), 'vjComment') , array(
                'url'   => '/add-comment',
               'success' =>  "alert('this will be a lightbox with a message on success');
                $('#tr_reply_author').hide('fast');
                $('#tr_reply_author_delete').hide('fast');
                $('#comment_body').val('');
                $('#comment_list').replaceWith(data);
                $.scrollTo( $('.comment').last(), 800 );",
            )) ?>
          <?php else: ?>
            <input type="submit" value="<?php echo __('send', array(), 'vjComment') ?>" class="submit" />
          <?php endif; ?>
        </td>
      </tr>
    </table>
  </fieldset>
</form>

<?php if ($useJavascript): ?>
  <?php include_partial('comment/ajaxJavascript') ?>
<?php endif; ?>