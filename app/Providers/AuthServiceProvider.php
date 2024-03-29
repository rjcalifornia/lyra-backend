<?php

namespace App\Providers;

use App\Models\ActaElectoral;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\Models\JuntasReceptoras;
use App\Models\PartidosPoliticos;
use App\Policies\LyraPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        JuntasReceptoras::class => LyraPolicy::class,
        ActaElectoral::class => LyraPolicy::class,
        PartidosPoliticos::class => LyraPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
