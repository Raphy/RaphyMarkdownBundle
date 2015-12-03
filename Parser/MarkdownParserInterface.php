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

/**
 * Interface MarkdownParserInterface.
 *
 * @author Raphael De Freitas <raphael@de-freitas.net>
 */
interface MarkdownParserInterface
{
    /**
     * Parse a given Markdown string into a HTML string.
     *
     * @param string $string The Markdown string
     *
     * @return string The rendered HTML
     */
    public function parse($string);

    /**
     * Gets the parser name.
     *
     * @return string
     */
    public function getName();
}
