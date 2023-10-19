<?php

namespace Database\Factories;

use App\Models\MeliItem;
use App\Repositories\Datas\Enums\StatusMeliItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<MeliItem>
 */
class MeliItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'item_id' => vsprintf('MLB%u', [$this->faker->numerify('##########')]),
            'title' => $this->faker->realText(70),
        ];
    }

    /**
     * Indicate that the item is in process.
     */
    public function in_process(): Factory
    {
        return $this->state(function () {
            return [
                'status' => StatusMeliItem::in_process,
            ];
        });
    }

    /**
     * Indicate that the item is processed.
     */
    public function processed(): Factory
    {
        return $this->state(function () {
            return [
                'status' => StatusMeliItem::processed,
            ];
        });
    }
}
