<?php

namespace App\Providers;

use App\Models\Article;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        $menu = [
            ['title' => 'Главная Страница', 'routeName' => 'home'],
            ['title' => 'Каталог Статей', 'routeName' => 'articles'],
        ];
        View::composer('inc.menu', function ($view) use ($menu) {
            $view->with('menu', $menu);
        });

        View::composer('inc.first_six_articles', function ($view) {
            $view->with('first_six', Article::GetFirstSix()->get());
        });
    }
}
