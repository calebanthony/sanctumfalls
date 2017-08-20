<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Permission;
use App\Role;
use App\User;

class SeedPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sets up application permissions and the admin role.';

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
        $permissions = Permission::defaultPermissions();

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        $roles = ['admin','patron','user'];

        foreach ($roles as $role) {
            $role = Role::firstOrCreate(['name' => trim($role)]);


            if ($role->name == 'admin') {
                $role->syncPermissions(Permission::all());
            } else {
                $role->syncPermissions(Permission::where('name', 'LIKE', 'view_%')->get());
                $role->givePermissionTo('add_guides');
            }
        }

        $this->createAdmin();
    }

    /**
     * Create the admin
     */
    private function createAdmin()
    {
        $user = User::updateOrCreate([
            'email'     => 'caleb.m.anthony@gmail.com',
        ], [
            'name'      => 'Kyurazi',
            'password'  => bcrypt('calebanth1')
        ]);

        $user->syncRoles('admin');
    }
}
