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
 * Class ResourceCompilerPass.
 *
 * @author Raphael De Freitas <raphael@de-freitas.net>
 */
class ResourceCompilerPass implements CompilerPassInterface
{
    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        $templatingEngines = $container->hasParameter('templating.engines')
            ? $container->getParameter('templating.engines')
            : [];

        if (in_array('twig', $templatingEngines)) {
            $container->setParameter('twig.form.resources', array_merge(
                $this->getTwigFormResources($container),
                array('RaphyMarkdownBundle:Form:markdown_widget.html.twig')
            ));
        }
    }

    private function getTwigFormResources(ContainerBuilder $container)
    {
        if (!$container->hasParameter('twig.form.resources')) {
            return [];
        }

        return $container->getParameter('twig.form.resources');
    }
}
