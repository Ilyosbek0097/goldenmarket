<?php

namespace App\Providers;

use App\Repositories\AddProductRepository;
use App\Repositories\AdminPayListRepository;
use App\Repositories\BrandRepository;
use App\Repositories\ClientRepository;
use App\Repositories\CurrencyRepository;
use App\Repositories\Interfaces\AddProductRepositoryInterfaces;
use App\Repositories\Interfaces\AdminPayListRepositoryInterfaces;
use App\Repositories\Interfaces\BrandRepositoryInterfaces;
use App\Repositories\Interfaces\ClientRepositoryInterfaces;
use App\Repositories\Interfaces\CurrencyRepositoryInterfaces;
use App\Repositories\Interfaces\MarkRepositoryInterfaces;
use App\Repositories\Interfaces\OutputTypeRepositoryInterfaces;
use App\Repositories\Interfaces\PayListRepositoryInterfaces;
use App\Repositories\Interfaces\ProductNameRepositoryInterfaces;
use App\Repositories\Interfaces\ReportsRepositoryInterfaces;
use App\Repositories\Interfaces\SupplierRepositoryInterfaces;
use App\Repositories\Interfaces\TotalSaleRepositoryInterfaces;
use App\Repositories\Interfaces\UserRepositoryInterfaces;
use App\Repositories\Interfaces\WarehouseRepositoryInterfaces;
use App\Repositories\MarkRepository;
use App\Repositories\OutputTypeRepository;
use App\Repositories\PayListRepository;
use App\Repositories\ProductNameRepository;
use App\Repositories\ReportsRepository;
use App\Repositories\SupplierRepository;
use App\Repositories\TotalSaleRepository;
use App\Repositories\TypeRepository;
use App\Repositories\BranchRepository;
use App\Repositories\StudentRepository;
use App\Repositories\TeacherRepository;
use App\Repositories\UserRepository;
use App\Repositories\WarehouseRepository;
use App\Repositories\CashSalesRepository;
use App\Repositories\Interfaces\CashSalesRepositoryInterfaces;
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
       $this->app->bind(AddProductRepositoryInterfaces::class, AddProductRepository::class);
       $this->app->bind(MarkRepositoryInterfaces::class, MarkRepository::class);
       $this->app->bind(CurrencyRepositoryInterfaces::class, CurrencyRepository::class);
       $this->app->bind(UserRepositoryInterfaces::class, UserRepository::class);

       $this->app->bind(WarehouseRepositoryInterfaces::class, WarehouseRepository::class);
       $this->app->bind(CashSalesRepositoryInterfaces::class, CashSalesRepository::class);
       $this->app->bind(TotalSaleRepositoryInterfaces::class, TotalSaleRepository::class);
       $this->app->bind(PayListRepositoryInterfaces::class, PayListRepository::class);
       $this->app->bind(ClientRepositoryInterfaces::class, ClientRepository::class);
       $this->app->bind(OutputTypeRepositoryInterfaces::class, OutputTypeRepository::class);
       $this->app->bind(AdminPayListRepositoryInterfaces::class, AdminPayListRepository::class);
       $this->app->bind(ReportsRepositoryInterfaces::class, ReportsRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
