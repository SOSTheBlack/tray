<?php

namespace Services\Meli;

use Mockery;
use Tests\TestCase;
use ReflectionException;
use Mockery\MockInterface;
use Tests\ReflectionHelper;
use Illuminate\Support\Facades\Http;
use Spatie\LaravelData\DataCollection;
use App\Services\Meli\Resources\Sites\Sites;
use Illuminate\Foundation\Testing\WithFaker;
use App\Services\Meli\Contracts\MeliServices;
use App\Services\Meli\Data\Sites\SearchResults;
use App\Services\Meli\Exceptions\SitesException;

class SitesTest extends TestCase
{
    use WithFaker;

    private MeliServices $meli;

    /**
     * @throws ReflectionException
     */
    public function test_define_site_id_default()
    {
        $site_id = config('services.mercadolibre.site_id');

        $sites = new Sites($this->meli);
        $this->assertEquals($site_id, ReflectionHelper::getProperty($sites, 'siteId'));
    }

    /**
     * @throws ReflectionException
     */
    public function test_define_site_id_customized()
    {
        $site_id = 'MLA';

        $sites = new Sites($this->meli, $site_id);
        $this->assertEquals($site_id, ReflectionHelper::getProperty($sites, 'siteId'));
    }

    /**
     * @throws SitesException
     */
    public function test_searching_items()
    {
        $limit = 5;
        Http::fake([
            'api.mercadolibre.com/*' => Http::response([
                'results' => [
                    ['id' => $this->faker->uuid(), 'title' => $this->faker->title],
                    ['id' => $this->faker->uuid(), 'title' => $this->faker->title],
                    ['id' => $this->faker->uuid(), 'title' => $this->faker->title],
                    ['id' => $this->faker->uuid(), 'title' => $this->faker->title],
                    ['id' => $this->faker->uuid(), 'title' => $this->faker->title],
                ]
            ])
        ]);

        // $this->instance(
        //     Sites::class,
        //     Mockery::mock(Sites::class, function (MockInterface $mock) {
        //         $mock->shouldReceive('search')->once();
        //     })
        // );

        $response = $this->meli->sites()->search([
            'q'     => $this->faker->title,
            'limit' => $limit
        ]);

        $this->assertInstanceOf(DataCollection::class, $response);
        $this->assertIsArray($response->items());
        $this->assertEquals($limit, $response->count());

        foreach ($response->items() as $item) {
            $this->assertInstanceOf(SearchResults::class, $item);
            $this->assertIsString($item->id);
            $this->assertIsString($item->title);
        }
    }

    /**
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->meli = $this->app->make(MeliServices::class);
    }
}
