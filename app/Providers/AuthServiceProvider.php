<?php

namespace App\Providers;

use App\Models\Team;
use App\Models\User;
use App\Models\Guide;
use App\Models\Book;
use App\Models\Task;
use App\Models\Note;
use Illuminate\Support\Facades\DB;
use App\Policies\TeamPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Team::class => TeamPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('show-guide', function(User $user, Guide $guide){
            return $user->id === $guide->user_id;
        });

        Gate::define('show-note', function(User $user, Note $note){
            $book = DB::table('books')->find($note->book_id);
            return $user->id === $book->user_id;
        });

        Gate::define('show-book', function(User $user, Book $book){
            return $user->id === $book->user_id;
        });

        Gate::define('show-task', function(User $user, Task $task){
            return $user->id === $task->user_id;
        });
    }
}
