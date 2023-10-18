<?php

namespace App\Repositories\Transformers;

use App\Models\MeliItem;
use League\Fractal\TransformerAbstract;

/**
 * Class MeliUserTransformer.
 */
class MeliItemTransformer extends TransformerAbstract
{
    /**
     * Transform the MeliUser entity.
     *
     * @param  MeliItem  $meliUser
     *
     * @return array
     */
    public function transform(MeliItem $meliUser): array
    {
        return [
            'id'     => $meliUser->id,
            'item_id' => $meliUser->item_id,
            'title' => $meliUser->title,
            'status' => $meliUser->status,
            'visits' => $meliUser->visits,
            'updated' => $meliUser->updated->toDateString(),
            'deleted_at' => $meliUser->deleted_at?->toAtomString()
        ];
    }
}
