<?php

namespace ElfSundae\Image\Filters;

use Intervention\Image\Image;

/**
 * @method $this width(int|null $width)
 * @method $this height(int|null $height)
 * @method $this aspectRatio(bool $aspectRatio)
 * @method $this upsize(bool $upsize)
 *
 * @see https://image.intervention.io/v2/api/resize
 */
class Resize extends AbstractFilter
{
    /**
     * The new width of the image.
     *
     * @var int|null
     */
    protected $width;

    /**
     * The new height of the image.
     *
     * @var int|null
     */
    protected $height;

    /**
     * Indicates whether constrainting the current aspect-ratio of the image.
     *
     * @var bool
     */
    protected $aspectRatio = true;

    /**
     * Indicates whether keeping the image from being upsized.
     *
     * @var bool
     */
    protected $upsize = true;

    /**
     * Creates new instance of Resize filter.
     *
     * @param  int|null  $width
     * @param  int|null  $height
     * @param  bool  $aspectRatio
     */
    public function __construct($width, $height, $aspectRatio = true)
    {
        $this->width = $width;
        $this->height = $height;
        $this->aspectRatio = $aspectRatio;
    }

    /**
     * Applies filter to the given image.
     *
     * @param  \Intervention\Image\Image  $image
     * @return \Intervention\Image\Image
     */
    public function applyFilter(Image $image)
    {
        return $image->orientate()->resize($this->width, $this->height, function ($constraint) {
            $this->constraint($constraint);
        });
    }

    /**
     * Constraints the filter.
     *
     * @param  \Intervention\Image\Constraint  $constraint
     * @return void
     */
    protected function constraint($constraint)
    {
        if ($this->aspectRatio) {
            $constraint->aspectRatio();
        }

        if ($this->upsize) {
            $constraint->upsize();
        }
    }
}
