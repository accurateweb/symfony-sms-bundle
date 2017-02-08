<?php
/**
 * Copyright (c) 2017. Denis N. Ragozin <dragozin@accurateweb.ru>
 *
 * For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 */

/**
 * @author Denis N. Ragozin <dragozin@accurateweb.ru>
 */

namespace Accurateweb\SmsBundle\Model;


class Sms implements SmsInterface
{
  private $recipient;

  private $text;

  public function __construct($text, $recipient=null)
  {
    $this->text = $text;
    $this->recipient = $recipient;
  }

  public function getRecipient()
  {
    return $this->recipient;
  }

  public function getText()
  {
    return $this->text;
  }
}