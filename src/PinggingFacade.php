<?php

namespace Basalam\Pingging;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Basalam\Pingging\Skeleton\SkeletonClass
 */
class PinggingFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'pingging';
    }
}
