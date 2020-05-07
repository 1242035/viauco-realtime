<?php 
namespace Viauco\Realtime\Tests;

use Viauco\Realtime\Tests\Stubs\Models\User;
use Illuminate\Database\Eloquent\Factory as ModelFactory;
use Orchestra\Testbench\TestCase as BaseTestCase;

/**
 * Class     TestCase
 *
 * @package  Viauco\Realtime\Tests
 */
abstract class TestCase extends BaseTestCase
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /** @var  \Illuminate\Database\Eloquent\Factory */
    protected $factory;

    /** @var  \Illuminate\Database\Eloquent\Collection */
    protected $users;

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    public function setUp(): void
    {
        parent::setUp();

        $this->migrate();
        $this->loadFactories();
        $this->seedTables();
    }

    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            \Viauco\Realtime\ServiceProvider::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application   $app
     */
    protected function getEnvironmentSetUp($app)
    {
        // Laravel App Configs
        $app['config']->set('auth.model', Stubs\Models\User::class);

        // Laravel Realtime Configs
        $app['config']->set('websockets.users.model', Stubs\Models\User::class);
    }

    /**
     * Load Model Factories.
     */
    private function loadFactories()
    {
        $this->factory = $this->app->make(ModelFactory::class);
        $this->factory->load(__DIR__.'/fixtures/factories');
    }

    /**
     * Migrate the tables.
     */
    protected function migrate()
    {
        $this->loadMigrationsFrom(realpath(__DIR__.'/../database/migrations'));
        $this->loadMigrationsFrom(realpath(__DIR__.'/fixtures/migrations'));
    }

    /**
     * Seed the tables.
     */
    private function seedTables()
    {
        $this->users = $this->factory->of(User::class)->times(3)->create();
    }
}
