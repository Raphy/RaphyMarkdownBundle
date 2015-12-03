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
 * Class ParsedownParser.
 *
 * @author Raphael De Freitas <raphael@de-freitas.net>
 */
class ParsedownParser extends \Parsedown implements MarkdownParserInterface
{
    /**
     * {@inheritdoc}
     */
    public function parse($string)
    {
        return $this->text($string);
    }
}
