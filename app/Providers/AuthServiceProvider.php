<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Menu;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        View::composer('layouts.menu', function ($view) {
            $posicion = urlActual(request()->path());
            $userLogin = Auth::id();

            $menuAll = [];
            $menus = Menu::where('padre', '0')
                ->orderBy('orden')
                ->get()
                ->toArray();

            for($i=0; $i<count($menus); $i++){
                if($menus[$i]['open'] == 0){
                    $submenu = $this->getMenu($menus[$i]);

                    if($submenu['estado']){
                        $menuAll[$i] = array_merge($menus[$i], ['submenu' => []]);
                    }
                } else{
                    $submenu = $this->getSubmenu($menus[$i]);

                    if($submenu['estado']){
                        $menuAll[$i] = array_merge($menus[$i], ['submenu' => $submenu['submenu']]);
                    }
                }
            }

            $view->with('menuAll', $menuAll)
                ->with('posicion', $posicion);
        });
    }

    public function getSubmenu($menu){
        $estado = false;
        $submenu = DB::table('privilegios')
            ->join('menus', 'menus.id', '=', 'privilegios.menu_id')
            ->orderBy('menus.orden')
            ->where([
                ['privilegios.usuario_id', Auth::id()],
                ['menus.padre', $menu['id']]
            ])
            ->get()
            ->toArray();

        if(count($submenu) > 0){
            $estado = true;
        }

        return compact('submenu', 'estado');
    }

    public function getMenu($menu){
        $estado = false;
        $menus = DB::table('privilegios')
            ->join('menus', 'menus.id', '=', 'privilegios.menu_id')
            ->orderBy('menus.orden')
            ->where([
                ['privilegios.usuario_id', Auth::id()],
                ['menus.padre', '0'],
                ['menus.id', $menu['id']]
            ])
            ->get()
            ->toArray();

        if(count($menus) > 0){
            $estado = true;
        }

        return compact('menus', 'estado');
    }

}
