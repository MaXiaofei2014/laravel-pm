<?php
namespace Lifeibest\LaravelPm\Console;

use Illuminate\Console\Command;

/**
 * php artisan  git-deploy:task
 */
class TaskCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'pm:task';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'pm task';
    /**
     * Install directory.
     *
     * @var string
     */
    protected $directory = '';
    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        echo 'run task';
    }

}
