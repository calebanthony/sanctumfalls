<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuideRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Guide;
use App\Hero;
use App\Queries\GuideVotesQuery;
use App\Queries\TooltipQuery;

class GuidesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'delete', 'getMine']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $heroes = collect(Hero::all())->sortBy('name')->pluck('name');

        return view('guides.index', compact('heroes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($hero)
    {
        $hero = str_replace('_', ' ', $hero);

        // A catch here if they arrived from menu item
        if ($hero === 'all') {
            return view('guides.pickHero', ['heroes' => collect(Hero::all())->sortBy('name')->pluck('name')]);
        }

        $heroData = Hero::where('name', $hero)
            ->with('lmbAbility', 'rmbAbility', 'fAbility', 'qAbility', 'eAbility', 'getTalent1', 'getTalent2', 'getTalent3')
            ->first();

        return view('guides.create', ['hero' => $heroData]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\GuideRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuideRequest $request)
    {
        if (strpos($request->build, ",,") !== false || substr($request->build, -1) == ',') {
            flash()->error('Make sure you fill out your entire build.');
            return redirect()->back()->withInput();
        }

        $user = Auth::user();

        $newGuide = [
            'name'      => $request->name,
            'views'     => 1,
            'author_id' => $user->id,
            'author'    => $user->name,
            'summary'   => $request->summary,
            'hero'      => $request->hero,
            'pros'      => serialize($request->pros),
            'cons'      => serialize($request->cons),
            'build'     => $request->build,
            'contents'  => $request->guideContents,
        ];

        $guide = Guide::create($newGuide);

        flash()->success('Guide Created!', 'Your guide is out in the wild now.');

        return redirect('/guides/'.$guide->hero.'/'.$guide->id);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list($hero)
    {
        $hero = str_replace('_', ' ', $hero);

        $guides = (new GuideVotesQuery)->get(request()->exists('popular'), $hero);

        $heroData = Hero::where('name', $hero)->first();
        $tooltips = TooltipQuery::getBaseSkills($hero);

        return view('guides.list', compact('guides', 'heroData', 'tooltips'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($hero, $id)
    {
        $hero = str_replace('_', ' ', $hero);
        $guide = Guide::where(compact('hero', 'id'))->first();
        $guide->increment('views');

        $guide->build = explode(',', $guide->build);

        $buildSteps = [];

        foreach ($guide->build as $key => $step) {
            $steps = explode('_', $step);

            $tooltip = TooltipQuery::get($hero, $step);

            // Handle if the skill is a talent first
            if (!array_key_exists(1, $steps)) {
                $buildSteps[$key]['skill'] = 'talent';
            } else {
                $buildSteps[$key]['skill'] = $steps[0];
            }

            // Setting up the array with base skill values.
            $buildSteps[$key]['build'] = end($steps);
            $buildSteps[$key]['tooltip'] = $tooltip;
        }

        $guide->buildSteps = $buildSteps;

        return view('guides.show', compact('guide'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($hero, $id)
    {
        $hero = str_replace('_', ' ', $hero);
        $guide = Guide::where(compact('hero', 'id'))->first();

        if (! $guide->ownedBy(\Auth::user())) {
            flash()->error('What are you doing?', 'You don\'t have permission to edit that guide.');
            return redirect('/');
        }

        return view('guides.edit', compact('guide'));
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
        $guide = Guide::find($id);

        $guide->name        = $request->name;
        $guide->summary     = $request->summary;
        $guide->pros        = serialize($request->pros);
        $guide->cons        = serialize($request->cons);
        $guide->build       = $request->build;
        $guide->contents    = $request->guideContents;

        $guide->save();

        return redirect('/guides/'.$guide->hero.'/'.$guide->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guide = Guide::find($id);
        $guide->delete();

        flash()->error('Guide Deleted');

        return redirect('/');
    }

    public function getMine()
    {
        $guides = Guide::where('author_id', Auth::id())->paginate(10);
        return view('my.guides', compact('guides'));
    }
}
