<?php use_helper('I18N', 'JavascriptBase') ?>
<?php use_stylesheet(sfConfig::get('app_vjCommentPlugin_style_web_root').'/css/form.css') ?>
<?php use_stylesheet(sfConfig::get('app_vjCommentPlugin_style_web_root').'/css/formComment.css') ?>
<?php use_javascript('/js/jquery.scrollTo.js') ?>
<?php $sf_user->setAttribute('nextComment', $object->getNbComments()+1) ?>

<a name="top"></a>
<div class="form-comment">
  <?php if( vjComment::checkAccessToForm()): ?>
    <form action="" method="post">
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
  <?php else: ?>
    <div id="notlogged"><?php echo __('Please log in to comment', array(), 'vjComment') ?></div>
  <?php endif ?>
</div>