<?php

namespace Ybert\ImagifyBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree builder.
     *
     * @return TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('ybert_imagify');
        $rootNode
            ->children()
            ->scalarNode('apiKey')->isRequired()->cannotBeEmpty()->end()
            ->end()
        ;
        return $treeBuilder;
    }
}