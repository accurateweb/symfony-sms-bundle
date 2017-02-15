<?php
/**
 * Copyright (c) 2017. Denis N. Ragozin <dragozin@accurateweb.ru>
 *
 * For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 */

/**
 * @author Denis N. Ragozin <dragozin@accurateweb.ru>
 */

namespace Accurateweb\SmsBundle\Template;

class SmsTemplate implements SmsTemplateInterface
{
  private $alias,
          $variables,
          $textTemplate,
          $description = null;

  function __construct($alias, $description, $textTemplate, $variables = array())
  {
    $this->alias = $alias;
    $this->description = $description;
    $this->textTemplate = $textTemplate;
    $this->variables = $variables;
  }

  public function getAlias()
  {
    return $this->alias;
  }

  public function getText()
  {
    return $this->textTemplate;
  }

  public function setText($v)
  {
    $this->textTemplate = $v;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function getValue($variable, $values, $defaultValue=null)
  {
    return isset($values[$variable]) ? $values[$variable] : $defaultValue;
  }

  public function getVariables()
  {
    return $this->variables;
  }

  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function getSupportedVariables()
  {
    return $this->getVariables();
  }
}