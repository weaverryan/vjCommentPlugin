<?php
$json = array(
  'success' => false,
  'form'    => get_partial('comment/formCommentInner', array('form' => $form)),
  'errors'  => array_keys($form->getErrorSchema()->getErrors()),
);

echo json_encode($json);