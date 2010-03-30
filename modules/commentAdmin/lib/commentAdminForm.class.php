<?php

/**
 * commentAdmin admin form
 *
 * @package    vjCommentPlugin
 * @subpackage commentAdmin
 * @author     Jean-Philippe MORVAN <jp.morvan@ville-villejuif.fr>
 * @version    4 mars 2010 10:45:36
 */
class commentAdminForm extends PluginCommentCommonForm
{
  public function configure()
  {
    parent::configure();
    $this->widgetSchema['created_at'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['updated_at'] = new sfWidgetFormInputHidden();

    $this->validatorSchema['edition_reason']
      ->setOption('required', true)
      ->setMessage('required', $this->required);
  }
}