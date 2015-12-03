<?php

/*
 * This file is part of the RaphyMarkdownBundle package.
 *
 * (c) Raphael De Freitas <raphael@de-freitas.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Raphy\Symfony\MarkdownBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class ParserPass.
 *
 * @author Raphael De Freitas <raphael@de-freitas.net>
 */
class ParserPass implements CompilerPassInterface
{
    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->has('raphy_markdown.parser.collection')) {
            return;
        }
        $collectionDefinition = $container->findDefinition('raphy_markdown.parser.collection');
        $taggedServices = $container->findTaggedServiceIds('markdown.parser');
        foreach ($taggedServices as $serviceId => $tags) {
            var_dump($serviceId);
            $serviceDefition = $container->getDefinition($serviceId);
            if (!$serviceDefition->isPublic()) {
                throw new \InvalidArgumentException(sprintf('The service "%s" must be public as markdown parser extensions are lazy-loaded.', $serviceId));
            }
            foreach ($tags as $attributes) {
                if (!array_key_exists('alias', $attributes)) {
                    throw new \InvalidArgumentException(sprintf('The service "%s" must have the "alias" attribute.', $serviceId));
                }
                $collectionDefinition->addMethodCall('addParserService', [$attributes['alias'], $serviceId]);
            }
        }
    }
}
