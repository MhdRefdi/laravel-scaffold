<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class RollbackScaffoldCommand extends Command
{
    protected $signature = 'rollback:scaffold {model}';

    protected $description = 'Rollback a scaffolded model';

    public function handle()
    {
        $model = Str::ucfirst($this->argument('model'));
        $variable = Str::lower($model);

        if(File::exists($controller = app_path('Http/Controllers/' . $model . 'Controller.php'))) {
            File::delete($controller);
            $this->info('Controller deleted');
        }

        if(File::exists($Model = app_path('Models/' . $model . '.php'))) {
            File::delete($Model);
            $this->info('Model deleted');
        }

        if(File::exists($seeder = database_path('seeders/' . $model . 'Seeder.php'))) {
            File::delete($seeder);
            $this->info('Seeder deleted');
        }

        if(File::exists($store_request = app_path('Http/Requests/' . $model . '/StoreRequest.php'))) {
            File::delete($store_request);
            $this->info('StoreRequest deleted');
        }

        if(File::exists($update_request = app_path('Http/Requests/' . $model . '/UpdateRequest.php'))) {
            File::delete($update_request);
            $this->info('UpdateRequest deleted');
        }

        if(File::isDirectory($views = resource_path('views/backend/' . $variable))) {
            File::deleteDirectory($views);
            $this->info('Views deleted');
        }

        if(File::exists($repository = app_path('Repositories/Eloquent/' . $model . 'Repository.php'))) {
            File::delete($repository);
            $this->info('Repository deleted');
        }

        $this->comment('
        Done!, All files are deleted except migration :)
        ');
    }
}
