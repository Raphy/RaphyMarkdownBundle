&larr; [Configuration](configuration.md) | [Index](index.md)

---

# Create a custom parser

If you want to implement another Markdown parser library, you can.

## Create the parser class

Create the file `src/AppBundle/Markdown/MyMarkdownParser` and write the following class :

```php
<?php
namespace AppBundle\Markdown;

class MyMarkdownParser implements MarkdownParserInterface
{
    function parse($string)
    {
        // The method will take as parameter the Markdown string and must return the rendered HTML
    }

}
```

## Register the parser as service

Now we have our parser, the class must be registered as service to be injected in the bundle.

Register the class as service in `services.yml` with the tag `markdown.parser`
```yaml
services:
    # ...
    my_markdown_parser:
        class: AppBundle\Markdown\MyMarkdownParser
        tags:
            - { name: markdown.parser, alias: my_markdown_parser } # The alias attribute is required, it's the parser name
    # ...
```

## Use it

Now we can use the Twig filter `markdown` with our new Markdown parser
```twig
{{ my_var | markdown('my_markdown_parser') }} {# The parser name is the alias of the service tag #}
```

---

&larr; [Configuration](configuration.md) | [Index](index.md)
