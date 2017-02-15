<?php
/**
 * Copyright (c) 2017. Denis N. Ragozin <dragozin@accurateweb.ru>
 *
 * For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Accurateweb\SmsBundle\Template\Loader;

use Accurateweb\SmsBundle\Template\SmsTemplateInterface;

/**
 * Interface TemplateLoaderInterface
 *
 * @package Accurateweb\SmsBundle\Template\Loader
 */
interface TemplateLoaderInterface
{
  /**
   * Loads actual template text values from template source
   *
   * @param SmsTemplateInterface $template
   */
  public function load(SmsTemplateInterface $template);
}