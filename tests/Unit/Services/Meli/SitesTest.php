<?php

namespace Services\Meli;

use Tests\TestCase;
use ReflectionException;
use Tests\ReflectionHelper;
use App\Services\Meli\Resources\Sites\Sites;
use App\Services\Meli\Contracts\MeliServices;

class SitesTest extends TestCase
{
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

    /**
     * @throws ReflectionException
     */
    public function test_define_site_id_default()
    {
        $site_id = config('services.meli.site_id');

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
}
