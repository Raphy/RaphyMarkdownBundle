&larr; [Basic usage](basic-usage.md) | [Index](index.md) | [Create a custom parser](custom-parser.md) &rarr;

---

# Configuration

By default, the bundle does not need any configuration, but you can customize the bundle with the configuration.
To change the behaviour of the bundle, configure it in `config.yml`.

```yml
# RaphyMarkdown configuration
raphy_markdown:
    # The bundle configuration goes here
```

## The parser

The bundle use the library [Parsedown](https://github.com/erusev/parsedown) as default Markdown parser.

The default configuration is :

```yml
# RaphyMarkdown configuration
raphy_markdown:
    parser: raphy_markdown.parser.parsedown # A default service in the bundle
```

To use another parser, just give the service name

```yml
# RaphyMarkdown configuration
raphy_markdown:
    parser: my_markdown_parser
```

Check out [Create a custom parser](custom-parser.md) documentation page for more details on how to create a custom
parser to implement it in the bundle.

---

&larr; [Basic usage](basic-usage.md) | [Index](index.md) | [Create a custom parser](custom-parser.md) &rarr;
