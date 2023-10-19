<?php

namespace Api\Meli;

use Tests\TestCase;
use Database\Factories\MeliItemFactory;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Repositories\Contracts\MeliItemRepository;

class ItemListTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    private int $limitMeliItemTable = MeliItemRepository::TABLE_LIMIT;

    public function test_get_all_items(): void
    {
        $this->app->make(MeliItemFactory::class)
            ->in_process()
            ->count($this->limitMeliItemTable)
            ->create();

        $response = $this->getJson(route('api.meli.item_list'));

        $response
            ->assertJsonIsArray('data')
            ->assertJsonCount($this->limitMeliItemTable, 'data')
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'item_id',
                        'title',
                        'status',
                        'visits',
                        'updated',
                        'deleted_at'
                    ]
                ]
            ]);
    }

    public function test_get_empty_table(): void
    {
        $response = $this->getJson(route('api.meli.item_list'));

        $response
            // ->dump()
            ->assertJsonIsArray('data')
            ->assertJsonCount(0, 'data')
            ->assertJsonStructure([
                'data' => [
                    '*' => []
                ]
            ])
        ->assertExactJson([
            'data' => []
        ]);
    }
}
