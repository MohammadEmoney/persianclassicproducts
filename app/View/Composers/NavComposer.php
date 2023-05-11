<?php

namespace App\View\Composers;

use App\Models\Category;
use App\Repositories\UserRepository;
use Illuminate\View\View;

class NavComposer
{
    /**
     * The user repository implementation.
     *
     * @var \App\Repositories\UserRepository
     */
    protected $users;

    /**
     * Create a new profile composer.
     *
     * @param  \App\Repositories\UserRepository  $users
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with(
            'categories',
            Category::where('is_active', true)
                ->orderBy('name')
                ->get()
        );
    }
}
