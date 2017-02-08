<?php
/**
 * Copyright (c) 2017. Denis N. Ragozin <dragozin@accurateweb.ru>
 *
 * For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 */

/**
 * @author Denis N. Ragozin <dragozin@accurateweb.ru>
 */

namespace Accurateweb\SmsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class AccuratewebSmsExtension extends Extension
{
  public function load(array $config, ContainerBuilder $container)
  {
    $configuration = new Configuration();
    $_config = $this->processConfiguration($configuration, $config);

    $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));

    $loader->load('sms_templates.yml');
    $loader->load('services.yml');

    $definition = $container->getDefinition('aw_sms.template.factory');
    foreach ($_config['sms_templates'] as $name => $configuration)
    {
      $definition->addMethodCall('setTemplate', array($name, $configuration));
    }
  }

  public function getAlias()
  {
    return 'aw_sms';
  }
}