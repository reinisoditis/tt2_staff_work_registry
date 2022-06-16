<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Role;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('projects.edit', function (User $user) {return in_array($user->role_id, [Role::IS_MANAGER, Role::IS_ADMIN]);});
        Gate::define('projects.delete', function (User $user) {return in_array($user->role_id, [Role::IS_MANAGER, Role::IS_ADMIN]);});
        Gate::define('projects.create', function (User $user) {return in_array($user->role_id, [Role::IS_MANAGER, Role::IS_ADMIN]);});

        Gate::define('worktypes.edit', function (User $user) {return in_array($user->role_id, [Role::IS_MANAGER, Role::IS_ADMIN]);});
        Gate::define('worktypes.delete', function (User $user) {return in_array($user->role_id, [Role::IS_MANAGER, Role::IS_ADMIN]);});
        Gate::define('worktypes.create', function (User $user) {return in_array($user->role_id, [Role::IS_MANAGER, Role::IS_ADMIN]);});

        Gate::define('users.index', function (User $user) {return in_array($user->role_id, [Role::IS_MANAGER, Role::IS_ADMIN]);});
        Gate::define('users.create', function (User $user) {return in_array($user->role_id, [Role::IS_MANAGER, Role::IS_ADMIN]);});
        Gate::define('users.delete', function (User $user) {return in_array($user->role_id, [Role::IS_MANAGER, Role::IS_ADMIN]);});
        Gate::define('users.edit', function (User $user) {return in_array($user->role_id, [Role::IS_MANAGER, Role::IS_ADMIN]);});

        Gate::define('projectmanager.delete', function (User $user) {return $user->role_id == Role::IS_ADMIN;});
        Gate::define('projectmanager.edit', function (User $user) {return $user->role_id == Role::IS_ADMIN;});
        Gate::define('users.promote', function (User $user) {return $user->role_id == Role::IS_ADMIN;});
    }
}
