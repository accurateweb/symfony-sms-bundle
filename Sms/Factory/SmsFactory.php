<?php
/**
 * Copyright (c) 2017. Denis N. Ragozin <dragozin@accurateweb.ru>
 *
 * For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 */

/**
 * @author Denis N. Ragozin <dragozin@accurateweb.ru>
 */

namespace Accurateweb\SmsBundle\Sms\Factory;

use Accurateweb\SmsBundle\Template\Loader\TemplateLoaderInterface;

/**
 * SMS Factory
 *
 * @package Accurateweb\SmsBundle\Model
 */
class SmsFactory
{
  /**
   * @var TemplateLoaderInterface
   */
  private $loader;

  private $templates;

  /**
   * SmsFactory constructor.
   *
   * @param TemplateLoaderInterface $loader
   */
  public function __construct(TemplateLoaderInterface $loader)
  {
    $this->loader = $loader;
    $this->templates = [];
  }

  public function setTemplate($alias, $configuration)
  {
    $this->templates[$alias] = $configuration;
  }

  /**
   * Creates an SMS for given template name and variable values
   *
   * @param String $templateName Template name
   * @param array $values Variable values
   * @return Sms SMS object
   */
  public function createSms($templateName, $values=[])
  {
    $template = $this->loader->load($templateName);

    return new Sms($template->renderText($values));
  }
}