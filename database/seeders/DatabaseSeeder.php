<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\BusinessUnit;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $superAdminRole = Role::create([
            'id' => Str::uuid(),
            'name' => 'super_admin',
            'label' => 'Super Admin',
        ]);

        $adminRole = Role::create([
            'id' => Str::uuid(),
            'name' => 'admin',
            'label' => 'Admin',
        ]);

        // Create a company
        // $company = Company::create([
        //     'id' => Str::uuid(),
        //     'name' => 'Mega Store',
        //     'address' => '123 Business Street',
        // ]);

        // // Create business units
        // $bu1 = BusinessUnit::create([
        //     'id' => Str::uuid(),
        //     'company_id' => $company->id,
        //     'name' => 'First Store',
        //     'address' => '456 Retail Avenue',
        // ]);

        // $bu2 = BusinessUnit::create([
        //     'id' => Str::uuid(),
        //     'company_id' => $company->id,
        //     'name' => '2nd Store',
        //     'address' => '789 Commerce Road',
        // ]);

        // Create a super admin
        User::create([
            'id' => Str::uuid(),
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'password' => bcrypt('password'),
            'role_id' => $superAdminRole->id,
            'company_id' => null,
            'business_unit_id' => null,
        ]);

        // Create regular admins
        // User::create([
        //     'id' => Str::uuid(),
        //     'name' => 'Admin One',
        //     'email' => 'admin1@example.com',
        //     'password' => bcrypt('password'),
        //     'role_id' => $adminRole->id,
        //     'company_id' => $company->id,
        //     'business_unit_id' => $bu1->id,
        // ]);

        // User::create([
        //     'id' => Str::uuid(),
        //     'name' => 'Admin Two',
        //     'email' => 'admin2@example.com',
        //     'password' => bcrypt('password'),
        //     'role_id' => $adminRole->id,
        //     'company_id' => $company->id,
        //     'business_unit_id' => $bu2->id,
        // ]);
    }
}
