<?php

use App\Models\Menu;
use Illuminate\Support\Facades\DB;

function hello()
{
    return 'Hello World';
}


function Section()
{
    $data = DB::table('section')
        // ->join('access_user_menu', 'menu.id', '=', 'menu_id')
        // ->where('section_id', $id)
        // ->where('user_id', auth()->user()->id)
        ->where('status', 1)
        // ->where('access_user_menu.deleted_at', null)
        ->orderBy('section.id', 'asc')
        ->get();

    return $data;
}

function Menu($id)
{
    $data = DB::table('menu')
        // ->join('access_user_menu', 'menu.id', '=', 'access_user_menu.menu_id')
        // ->where('user_id', auth()->user()->id)
        ->where('section_id', $id)
        ->where('status', 1)
        // ->where('access_user_menu.deleted_at', null)
        ->orderBy('menu.id', 'asc')
        ->get();

    return $data;
}

function Active($id)
{
    $active = ' ';
    if (request()->segment(2)) {
        $url = '/' . request()->segment(1) . '/' . request()->segment(2);
        $data = Menu::where('menu_url', $url)->where('id', $id);
    }
    if (!empty($data)) {
        $active = $data->count() > 0 ? 'active' : ' ';
    }
    return $active;
}

function MenuActive($id)
{
    $open = ' ';
    if (request()->segment(2)) {
        $url = '/' . request()->segment(1) . '/' . request()->segment(2);
        $data = Menu::where('menu_url', $url)->where('section_id', $id);
    }
    if (!empty($data)) {
        $open = $data->count() > 0 ? 'menu-open' : ' ';
    }
    return $open;
}
