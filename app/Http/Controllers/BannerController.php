<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function create()
    {
        return view('create-banner');
    }

    public function store(Request $request)
    {
        $image = null;

        if ($request->hasFile('image')) {

            $image = $request->file('image')
                ->store('banners', 'public');
        }

        Banner::create([
            'title' => $request->title,
            'image' => $image,
            'link' => $request->link,
            'starts_at' => $request->starts_at,
            'ends_at' => $request->ends_at,
            'active' => $request->active ? true : false
        ]);

        return redirect('/');
    }

    public function index()
    {
        $banners = Banner::latest()->get();

        return view('banners.index', compact('banners'));
    }

    public function show($id)
    {
        $banner = Banner::findOrFail($id);

        return view('banners.show', compact('banner'));
    }

    public function edit($id)
    {
        $banner = Banner::findOrFail($id);

        return view('banners.edit', compact('banner'));
    }

    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);

        $image = $banner->image;

        if ($request->hasFile('image')) {

            $image = $request->file('image')
                ->store('banners', 'public');
        }

        $banner->update([
            'title' => $request->title,
            'image' => $image,
            'link' => $request->link,
            'starts_at' => $request->starts_at,
            'ends_at' => $request->ends_at,
            'active' => $request->active ? true : false
        ]);

        return redirect('/banners');
    }

    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);

        if ($banner->image) {

            Storage::disk('public')->delete($banner->image);
        }

        $banner->delete();

        return redirect('/banners');
    }

    public function toggle($id)
    {
        $banner = Banner::findOrFail($id);

        $banner->active = !$banner->active;

        $banner->save();

        return redirect('/banners');
    }
}