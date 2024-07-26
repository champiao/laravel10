<?php

namespace \App\Http\kernel;

class kernel
{
    /**
     * Create a new class instance.
     */
   protected $middlewere = [
    \Fruitcake\Cors\HandleCors::class,
   ];
}
