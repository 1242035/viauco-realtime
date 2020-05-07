<?php 
namespace Viauco\Realtime;


use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;
use Illuminate\Support\Facades\Broadcast;
/**
 * Class     ServiceProvider
 *
 * @package  Viauco\Base
 */
class ServiceProvider extends IlluminateServiceProvider
{
    
    protected $defer = true;

    public function boot()
    {
        $this->loadRoute();
        $this->publish();
    }
    
    public function register()
    {
       
        parent::register();

        $this->registerSocket();
    
    }

    protected function registerSocket()
    {
        $this->app->register(\BeyondCode\LaravelWebSockets\WebSocketsServiceProvider::class);
        $this->app->singleton('websockets.router', function () {
            return new \BeyondCode\LaravelWebSockets\Server\Router();
        });
    }

    private function loadRoute()
    {
        Broadcast::routes( ['middleware' => config('websockets.middleware')]);
        $this->loadRoutesFrom(__DIR__ . '/../routes/channels.php');
        $this->loadRoutesFrom(__DIR__ . '/../routes/routes.php');
    }

    private function publish()
    {
        $this->publishes([
            __DIR__ . '/../config/websockets.php' => config_path('websockets.php'),
        ]);
    }
}