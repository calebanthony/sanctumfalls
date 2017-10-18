<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Excel;
use App\Skill;

class SeedSkills extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:skills';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import all the skills from a CSV.';

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
        Excel::load('database/static/skills.csv', function ($reader) {
            $reader->each(function ($row) {
                Skill::updateOrCreate(
                    [
                        'id'            => $row->id,
                        'parent_skill'  => $row->parent_skill,
                    ],
                    [
                        'name'          => $row->name,
                        'description'   => $row->description,
                        'left_or_right' => $row->left_or_right,
                    ]
                );
            });
        });
    }
}
