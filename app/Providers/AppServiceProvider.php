<?php namespace App\Providers;

use Arcanys\EstimationTool\Repositories\EloquentRepositories\ProjectRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $request = app('request');

        if ($request->isMethod('OPTIONS')) {
            app()->options($request->path(), function () {
                    return response('', 200);
                });
        }
    }
}
