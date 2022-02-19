<?php

namespace ElfSundae\Image\Filters;

use Intervention\Image\Image;

class Fit extends AbstractFilter
{
    /**
     * The width the image will be resized to after cropping out
     * the best fitting aspect ratio.
     *
     * @var int
     */
    protected $width;

    /**
     * The height the image will be resized to after cropping out
     * the best fitting aspect ratio. If no height is given, method
     * will use same value as width.
     *
     * @var int|null
     */
    protected $height;

    /**
     * The position where cutout will be positioned.
     *
     * @see https://image.intervention.io/v2/api/fit
     *
     * @var string
     */
    protected $position = 'center';

    /**
     * Determines whether keeping the image from being upsized.
     *
     * @var bool
     */
    protected $upsize = true;

    /**
     * Creates new instance of Fit filter.
     *
     * @param  int  $width
     * @param  int|null  $height
     * @param  string  $position
     */
    public function __construct($width, $height = null, $position = 'center')
    {
        $this->width = $width;
        $this->height = $height;
        $this->position = $position;
    }

    /**
     * Applies filter to the given image.
     *
     * @param  \Intervention\Image\Image  $image
     * @return \Intervention\Image\Image
     */
    public function applyFilter(Image $image)
    {
        return $image->orientate()->fit($this->width, $this->height, function ($constraint) {
            $this->constraint($constraint);
        }, $this->position);
    }

    /**
     * Constraints the filter.
     *
     * @param  \Intervention\Image\Constraint  $constraint
     * @return void
     */
    protected function constraint($constraint)
    {
        if ($this->upsize) {
            $constraint->upsize();
        }
    }
}
