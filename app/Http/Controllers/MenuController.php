<?php

namespace App\Http\Controllers;

use App\Events\MenuNoItems;
use App\Http\Resources\MenuCollection;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \App\Http\Resources\MenuCollection
     */

    public function __invoke(Request $request): MenuCollection
    {
        $menu = MenuItem::all();

        if ($menu->isEmpty()) {
            event(new MenuNoItems());

            return new MenuCollection($menu);
        }

        // Menu grouped by parent id
        $groupedMenu = [];
        foreach ($menu as $menuItem) {
            $groupedMenu[$menuItem->parent][] = $menuItem;
        }

        // Add nested elements to the menu
        function makeNestedMenu($groupedMenu, $parent): array
        {
            $nestedMenu = [];
            foreach ($parent as $item) {
                if (isset($groupedMenu[$item->id])) {
                    $item->submenu = makeNestedMenu($groupedMenu, $groupedMenu[$item->id]);
                }

                $nestedMenu[] = $item;
            }

            return $nestedMenu;
        }

        $nestedMenu = makeNestedMenu($groupedMenu, $groupedMenu[0]);

        return new MenuCollection($nestedMenu);
    }
}
