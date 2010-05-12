<?php
require_once dirname(__FILE__).'/../lib/BaseCommentActions.class.php';

/**
 * comment actions.
 *
 * @package    vjCommentPlugin
 * @subpackage comment
 * @author     Jean-Philippe MORVAN <jp.morvan@ville-villejuif.fr>
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class commentActions extends BaseCommentActions
{
   public function executeAdd(sfWebRequest $request)
  {
      // TODO: make sure the user-id matches the user
     if($request->isMethod('post'))
    {
           $this->form = new CommentForm();

           //preparing temporary array with sent values
      $formValues = $request->getParameter($this->form->getName());

      if( vjComment::isCaptchaEnabled() && !vjComment::isUserBoundAndAuthenticated() )
      {
        $captcha = array(
          'recaptcha_challenge_field' => $request->getParameter('recaptcha_challenge_field'),
          'recaptcha_response_field'  => $request->getParameter('recaptcha_response_field'),
        );
        //Adding captcha
        $formValues = array_merge( $formValues, array('captcha' => $captcha)  );
      }
      if( vjComment::isUserBoundAndAuthenticated() )
      {
        //adding user info
        $user = $this->getUser()->getGuardUser();
        $formValues = array_merge( $formValues,
                                                     array('user_id' => $user->getId()));
      }

      $this->form->bind( $formValues );
      
      if ($this->form->isValid()){
        $this->form->save();
        // do list template
      }
      else
      {
       return sfView::ERROR;
      }
      $this->record = Doctrine::getTable($formValues['record_model'])
              ->find($formValues['record_id']);
     }
   }
}