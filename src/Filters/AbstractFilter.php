<?php

namespace ElfSundae\Image\Filters;

use Exception;
use Intervention\Image\Filters\FilterInterface;
use InvalidArgumentException;

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
     * @throws \InvalidArgumentException
     */
    public function __call($name, $parameters)
    {
        if (! property_exists($this, $name)) {
            throw new Exception('Call to undefined method '.get_class($this)."::{$name}()");
        }
        if (! $parameters) {
            throw new InvalidArgumentException(get_class($this)."::{$name}() expects 1 argument, 0 given");
        }

        $this->$name = reset($parameters);

        return $this;
    }
}
