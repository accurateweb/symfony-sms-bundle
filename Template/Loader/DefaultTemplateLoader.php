<?php
/**
 * Copyright (c) 2017. Denis N. Ragozin <dragozin@accurateweb.ru>
 *
 * For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 */

/**
 * @author Denis N. Ragozin <dragozin@accurateweb.ru>
 */

namespace Accurateweb\SmsBundle\Template\Loader;


use Accurateweb\SmsBundle\Template\SmsTemplateInterface;

class DefaultTemplateLoader implements TemplateLoaderInterface
{
  /**
   * @param SmsTemplateInterface $template
   */
  public function load(SmsTemplateInterface $template)
  {
    //This preserves the default values, so nothing to do.
  }
}