<?php

/**
 * PluginComment form.
 *
 * @package    vjCommentPlugin
 * @subpackage form
 * @author     Jean-Philippe MORVAN <jp.morvan@ville-villejuif.fr>
 * @version    SVN: $Id$
 */

abstract class PluginCommentForm extends PluginCommentCommonForm
{
  public function setup()
  {
    parent::setup();

    unset($this['id'],$this['is_active'], $this['is_delete'], $this['created_at'], $this['updated_at'], $this['edition_reason']);
    $this->widgetSchema['reply_author'] = new sfWidgetFormInputText(array(), array('readonly' => "readonly"));
    $this->widgetSchema->setLabel('reply_author', __('Reply to', array(), 'vjComment'));
    $this->widgetSchema->setHelp('author_email', __('Your email will never be published', array(), 'vjComment'));
    $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden();

    if( vjComment::isUserBoundAndAuthenticated() )
    {
        unset( $this['author_email'], $this['author_website'], $this['author_name'] );
    }
    else
    {
        unset( $this['user_id'] );
    }
    if (vjComment::isCaptchaEnabled() && !vjComment::isUserBoundAndAuthenticated() )
    {
      $this->addCaptcha();
    }
  }

  protected function addCaptcha()
  {
    $config = sfConfig::get('app_vjCommentPlugin_recaptcha', array());

    $widgetClass = isset($config['widget_class']) ? $config['widget_class'] : 'sfWidgetFormReCaptcha';
    $this->widgetSchema['captcha'] = new $widgetClass(array(
      'public_key' => sfConfig::get('app_recaptcha_public_key')
    ));

    $validatorClass = isset($config['validator_class']) ? $config['validator_class'] : 'sfValidatorReCaptcha';
    $this->validatorSchema['captcha'] = new $validatorClass(array(
      'private_key' => sfConfig::get('app_recaptcha_private_key')
    ));

    $this->validatorSchema['captcha']
        ->setMessage('captcha', __('The captcha is not valid (%error%).', array(), 'vjComment'))
        ->setMessage('server_problem', __('Unable to check the captcha from the server (%error%).', array(), 'vjComment'));
  }
}