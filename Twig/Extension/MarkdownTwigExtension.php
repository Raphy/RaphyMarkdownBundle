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

use Raphy\Symfony\MarkdownBundle\Parser\MarkdownParserInterface;

/**
 * Class MarkdownTwigExtension.
 *
 * @author Raphael De Freitas <raphael@de-freitas.net>
 */
class MarkdownTwigExtension extends \Twig_Extension
{
    /**
     * Contains a MarkdownParserInterface instance.
     *
     * @var MarkdownParserInterface
     */
    private $markdownParser;

    /**
     * Constructor.
     *
     * @param MarkdownParserInterface $markdownParser A MarkdownParserInterface instance
     */
    public function __construct(MarkdownParserInterface $markdownParser)
    {
        $this->markdownParser = $markdownParser;
    }

    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('markdown', array($this->markdownParser, 'parse'), array('is_safe' => array('html'))),
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'markdown';
    }
}
