<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Queries\HeroTierQuery;
use App\TierList;
use App\Hero;

class TierListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tier1 = HeroTierQuery::getTier1();
        $tier2 = HeroTierQuery::getTier2();
        $tier3 = HeroTierQuery::getTier3();

        return view('tier.index', compact('tier1', 'tier2', 'tier3'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vote = TierList::updateOrCreate([
            'voter_id'  => \Auth::id(),
            'hero_id'   => $request->input('heroID')
        ], [
            'tier'      => $request->input('voteTier')
        ]);

        flash()->success('Vote Registered!');

        return redirect('/tierlist');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
