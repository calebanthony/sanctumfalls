<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hero;
use App\Skill;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Hero::latest()->paginate();
        return view('heroes.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $heroes = Hero::all();
        $parentSkills = collect(Skill::where('parent_skill', null)->get())->pluck('name', 'id');

        return view('heroes.createHeroes', compact('heroes', 'parentSkills'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newHero = [
            'name'          => $request->name,
            'type'          => $request->type,
            'health'        => $request->health,
            'front_armor'   => $request->front_armor,
            'back_armor'    => $request->back_armor,
            'talent1'       => $request->talent1,
            'talent2'       => $request->talent2,
            'talent3'       => $request->talent3,
            'lmb_ability'   => $request->lmb_ability,
            'rmb_ability'   => $request->rmb_ability,
            'f_ability'     => $request->f_ability,
            'q_ability'     => $request->q_ability,
            'e_ability'     => $request->e_ability,
        ];

        Hero::create($newHero);

        flash()->success('Hero Added!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (gettype($id) === 'string') {
            return Hero::where('name', $id)
                ->with('lmbAbility', 'rmbAbility', 'fAbility', 'qAbility', 'eAbility')->first();
        } elseif (gettype($id) === 'integer') {
            return Hero::where('id', $id)
                ->with('lmbAbility', 'rmbAbility', 'fAbility', 'qAbility', 'eAbility')->first();
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
        //
    }
}
