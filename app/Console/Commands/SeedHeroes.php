<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Excel;
use App\Hero;

class SeedHeroes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:heroes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import all the heroes from a CSV.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Excel::load('database/static/heroes.csv', function ($reader) {
            $reader->each(function ($row) {
                Hero::updateOrCreate(
                    [
                        'id'            => $row->id,
                    ],
                    [
                        'name'          => $row->name,
                        'type'          => $row->type,
                        'health'        => $row->health,
                        'armor'         => $row->armor,
                        'lmb_ability'   => $row->lmb,
                        'rmb_ability'   => $row->rmb,
                        'f_ability'     => $row->f,
                        'q_ability'     => $row->q,
                        'e_ability'     => $row->e,
                        'talent1'       => $row->talent1,
                        'talent2'       => $row->talent2,
                        'talent3'       => $row->talent3,
                    ]
                );
            });
        });
    }
}
