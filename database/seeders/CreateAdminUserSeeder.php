<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class CreateAdminUserSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{

    $user = User::create([
        'name' => 'abobaker',
        'phone' => '01122002942',
        'password' => bcrypt('12345678'),
        'roles_name' => ["owner"],
        'Status' => 'مفعل',
        'type'=>"admin",
        ]);

        $role = Role::create(['name' => 'owner']);
        $role2 = Role::create(['name' => 'user']);
        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
