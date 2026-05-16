<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    public function index()
    {
        $members = TeamMember::latest()->get();

        return view('team.index', compact('members'));
    }

    public function store(Request $request)
    {
        $image = null;

        if ($request->hasFile('image')) {

            $image = $request->file('image')
                ->store('team', 'public');
        }

        TeamMember::create([
            'name' => $request->name,
            'text' => $request->text,
            'image' => $image,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
            'active' => $request->active ? true : false
        ]);

        return redirect('/team');
    }

    public function destroy($id)
    {
        $member = TeamMember::findOrFail($id);

        $member->delete();

        return redirect('/team');
    }

    public function toggle($id)
    {
        $member = TeamMember::findOrFail($id);

        $member->active = !$member->active;

        $member->save();

        return redirect('/team');
    }
}