<?php

declare(strict_types=1);

namespace SolutionDrive\SyliusLastSeenProductsPlugin\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

final class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('solution_drive_sylius_last_seen_products_plugin');

        return $treeBuilder;
    }
}
