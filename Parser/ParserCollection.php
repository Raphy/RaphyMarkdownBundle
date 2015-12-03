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

/**
 * Class ParserCollection.
 *
 * @author Raphael De Freitas <raphael@de-freitas.net>
 */
class ParserCollection
{
    /**
     * Contains the Markdown parser services.
     *
     * @var ArrayCollection
     */
    private $parsers;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->parsers = new ArrayCollection();
    }

    /**
     * Adds a parser to collection.
     *
     * @param string                  $name   The parser name
     * @param MarkdownParserInterface $parser The MarkdownParserInterface instance
     */
    public function addParser($name, MarkdownParserInterface $parser)
    {
        $this->parsers[$name] = $parser;
    }

    /**
     * Checks whether a parser is in collection.
     *
     * @param string $name
     *
     * @return bool
     */
    public function hasParser($name)
    {
        return $this->parsers->containsKey($name);
    }

    /**
     * Gets a MarkdownParserInterface of the specified name/alias.
     *
     * @param string $name The parser name
     *
     * @return MarkdownParserInterface
     */
    public function getParser($name)
    {
        if ($this->hasParser($name) === false) {
            throw new \InvalidArgumentException(sprintf('The Markdown parser "%s" is not found.', $name));
        }

        return $this->parsers->get($name);
    }

    /**
     * Removes a parser from collection.
     *
     * @param string $name
     *
     * @return MarkdownParserInterface|null
     */
    public function removeParser($name)
    {
        return $this->parsers->remove($name);
    }

    /**
     * Gets the parsers collection.
     *
     * @return ArrayCollection
     */
    public function getParsers()
    {
        return $this->parsers;
    }
}
