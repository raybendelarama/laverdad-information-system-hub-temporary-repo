<?php

namespace App\Services;

class SystemsService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getSystems()
    {
        $systems = json_decode(file_get_contents(base_path('public/data/systems.json')), true);

        return $systems;
    }
}
