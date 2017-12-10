<?php

namespace ElfSundae\Image\Filters;

use Exception;
use Intervention\Image\Filters\FilterInterface;

abstract class AbstractFilter implements FilterInterface
{
    /**
     * Handle dynamic method calls to set properties.
     *
     * @param  string  $name
     * @param  array  $parameters
     * @return $this
     *
     * @throws \Exception
     */
    public function __call($name, $parameters)
    {
        if ($parameters && property_exists($this, $name)) {
            $this->$name = reset($parameters);

            return $this;
        }

        throw new Exception('Call to undefined method '.get_class($this)."::{$method}()");
    }
}
