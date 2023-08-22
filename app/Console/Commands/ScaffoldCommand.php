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

        $this->generate_file($model);

        $this->generate_repository($model);

        $this->generate_views($variable);

        $this->view_index($model, $variables, $variable);
        $this->view_show($model , $variable);
        $this->view_create($model , $variable);
        $this->view_edit($model , $variable);
    }

    public function generate_file($model)
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

        $controller_path = app_path("Http/Controllers/{$model}Controller.php");
        $controller_content = File::get($controller_path);
        $updated_controller_content = str_replace('{{ variable }}', $variable, $controller_content);
        File::put($controller_path, $updated_controller_content);
    }

    public function generate_repository($model)
    {
        $repository_stub_path = base_path('stubs/repository.stub');
        $repository_copied_path = app_path("Repositories/Eloquent/{$model}Repository.php");
        File::copy($repository_stub_path, $repository_copied_path);

        $repository_content = File::get($repository_copied_path);
        $updated_repository_content = str_replace('{{ model }}', $model, $repository_content);
        File::put($repository_copied_path, $updated_repository_content);
    }

    public function view_index($model, $variables, $variable)
    {
        $view_copied_path = base_path("resources/views/backend/{$variable}/index.blade.php");
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

    public function view_show($model, $variable)
    {
        $view_copied_path = base_path("resources/views/backend/{$variable}/show.blade.php");
        $view_content = File::get($view_copied_path);
        $updated_view_content = str_replace([
            '{{ model }}',
            '{{ variable }}',
        ], [
            $model,
            $variable,
        ], $view_content);

        File::put($view_copied_path, $updated_view_content);
    }

    public function view_create($model, $variable)
    {
        $view_copied_path = base_path("resources/views/backend/{$variable}/create.blade.php");
        $view_content = File::get($view_copied_path);
        $updated_view_content = str_replace([
            '{{ model }}',
            '{{ variable }}',
        ], [
            $model,
            $variable,
        ], $view_content);

        File::put($view_copied_path, $updated_view_content);
    }

    public function view_edit($model, $variable)
    {
        $view_copied_path = base_path("resources/views/backend/{$variable}/edit.blade.php");
        $view_content = File::get($view_copied_path);
        $updated_view_content = str_replace([
            '{{ model }}',
            '{{ variable }}',
        ], [
            $model,
            $variable,
        ], $view_content);

        File::put($view_copied_path, $updated_view_content);
    }

    public function generate_views($variable)
    {
        $views_stub_path = base_path('stubs/views');
        $views_copied_path = base_path("resources/views/backend/{$variable}");
        File::copyDirectory($views_stub_path, $views_copied_path);
    }
}
