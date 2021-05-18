<?php

namespace App\Http\View\Composer;

use App\Models\Category;
use Illuminate\View\View;

class ViewComposer 
{
    protected $categories;

    public function __construct()
    {
        $this->categories = Category::with('child')->where('category_id', null)->get();  
    }

    public function compose(View $view)
    {
        $view->with('categories', $this->categories);
    }
}

