<?php
namespace Lifeibest\LaravelPm;

use Encore\Admin\Admin;
use Encore\Admin\Auth\Database\Menu;
use Encore\Admin\Auth\Database\Permission;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class PmServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $commands = [
        'Lifeibest\LaravelPm\Console\TaskCommand',
    ];

    /**
     * {@inheritdoc}
     */
    public function boot()
    {

        $this->registerRoutes();
        $this->registerResources();
        $this->definePublishing();

        //$this->registerCommands();

        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        }
        Admin::extend('pm', __CLASS__);

        //DeployExtension::boot();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->commands($this->commands);
    }

    /**
     * Register the   manager routes.
     *
     * @return void
     */
    protected function registerRoutes()
    {
        Route::group([
            'prefix' => 'admin',
            'namespace' => 'Lifeibest\LaravelPm\Admin\Http\Controllers',
            'middleware' => config('pm.admin_middleware', ['web', 'admin']),
        ], function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/admin.php');
        });

        Route::group([
            'prefix' => config('pm.base_path', 'pm'),
            'namespace' => 'Lifeibest\LaravelPm\Http\Controllers',
            'middleware' => config('pm.middleware', 'web'),
        ], function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        });
    }
    /**
     * Register the   manager resources.
     *
     * @return void
     */
    protected function registerResources()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'pm');
    }
    /**
     * Define the publishing.
     *
     * @return void
     */
    public function definePublishing()
    {

        $this->publishes([
            __DIR__ . '/../public' => public_path('vendor/pm'),
        ], 'pm-assets');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/pm.php' => config_path('pm.php'),
            ], 'pm-config');
        }
    }

    /**
     * {@inheritdoc}
     */
    public static function import()
    {
        $lastOrder = Menu::max('order');
        $root = [
            'parent_id' => 0,
            'order' => $lastOrder++,
            'title' => 'Project',
            'icon' => 'fa-tasks',
            'uri' => '',
        ];
        $root = Menu::create($root);
        $menus = [
            [
                'title' => '任务',
                'icon' => 'fa-tasks',
                'uri' => 'pm-task',
            ],
            [
                'title' => '会议',
                'icon' => 'fa-terminal',
                'uri' => 'pm-meeting',
            ],
            [
                'title' => '行程',
                'icon' => 'fa-wrench',
                'uri' => 'pm-schedule',
            ],
        ];
        foreach ($menus as $menu) {
            $menu['parent_id'] = $root->id;
            $menu['order'] = $lastOrder++;
            Menu::create($menu);
        }

        Permission::create([
            'name' => 'Project Management',
            'slug' => 'ext.pm',
            'http_path' => '/' . trim('pm*', '/'),
        ]);
    }

}
