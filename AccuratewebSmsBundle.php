<?php
/**
 * Copyright (c) 2017. Denis N. Ragozin <dragozin@accurateweb.ru>
 *
 * For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 */


namespace Accurateweb\SmsBundle;

use Accurateweb\SmsBundle\DependencyInjection\AccuratewebSmsExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * @author Denis N. Ragozin <dragozin@accurateweb.ru>
 */
class AccuratewebSmsBundle extends Bundle
{
  public function getContainerExtension()
  {
    if (null === $this->extension) {
      $this->extension = new AccuratewebSmsExtension();
    }
    return $this->extension;
  }
}