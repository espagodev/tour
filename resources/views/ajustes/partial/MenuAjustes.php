<?php

namespace ajustes\partial;

use Illuminate\View\View;
use Spatie\Menu\Menu;
use Spatie\Menu\Link;
class MenuAjustes
{


    /**
     * Compose Settings Menu
     * @param View $view
     */

    public function compose(View $view)
    {
        $menuAjustes = Menu::new();


        $menuAjustes->each(function (Link $link) {
            $link->addClass('list-group-item');
        });

        $view->with('menuAjustes', $menuAjustes);
    }
}