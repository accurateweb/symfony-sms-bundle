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


use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
  public function getConfigTreeBuilder()
  {
    $treeBuilder = new TreeBuilder();

    $rootNode = $treeBuilder->root('aw_sms');

    $rootNode
      ->children()
        ->arrayNode('sms_templates')
          ->prototype('array')
            ->children()
              ->scalarNode('alias')->end()
              ->scalarNode('description')->end()
              ->arrayNode('variables')
                ->prototype('array')
                  ->children()
                    ->scalarNode('description')->end()
                  ->end()
                ->end()
              ->end()
              ->arrayNode('defaults')
                ->children()
                  ->scalarNode('text')->end()
                ->end()
              ->end()
            ->end()
          ->end()
        ->end()
      ->end();

    return $treeBuilder;
  }

}