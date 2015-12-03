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

Register the class as service in `services.yml`
```yaml
services:
    # ...
    my_markdown_parser:
        class: AppBundle\Markdown\MyMarkdownParser
    # ...
```

## Configure the bundle

We have our parser registerd as service. Now, configure the bundle to use our parser instead the default one.

Go in the file `config.yml` and configure as following

```yml
# RaphyMarkdown configuration
raphy_markdown:
    parser: my_markdown_parser
```

The bundle will now parse the Markdown with your custom parser.

---

&larr; [Configuration](configuration.md) | [Index](index.md)
