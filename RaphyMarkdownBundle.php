<?php

/*
 * This file is part of the RaphyMarkdownBundle package.
 *
 * (c) Raphael De Freitas <raphael@de-freitas.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Raphy\Symfony\MarkdownBundle;

use Raphy\Symfony\MarkdownBundle\DependencyInjection\Compiler\ParserCompilerPass;
use Raphy\Symfony\MarkdownBundle\DependencyInjection\Compiler\ResourceCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class RaphyMarkdownBundle.
 *
 * @author Raphael De Freitas <raphael@de-freitas.net>
 */
class RaphyMarkdownBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new ParserCompilerPass());
        $container->addCompilerPass(new ResourceCompilerPass());
    }
}
