<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ScaffoldCommand extends Command
{
    protected $signature = 'make:scaffold {model}';

    protected $description = 'Make your backend crud easly';

    public function handle()
    {
        $model = Str::ucfirst($this->argument('model'));
        $variable = Str::lower($model);
        $variables = Str::plural($variable);

        $this->generate_file($model, $variable);

        $this->generate_repository($model);

        $this->directory_copy(base_path("stubs/views"), resource_path("views/backend/{$variable}"));

        $this->replace_placeholder_view('index', $model, $variables, $variable);
        $this->replace_placeholder_view('show', $model, $variables, $variable);
        $this->replace_placeholder_view('edit', $model, $variables, $variable);
        $this->replace_placeholder_view('create', $model, $variables, $variable);

        // check jika belum melakukan storage link

        if (!FIle::exists(public_path('storage'))) {
            $this->call('storage:link');
        }

        $this->comment('
        Done!, Happy Coding :)
        ');
    }

    public function generate_file($model, $variable)
    {
        $this->call('make:model', [
            'name' => $model,
            '--controller' => true,
            '--migration' => true,
            '--seed' => true,
            '--resource' => true,
        ]);

        $this->call('make:request', [
            'name' => "$model/StoreRequest",
        ]);

        $this->call('make:request', [
            'name' => "$model/UpdateRequest",
        ]);

        $this->replace_placeholder(app_path("Http/Controllers/{$model}Controller.php") , '{{ variable }}', $variable);
    }

    public function generate_repository($model)
    {
        $this->file_copy(base_path('stubs/repository.stub'), app_path("Repositories/Eloquent/{$model}Repository.php"));
        $this->replace_placeholder(app_path("Repositories/Eloquent/{$model}Repository.php") , '{{ model }}', $model);

    }

    public function file_copy($path, $target)
    {
        File::copy($path, $target);
    }

    public function directory_copy($path, $target)
    {
        File::copyDirectory($path, $target);
    }

    public function replace_placeholder($path, $search, $replace)
    {
        $content = File::get($path);
        $updated_content = str_replace($search, $replace, $content);
        File::put($path, $updated_content);
    }

    public function replace_placeholder_view($view, $model, $variables, $variable)
    {
        $view_copied_path = base_path("resources/views/backend/{$variable}/{$view}.blade.php");
        $view_content = File::get($view_copied_path);
        $updated_view_content = str_replace([
            '{{ model }}',
            '{{ variables }}',
            '{{ variable }}',
        ], [
            $model,
            $variables,
            $variable,
        ], $view_content);

        File::put($view_copied_path, $updated_view_content);
    }
}
