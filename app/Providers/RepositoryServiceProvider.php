<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Impls\CityRepositoryImpl;
use App\Repositories\Impls\CountryRepositoryImpl;
use App\Repositories\Impls\FaqRepositoryImpl;
use App\Repositories\Impls\JobCategoryRepositoryImpl;
use App\Repositories\Impls\RegistrationRepositoryImpl;
use App\Repositories\Impls\UserRepositoryImpl;
use App\Repositories\Impls\JobManagementRepositoryImpl;
use App\Repositories\Interf\CityRepository;
use App\Repositories\Interf\CountryRepository;
use App\Repositories\Interf\FaqRepository;
use App\Repositories\Interf\JobCategoryRepository;
use App\Repositories\Interf\RegistrationRepository;
use App\Repositories\Interf\UserRepository;
use App\Repositories\Interf\JobManagementRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(CountryRepository::class, CountryRepositoryImpl::class);
        $this->app->bind(CityRepository::class, CityRepositoryImpl::class);
        $this->app->bind(FaqRepository::class, FaqRepositoryImpl::class);
        $this->app->bind(JobCategoryRepository::class, JobCategoryRepositoryImpl::class);
        $this->app->bind(RegistrationRepository::class, RegistrationRepositoryImpl::class);
        $this->app->bind(UserRepository::class, UserRepositoryImpl::class);
        $this->app->bind(JobManagementRepository::class, JobManagementRepositoryImpl::class);
    }
}
