<?php

namespace App\Providers;

// use Illuminate\Database\Eloquent\Model;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {       
            // Model::preventLazyLoading(!app()->isProduction());

            Gate::define('edit-job', function (User $user, Job $job) {
                return $job->employer_id === $user->id;
            });
    }
}
