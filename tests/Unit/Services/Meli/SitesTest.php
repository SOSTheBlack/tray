<?php

namespace Services\Meli;

use Tests\TestCase;
use ReflectionException;
use App\Services\Meli\Meli;
use App\Services\Meli\Sites\Sites;
use Tests\ReflectionHelper;

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

        $this->meli = new Meli();
    }

    /**
     * @throws ReflectionException
     */
    public function test_define_site_id_default()
    {
        $sites = new Sites($this->meli);
        $this->assertEquals(config('services.meli.site_id'), ReflectionHelper::getProperty($sites, 'siteId'));
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
