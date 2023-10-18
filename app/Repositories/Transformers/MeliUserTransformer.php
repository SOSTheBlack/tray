<?php

namespace App\Repositories\Transformers;

use App\Models\MeliUser;
use League\Fractal\TransformerAbstract;

/**
 * Class MeliUserTransformer.
 */
class MeliUserTransformer extends TransformerAbstract
{
    /**
     * Transform the MeliUser entity.
     *
     * @param  MeliUser  $meliUser
     *
     * @return array
     */
    public function transform(MeliUser $meliUser): array
    {
        return [
            'id'     => $meliUser->id,
            'ref_id' => $meliUser->ref_id,
            'nickname' => $meliUser->nickname,
            'access_token' => $meliUser->access_token,
            'refresh_token' => $meliUser->refresh_token,
            'created_at' => $meliUser->created_at->toAtomString(),
            'updated_at' => $meliUser->updated_at->toAtomString()
        ];
    }
}
