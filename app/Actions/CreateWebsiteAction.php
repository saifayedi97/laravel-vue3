<?php

namespace App\Actions;

use App\Models\Website;

class CreateWebsiteAction
{
    public static function execute(array $data) {
        return Website::create($data);
    }
}
