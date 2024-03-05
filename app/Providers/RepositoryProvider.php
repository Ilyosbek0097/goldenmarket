<?php

namespace App\Providers;

use App\Repositories\TypeRepository;
use App\Repositories\BranchRepository;
use App\Repositories\StudentRepository;
use App\Repositories\TeacherRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\TypeRepositoryInterfaces;
use App\Repositories\Interfaces\BranchRepositoryInterfaces;
use App\Repositories\Interfaces\StudentRepositoryInterfaces;
use App\Repositories\Interfaces\TeacherRepositoryInterfaces;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
       $this->app->bind(BranchRepositoryInterfaces::class, BranchRepository::class);
       $this->app->bind(TeacherRepositoryInterfaces::class, TeacherRepository::class);
       $this->app->bind(StudentRepositoryInterfaces::class, StudentRepository::class);

       $this->app->bind(TypeRepositoryInterfaces::class, TypeRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
