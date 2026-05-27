# jmf/twig-icon-bundle

Symfony bundle providing a Twig `icon()` function backed by a configurable icon ID-to-CSS-class mapping.

## Requirements

- PHP 8.3+
- Symfony 7.0 or 8.0

## Installation

Install with [Composer](https://getcomposer.org):

```bash
composer require jmf/twig-icon-bundle
```

Register the bundle in `config/bundles.php` if not using Symfony Flex:

```php
<?php

return [
    // ...
    Jmf\Twig\Extension\Icon\JmfTwigIconBundle::class => ['all' => true],
];
```

## Quick Start

Create `config/packages/jmf_twig_icon.yaml` (example for a usage with Material Symbols):

```yaml
jmf_twig_icon:
    mapping:
        back:       'arrow_back'
        bookmark:   'check_box_outline_blank'
        bookmarked: 'check_box'
        create:     'add'
        delete:     'delete'
        download:   'download'
        link:       'link'
        print:      'print'
        read:       'visibility'
        save:       'save'
        search:     'search'
        swap:       'swap_horiz'
        unlink:     'link_off'
        update:     'edit'
        user:       'person'
        warning:    'warning'
        zoom_in:    'zoom_in'
```

Then use in Twig:

```twig
{{ icon('back') }}
```

## Configuration Reference

```yaml
jmf_twig_icon:

    # Optional prefix before the "icon" function name. Default: ''
    # Example: 'jmf_' registers 'jmf_icon' instead of 'icon'.
    prefix: ''

    # Twig template used to render the icon. Default: '@JmfIcon/material/icon.html.twig'
    template_path: '@JmfIcon/material/icon.html.twig'

    # Map of icon IDs to their CSS class names.
    mapping:
        back:       'arrow_back'
        bookmark:   'check_box_outline_blank'
        bookmarked: 'check_box'
        create:     'add'
        delete:     'delete'
        download:   'download'
```

A sample configuration file is available in the [`samples/`](samples/) directory.

## License

MIT
