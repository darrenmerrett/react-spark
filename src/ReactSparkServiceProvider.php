<?php namespace darrenmerrett\ReactSpark;

use Illuminate\Support\ServiceProvider;

use Illuminate\Contracts\Http\Kernel;

class ReactSparkServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Kernel $kernel)
    {
    
        $this->publishes([
    
            __DIR__.'/resources/views/react-spark/' => base_path('resources/views/react-spark/'),
            
        ]);

        $this->publishes([
    
            __DIR__.'/resources/assets/js/reactApp/' => base_path('resources/assets/js/reactApp/'),
            
        ]);

        $this->loadViewsFrom(__DIR__.'/resources/views/vendor', 'react-spark-vendor');     

        $this->loadViewsFrom(base_path('resources/views/react-spark'), 'react-spark');     

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        $this->commands([

            app\Console\Commands\build::class

        ]);

    }
    
}
