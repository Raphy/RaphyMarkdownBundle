[Index](index.md) | [Basic usage](basic-usage.md) &rarr;

---

# Installation

## Installation with [Composer](https://getcomposer.org/)

The package is available on [Packagist](https://packagist.org/) as [raphy/markdown-bundle](https://packagist.org/raphy/markdown-bundle)
and can be installed using [Composer](https://getcomposer.org/).

### Quick install

To install the package on the lasted stable version, use the command:

```bash
composer update raphy/markdown-bundle @stable
```

### Adding the dependency in `composer.json`

You can add the dependency in your `composer.json` as following:
```js
{
    // ...
    "require" : {
        // ...
        "raphy/markdown-bundle": "@stable"
        // ...
    }
    // ...
}
```

## Register the bundle

Register the bundle in `AppKernel.php`:

```php
public function registerBundles()
{
    // ...
    $bundles = array(
        // ...
        new \Raphy\Symfony\MarkdownBundle\RaphyMarkdownBundle(),
        // ...
    );
    // ...
}
```

Note: When using Symfony Flex, the bundle will automatically be registered.

---

[Index](index.md) | [Basic usage](basic-usage.md) &rarr;
