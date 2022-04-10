<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMenuGroupRequest;
use App\Http\Requests\UpdateMenuGroupRequest;
use App\Models\MenuGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class MenuGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $menuGroups = DB::table('menu_groups')
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('name', 'like', '%' . $name . '%');
            })
            ->paginate(10);
        return view('menu.menu-group.index', compact('menuGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $permissions = Permission::all();
        return view('menu.menu-group.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMenuGroupRequest $request)
    {
        //
        MenuGroup::create($request->validated());
        return redirect()->route('menu-group.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MenuGroup  $menuGroup
     * @return \Illuminate\Http\Response
     */
    public function show(MenuGroup $menuGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MenuGroup  $menuGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuGroup $menuGroup)
    {
        //
        return view('menu.menu-group.edit', compact('menuGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MenuGroup  $menuGroup
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMenuGroupRequest $request, MenuGroup $menuGroup)
    {
        //
        $menuGroup->update($request->validated());
        return redirect()->route('menu-group.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MenuGroup  $menuGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuGroup $menuGroup)
    {
        //
        $menuGroup->delete();
        return redirect()->route('menu-group.index')->with('success', 'Data berhasil dihapus');
    }
}
