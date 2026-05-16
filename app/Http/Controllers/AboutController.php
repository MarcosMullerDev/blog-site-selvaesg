<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function store(Request $request)
    {
        if ($request->active) {

            About::query()->update([
                'active' => false
            ]);
        }

        $image = null;

        if ($request->hasFile('image')) {

            $image = $request->file('image')
                ->store('about', 'public');
        }

        $secondaryImage = null;

        if ($request->hasFile('secondary_image')) {

            $secondaryImage = $request
                ->file('secondary_image')
                ->store('abouts', 'public');

        }

        About::create([
            'title' => $request->title,
            'text' => $request->text,
            'image' => $image,
            'secondary_image' => $secondaryImage,
            'active' => $request->active ? true : false
        ]);

        return redirect('/about');
    }

    public function update(Request $request, $id)
    {
        $about = About::findOrFail($id);

        // DESATIVA TODOS SE ESSE FOR ATIVO

        if ($request->active) {

            About::query()->update([
                'active' => false
            ]);
        }

        // IMAGEM PRINCIPAL

        $image = $about->image;

        if ($request->hasFile('image')) {

            $image = $request
                ->file('image')
                ->store('abouts', 'public');
        }

        // SEGUNDA IMAGEM

        $secondaryImage = $about->secondary_image;

        if ($request->hasFile('secondary_image')) {

            $secondaryImage = $request
                ->file('secondary_image')
                ->store('abouts', 'public');
        }

        // UPDATE

        $about->update([

            'title' => $request->title,

            'text' => $request->text,

            'image' => $image,

            'secondary_image' => $secondaryImage,

            'active' => $request->active ? true : false

        ]);

        return redirect('/about')
            ->with('success', 'Sobre atualizado com sucesso.');
    }

    public function show($id)
    {
        $about = About::findOrFail($id);

        return view('about.show', compact('about'));
    }

    public function destroy($id)
    {
        $about = About::findOrFail($id);

        $about->delete();

        return redirect('/about/edit');
    }

    public function toggle($id)
    {
        About::query()->update([
            'active' => false
        ]);

        $about = About::findOrFail($id);

        $about->active = true;

        $about->save();

        return redirect('/about/edit');
    }

    public function edit($id)
    {
        $about = About::findOrFail($id);

        return view('about-edit', compact('about'));
    }

    public function index()
    {
        $abouts = About::latest()->get();

        return view('about', compact('abouts'));
    }
}