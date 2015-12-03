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

---

&larr; [Installation](installation.md) | [Index](index.md) | [Configuration](configuration.md) &rarr;
