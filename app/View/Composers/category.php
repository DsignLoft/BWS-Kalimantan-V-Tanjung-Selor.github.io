<?php

namespace App\View\Composers;

use App\Models\Product\CategoryProduct;
use Illuminate\View\View;

class Category
{
    public function compose(View $view)
    {
        $view->with('product_categories', cache()->rememberForever('category-topbar', function () {
            return CategoryProduct::query()->where('id_category', '!=', 27)->orderBy('order_by', 'asc')->get();
        }));
    }
}
