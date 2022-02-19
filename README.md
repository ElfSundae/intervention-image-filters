# Intervention Image Filters

[![Latest Version on Packagist](https://img.shields.io/packagist/v/elfsundae/intervention-image-filters.svg?style=flat-square)](https://packagist.org/packages/elfsundae/intervention-image-filters)

Filters for [`intervention/image`](https://github.com/Intervention/image) .

## Installation

```sh
$ composer require elfsundae/intervention-image-filters
```

## Usage

```php
use Intervention\Image\ImageManager as Image;
// use Intervention\Image\Facades\Image; // For Laravel
use ElfSundae\Image\Filters\Fit;
use ElfSundae\Image\Filters\Resize;

$image = Image::make($file)
    ->filter(new Resize(300, 400))
    ->save($path);

$image->filter(new Fit(320));
$image->filter(new Fit(320, 400, 'top-left'));
$image->filter(new Fit(320)->upsize(false));

$image->filter(new Resize(300, 600, $aspectRatio = false));
$image->filter(new Resize(300, 600)->aspectRatio(false)->upsize(false));
```

## License

This package is open-sourced software licensed under the [MIT License](LICENSE.md).
