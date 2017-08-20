<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Skill;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Skill::where('parent_skill', null)->with('right.right', 'right.left', 'left.right', 'left.left')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skills = Skill::orderBy('updated_at', 'desc')->take(50)->get();
        $parentSkills = collect($skills)->pluck('name', 'id');

        return view('heroes.createSkills', compact('skills', 'parentSkills'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->parent != null) {
            $parentSkill = $request->parent;
        } else {
            $parentSkill = null;
        }

        $newSkill = [
            'parent_skill'  => $parentSkill,
            'name'          => $request->name,
            'description'   => $request->description,
            'left_or_right' => $request->leftright,
        ];

        Skill::create($newSkill);

        flash()->success('Skill Added!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  mixed  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (gettype($id) === 'string') {
            return Skill::where('name', $id)->with('right.right', 'right.left', 'left.right', 'left.left')->get();
        } elseif (gettype($id) === 'integer') {
            return Skill::where('id', $id)->with('right.right', 'right.left', 'left.right', 'left.left')->get();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $badSkill = Skill::find($id);
        $badSkill->delete();

        return redirect()->back();
    }
}
