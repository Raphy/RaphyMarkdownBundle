<?php

/*
 * This file is part of the RaphyMarkdownBundle package.
 *
 * (c) Raphael De Freitas <raphael@de-freitas.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Raphy\Symfony\MarkdownBundle\Parser;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class ParserCollection.
 *
 * @author Raphael De Freitas <raphael@de-freitas.net>
 */
class ParserCollection implements ContainerAwareInterface
{
    /**
     * Contains the Markdown parser services.
     *
     * @var ArrayCollection
     */
    private $parserServices;

    /**
     * Contains the ContainerInterface instance.
     *
     * @var ContainerInterface
     */
    private $container;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->parserServices = new ArrayCollection();
    }

    /**
     * Adds a parser service to collection.
     *
     * @param string $alias     The parser name/alias
     * @param string $serviceId The parser service ID
     */
    public function addParserService($alias, $serviceId)
    {
        $this->parserServices[$alias] = $serviceId;
    }

    /**
     * Gets a MarkdownParserInterface of the specified name/alias.
     *
     * @param string $alias The parser name/alias
     *
     * @return MarkdownParserInterface
     */
    public function getParser($alias)
    {
        if ($this->container === null || !$this->parserServices->containsKey($alias)) {
            throw new \InvalidArgumentException(sprintf('The Markdown parser "%s" is not found.', $alias));
        }
        $parser = $this->container->get($this->parserServices->get($alias));
        if (!$parser instanceof MarkdownParserInterface) {
            throw new \InvalidArgumentException(sprintf('The Markdown parser "%s" not implements "MarkdownParserInterface".', $alias));
        }

        return $parser;
    }

    /**
     * {@inheritdoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}
