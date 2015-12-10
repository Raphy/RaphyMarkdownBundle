&larr; [Installation](installation.md) | [Index](index.md) | [Configuration](configuration.md) &rarr;

---

# Basic usage

## The Twig filter

### With the default parser

When you want to render a Markdown string, use the filter `markdown`

```twig
{{ my_var | markdown }}
```

### With a specified parser

```twig
{{ my_var | markdown('parsedown') }}
```

## The WYSIWYG editor

The editor uses the editor [SimpleMDE](https://github.com/NextStepWebs/simplemde-markdown-editor).

To use the editor with Symfony forms:

```php
$builder->add('field', 'markdown');
```

---

&larr; [Installation](installation.md) | [Index](index.md) | [Configuration](configuration.md) &rarr;
