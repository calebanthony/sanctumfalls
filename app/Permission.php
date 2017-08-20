<?php

namespace App;

use \Spatie\Permission\Models\Permission as BasePermission;

class Permission extends BasePermission
{
    public static function defaultPermissions()
    {
        return [
            'view_users',
            'add_users',
            'edit_users',
            'delete_users',

            'view_roles',
            'add_roles',
            'edit_roles',
            'delete_roles',

            'view_guides',
            'add_guides',
            'edit_guides',
            'delete_guides',

            'view_heroes',
            'add_heroes',
            'edit_heroes',
            'delete_heroes',

            'view_skills',
            'add_skills',
            'edit_skills',
            'delete_skills',
        ];
    }
}
