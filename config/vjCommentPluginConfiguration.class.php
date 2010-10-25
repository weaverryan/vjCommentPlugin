<?php

/**
 * vjCommentPlugin configuration class
 *
 * @author Ryan Weaver <ryan.weaver@iostudio.com>
 */
class vjCommentPluginConfiguration extends sfPluginConfiguration
{
  /**
   * Auto-enables the comment module
   *
   * @return void
   */
  public function initialize()
  {
    if (sfConfig::get('app_vjCommentPlugin_auto_enable_modules', true))
    {
      sfConfig::set('sf_enabled_modules', array_merge(
        sfConfig::get('sf_enabled_modules', array()),
        array('comment')
      ));
    }
  }
}