<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\JournalPolicy;
use App\Models\Journal;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Journal::class => JournalPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /* define an administrator user role */
        Gate::define('isPublic', function($user) {
            return $user ->type == 'Public';
        });
        /* define an author user role */
        Gate::define('isPrivate', function($user) {
            return $user ->type == 'Private';
        });
    }
}
