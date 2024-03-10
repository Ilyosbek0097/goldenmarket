<?php

namespace App\Providers;

use App\Repositories\BrandRepository;
use App\Repositories\Interfaces\BrandRepositoryInterfaces;
use App\Repositories\Interfaces\ProductNameRepositoryInterfaces;
use App\Repositories\Interfaces\SupplierRepositoryInterfaces;
use App\Repositories\ProductNameRepository;
use App\Repositories\SupplierRepository;
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
       $this->app->bind(BrandRepositoryInterfaces::class, BrandRepository::class);
       $this->app->bind(SupplierRepositoryInterfaces::class, SupplierRepository::class);
       $this->app->bind(ProductNameRepositoryInterfaces::class, ProductNameRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
