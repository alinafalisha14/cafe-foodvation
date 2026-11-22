<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    // 1. READ (nampilin semua data)
    public function index()
    {
        $menus = Menu::all();
        return view('menus.index', compact('menus'));
    }

    // 2. CREATE (nambahin data baru)
    public function create()
    {
        return view('menus.create');
    }

    // 3. STORE (nyimpen data baru ke database)
    public function store(Request $request)
    {
        $request->validate([
            'nama_menu' => 'required|string|max:255',
            'kategori' => 'required|string',
            'harga' => 'required|integer',
            'deskripsi' => 'nullable|string',
        ]);

        Menu::create($request->all());

        return redirect()->route('menus.index')->with('success', 'Menu berhasil ditambahkan!');
    }

    // 4. NAMPILIN form edit data
    public function edit(Menu $menu)
    {
        return view('menus.edit', compact('menu'));
    }

    // 5. UPDATE data di database
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'nama_menu' => 'required|string|max:255',
            'kategori' => 'required|string',
            'harga' => 'required|integer',
            'deskripsi' => 'nullable|string',
        ]);

        $menu->update($request->all());

        return redirect()->route('menus.index')->with('success', 'Menu berhasil diperbarui!');
    }

    // 6. DELETE data dari database
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menus.index')->with('success', 'Menu berhasil dihapus!');
    }
}