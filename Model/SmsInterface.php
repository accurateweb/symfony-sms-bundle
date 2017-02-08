<?php
/**
 * Copyright (c) 2017. Denis N. Ragozin <dragozin@accurateweb.ru>
 *
 * For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Accurateweb\SmsBundle\Model;

/**
 * @author Denis N. Ragozin <dragozin@accurateweb.ru>
 */

interface SmsInterface
{
  public function getRecipient();

  public function getText();
}