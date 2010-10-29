<?php

$json = array(
  'success' => true,
  'comments' => get_component('comment', 'commentlist', array('comments' => $record->getAllComments(), 'i' => 0)),
);

echo json_encode($json);