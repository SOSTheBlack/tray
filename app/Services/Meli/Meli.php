<?php

namespace App\Services\Meli;

use App\Services\Meli\Sites\Sites;

class Meli
{
    public function sites(?string $site = null): Sites
    {
        return new Sites($this, $site);
    }
}
