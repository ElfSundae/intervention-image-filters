# Intervention Image Filters

[![Latest Version on Packagist](https://img.shields.io/packagist/v/elfsundae/intervention-image-filters.svg?style=flat-square)](https://packagist.org/packages/elfsundae/intervention-image-filters)

Filters for [`intervention/image`](https://github.com/Intervention/image) .

## Installation

```sh
$ composer require elfsundae/intervention-image-filters
```

## Usage

```php
use Image;
use ElfSundae\Image\Filters\Resize;

$image = Image::make($file)
    ->filter((new Resize)->width(860))
    ->save($path);
```

## License

This package is open-sourced software licensed under the [MIT License](LICENSE.md).
