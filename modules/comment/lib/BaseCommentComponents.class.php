<?php

/**
 * BaseComment components.
 *
 * @package    vjCommentPlugin
 * @subpackage comment
 * @author     Jean-Philippe MORVAN <jp.morvan@ville-villejuif.fr>
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class BaseCommentComponents extends sfComponents
{

  public function executeFormComment(sfWebRequest $request)
  {
    $this->form = new CommentForm();
    $this->form->setDefault('record_model', $this->object->getTable()->getComponentName());
    $this->form->setDefault('record_id', $this->object->get('id'));
    if($request->isMethod('post'))
    {
      if(sfConfig::get('app_recaptcha_enabled'))
      {
        $captcha = array(
          'recaptcha_challenge_field' => $request->getParameter('recaptcha_challenge_field'),
          'recaptcha_response_field'  => $request->getParameter('recaptcha_response_field'),
        );
        $this->form->bind(array_merge($request->getParameter($this->form->getName()), array('captcha' => $captcha)));
      }
      else
      {
        $this->form->bind($request->getParameter($this->form->getName()));
      }
      if ($this->form->isValid()){
        $this->form->save();
        $url = $request->getUri() . "#" . $this->getUser()->getAttribute("nextComment");
        $this->getUser()->offsetUnset("nextComment");
        sfContext::getInstance()->getController()->redirect($url, 0, 302);
      }
    }
  }

  public function executeList()
  {
  }
}