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

use Accurateweb\SmsBundle\Exception\TemplateNotFoundException;
use Accurateweb\SmsBundle\Model\Sms;
use Accurateweb\SmsBundle\Template\Engine\TemplateEngineInterface;
use Accurateweb\SmsBundle\Template\Loader\TemplateLoaderInterface;
use Accurateweb\SmsBundle\Template\SmsTemplate;
use Accurateweb\SmsBundle\Template\SmsTemplateInterface;

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

  /**
   * @var TemplateEngineInterface
   */
  private $engine;

  /**
   * Known template list
   *
   * @var array
   */
  private $templates;

  /**
   * SmsFactory constructor.
   *
   * @param TemplateLoaderInterface $loader
   */
  public function __construct(TemplateLoaderInterface $loader, TemplateEngineInterface $engine)
  {
    $this->loader = $loader;
    $this->engine = $engine;
    $this->templates = [];
  }

  /**
   * Adds a template to the list of known templates.
   *
   * If a template with given alias already exists, it will be replaced with a new one with given configuration
   *
   * @param string $alias
   * @param array $configuration
   */
  public function setTemplate($alias, $configuration)
  {
    $this->templates[$alias] = new SmsTemplate($alias, $configuration['description'],
      $configuration['defaults']['text'], $configuration['variables']);
  }

  /**
   * Returns a template for given alias
   *
   * @param string $alias Template alias
   * @return SmsTemplate An SMS Template
   * @throws TemplateNotFoundException
   */
  public function getTemplate($alias)
  {
    if (!isset($this->templates[$alias]))
    {
      throw new TemplateNotFoundException(sprintf('Sms template "%s" is not registered', $alias));
    }

    return $this->templates[$alias];
  }

  /**
   * Returns a list of all templates
   *
   * @return SmsTemplate[]
   */
  public function getTemplates()
  {
    return $this->templates;
  }

  /**
   * Loads a template using the given loader
   *
   * @param String $templateName Template alias
   * @return SmsTemplateInterface Template object
   */
  protected function loadTemplate($templateName)
  {
    return $this->loader->load($templateName);
  }

  /**
   * Creates an SMS for given template name and variable values
   *
   * @param SmsTemplateInterface|String $templateName Template instance or template name
   * @param array $values Variable values
   * @return Sms SMS object
   */
  public function createSms($template, $values=[])
  {
    if (!$template instanceof SmsTemplateInterface)
    {
      $template = $this->getTemplate($template);

      $this->loadTemplate($template);
    }

    return new Sms($this->engine->render($template->getText(), $values));
  }
}