<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Models\Project;
use App\Models\Service;
use App\Models\Skill;
use App\Models\SocialLink;
use App\Models\Setting;

class CacheClearServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Clear cache when projects are modified
        Event::listen(['created', 'updated', 'deleted'], function ($event, $models) {
            foreach ($models as $model) {
                if ($model instanceof Project) {
                    \Cache::forget('home.projects');
                }
            }
        });

        // Clear cache when services are modified
        Event::listen(['created', 'updated', 'deleted'], function ($event, $models) {
            foreach ($models as $model) {
                if ($model instanceof Service) {
                    \Cache::forget('home.services');
                }
            }
        });

        // Clear cache when skills are modified
        Event::listen(['created', 'updated', 'deleted'], function ($event, $models) {
            foreach ($models as $model) {
                if ($model instanceof Skill) {
                    \Cache::forget('home.skills');
                }
            }
        });

        // Clear cache when social links are modified
        Event::listen(['created', 'updated', 'deleted'], function ($event, $models) {
            foreach ($models as $model) {
                if ($model instanceof SocialLink) {
                    \Cache::forget('home.socialLinks');
                }
            }
        });

        // Clear cache when settings are modified
        Event::listen(['created', 'updated', 'deleted'], function ($event, $models) {
            foreach ($models as $model) {
                if ($model instanceof Setting) {
                    \Cache::forget('home.settings');
                }
            }
        });
    }
}
