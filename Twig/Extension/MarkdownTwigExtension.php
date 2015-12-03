<?php

/*
 * This file is part of the RaphyMarkdownBundle package.
 *
 * (c) Raphael De Freitas <raphael@de-freitas.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Raphy\Symfony\MarkdownBundle\Twig\Extension;

use Raphy\Symfony\MarkdownBundle\Parser\ParserCollection;

/**
 * Class MarkdownTwigExtension.
 *
 * @author Raphael De Freitas <raphael@de-freitas.net>
 */
class MarkdownTwigExtension extends \Twig_Extension
{
    /**
     * Contains a the collection of parsers.
     *
     * @var ParserCollection
     */
    private $parserCollection;

    /**
     * Constructor.
     *
     * @param ParserCollection $parserCollection The collection of parsers
     */
    public function __construct(ParserCollection $parserCollection)
    {
        $this->parserCollection = $parserCollection;
    }

    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('markdown', [$this, 'markdownFilter'], ['is_safe' => ['html']]),
        );
    }

    /**
     * Render the filter makrdown.
     *
     * @param string $input      The input content to parse
     * @param string $parserName The parser name/alias
     *
     * @return string The rendered HTML
     */
    public function markdownFilter($input, $parserName = 'default')
    {
        $parser = $this->parserCollection->getParser($parserName);

        return $parser->parse($input);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'markdown';
    }
}
