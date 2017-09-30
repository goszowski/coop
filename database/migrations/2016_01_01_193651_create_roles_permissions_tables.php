<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use App\User;
use App\Role;
use App\Permission;

class CreateRolesPermissionsTables extends Migration
{
    protected $roles = [
        'Developer',
        'Admin',
        'Manager',
    ];

    protected $permissions = [
        ['name' => 'crud_generator',            'label' => 'Can use CRUD Generator'],
        ['name' => 'attach_role_permissions',   'label' => 'Can attach permissions to roles'],
        ['name' => 'admin_view',                'label' => 'Can admin home page'],

        ['name' => 'users.create',              'label' => 'Can create users'],
        ['name' => 'users.view',                'label' => 'Can view users'],
        ['name' => 'users.edit',                'label' => 'Can edit users'],
        ['name' => 'users.delete',              'label' => 'Can delete users'],

        ['name' => 'roles.create',              'label' => 'Can create roles'],
        ['name' => 'roles.view',                'label' => 'Can view roles'],
        ['name' => 'roles.edit',                'label' => 'Can edit roles'],
        ['name' => 'roles.delete',              'label' => 'Can delete roles'],

        ['name' => 'permissions.create',        'label' => 'Can create permissions'],
        ['name' => 'permissions.view',          'label' => 'Can view permissions'],
        ['name' => 'permissions.edit',          'label' => 'Can edit permissions'],
        ['name' => 'permissions.delete',        'label' => 'Can delete permissions'],
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('label')->nullable();
            $table->timestamps();
        });

        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('label')->nullable();
            $table->timestamps();
        });

        Schema::create('permission_role', function (Blueprint $table) {
            $table->integer('permission_id')->unsigned();
            $table->integer('role_id')->unsigned();

            $table->foreign('permission_id')
                ->references('id')
                ->on('permissions')
                ->onDelete('cascade');

            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');

            $table->primary(['permission_id', 'role_id']);
        });

        Schema::create('role_user', function (Blueprint $table) {
            $table->integer('role_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->primary(['role_id', 'user_id']);
        });



        foreach($this->roles as $role)
        {
          Role::create([
            'name' => snake_case($role),
            'label' => $role,
          ]);
        }

        foreach($this->permissions as $permission)
        {
          Permission::create([
            'name' => $permission['name'],
            'label' => $permission['label'],
          ]);
        }

        $role = Role::with('permissions')->whereName('developer')->first();
        foreach ($this->permissions as $permission) {
            $permission = Permission::whereName($permission['name'])->first();
            $role->givePermissionTo($permission);
        }

        $developerUser = User::create([
            'name' => 'Рансайт ТОВ',
            'email' => 'info@runsite.com.ua',
            'password' => bcrypt('altertable025'),
            'is_active' => true,
        ]);

        $developerUser->assignRole('developer');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('permission_role');
        Schema::drop('role_user');
        Schema::drop('roles');
        Schema::drop('permissions');
    }
}
