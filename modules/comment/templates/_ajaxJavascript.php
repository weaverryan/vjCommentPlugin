<script type="text/javascript">
  $('.form-comment form').ajaxForm({
    dataType: 'json',
    success: function(jsonObj, statusText, xhr, $form) {
      if (jsonObj.success)
      {
        $('#comment_list').html(jsonObj.comments);
      }
      else
      {
        $form.parent().html(jsonObj.form);
      }
    }
  });
</script>