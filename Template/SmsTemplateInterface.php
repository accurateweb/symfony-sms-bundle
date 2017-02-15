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


interface SmsTemplateInterface
{
  public function getDescription();

  public function getSupportedVariables();

  /**
   * Returns SMS message text template
   *
   * @param array $variables
   * @return string
   */
  public function getText();

  /**
   * Set SMS message text template
   *
   * @param string $text
   */
  public function setText($text);
}