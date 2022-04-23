<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Ticket;
use App\Models\Comment;
use App\Models\Property;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootEloquentMorphsRelations();
    }

    public function bootEloquentMorphsRelations()
    {
        Relation::morphMap([
            Property::TABLE => Property::class,
            Comment::TABLE    => Comment::class,
            User::TABLE       => User::class,
            Ticket::TABLE       => Ticket::class,
        ]);
    }
}
