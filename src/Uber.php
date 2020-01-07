<?php


namespace Collinped\Uber;


class Uber
{

    public function __construct()
    {
        //
    }

    /**
     * Indicates if Uber routes will be registered.
     *
     * @var bool
     */
    public static $registersRoutes = true;

    /**
     * Configure Uber to not register its routes.
     *
     * @return static
     */
    public static function ignoreRoutes()
    {
        static::$registersRoutes = false;
        return new static;
    }
}
