<?php

namespace ElfSundae\InterventionImage\Filters;

use Exception;
use Intervention\Image\Filters\FilterInterface;

abstract class AbstractFilter implements FilterInterface
{
    /**
     * Handle dynamic method calls to set properties.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return $this
     *
     * @throws \Exception
     */
    public function __call($method, $parameters)
    {
        if (property_exists($this, $method) && ! empty($parameters)) {
            $this->{$method} = $parameters[0];

            return $this;
        }

        throw new Exception('Call to undefined method '.get_class($this)."::{$method}()");
    }
}
