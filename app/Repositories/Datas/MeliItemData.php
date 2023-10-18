<?php

namespace App\Repositories\Datas;

use DateTime;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Spatie\LaravelData\Data;
use App\Repositories\Datas\Enums\StatusMeliItem;

class MeliItemData extends Data
{
    public int $id;

    public string $item_id;


    public string $title;

    public ?StatusMeliItem $status;

    public ?int $visits;

    public string $updated;

    public ?Carbon $deleted_at;
}
