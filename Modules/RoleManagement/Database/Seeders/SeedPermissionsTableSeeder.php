<?php

namespace Modules\RoleManagement\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SeedPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('permissions')->insert([
            'name'=>'Dashboard',
            'guard_name'=>'web',
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);

        DB::table('permissions')->insert([
            'name'=>'Production',
            'guard_name'=>'web',
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);

        DB::table('permissions')->insert([
            'name'=>'Gate',
            'guard_name'=>'web',
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);
        DB::table('permissions')->insert([
            'name'=>'Supplier',
            'guard_name'=>'web',
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);
        DB::table('permissions')->insert([
            'name'=>'Sale',
            'guard_name'=>'web',
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);
        DB::table('permissions')->insert([
            'name'=>'Purchase',
            'guard_name'=>'web',
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);
        DB::table('permissions')->insert([
            'name'=>'Store',
            'guard_name'=>'web',
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);
        DB::table('permissions')->insert([
            'name'=>'Quality',
            'guard_name'=>'web',
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);
        DB::table('permissions')->insert([
            'name'=>'HR',
            'guard_name'=>'web',
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);
        DB::table('permissions')->insert([
            'name'=>'Setting',
            'guard_name'=>'web',
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);
        DB::table('permissions')->insert([
            'name'=>'Accept Leave Request',
            'guard_name'=>'web',
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);

        DB::table('permissions')->insert([
            'name'=>'Apply for Attendance',
            'guard_name'=>'web',
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);
        DB::table('permissions')->insert([
            'name'=>'Production Process',
            'guard_name'=>'web',
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);
        DB::table('permissions')->insert([
            'name'=>'Product Transfer',
            'guard_name'=>'web',
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);
        DB::table('permissions')->insert([
            'name'=>'Assign Stores',
            'guard_name'=>'web',
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);
        DB::table('permissions')->insert([
            'name'=>'Apply For Loan',
            'guard_name'=>'web',
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);
        DB::table('permissions')->insert([
            'name'=>'Accept Loan Request',
            'guard_name'=>'web',
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);
        DB::table('permissions')->insert([
            'name'=>'Purchase Requisition',
            'guard_name'=>'web',
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);
        DB::table('permissions')->insert([
            'name'=>'Approve Order',
            'guard_name'=>'web',
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);
        DB::table('permissions')->insert([
            'name'=>'Approve Requisition',
            'guard_name'=>'web',
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);
        DB::table('permissions')->insert([
            'name'=>'Tendor',
            'guard_name'=>'web',
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);
        DB::table('permissions')->insert([
            'name'=>'Tender',
            'guard_name'=>'web',
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);

        DB::table('permissions')->insert([
            'name'=>'Apply for Leave',
            'guard_name'=>'web',
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);

        //____________________________ Previous Persmission For HRMS ----------------------- ///

//        DB::table('permissions')->insert([
//            'name'=>'Personal Information',
//            'guard_name'=>'web',
//            'created_at'=>NOW(),
//            'updated_at'=>NOW()
//        ]);
//
//        DB::table('permissions')->insert([
//            'name'=>'Education Details',
//            'guard_name'=>'web',
//            'created_at'=>NOW(),
//            'updated_at'=>NOW()
//        ]);
//
//        DB::table('permissions')->insert([
//            'name'=>'User Management',
//            'guard_name'=>'web',
//            'created_at'=>NOW(),
//            'updated_at'=>NOW()
//        ]);
//
//        DB::table('permissions')->insert([
//            'name'=>'Employee Information',
//            'guard_name'=>'web',
//            'created_at'=>NOW(),
//            'updated_at'=>NOW()
//        ]);
//
//        DB::table('permissions')->insert([
//            'name'=>'Employee Education Details',
//            'guard_name'=>'web',
//            'created_at'=>NOW(),
//            'updated_at'=>NOW()
//        ]);
//
//        DB::table('permissions')->insert([
//            'name'=>'attendance',
//            'guard_name'=>'web',
//            'created_at'=>NOW(),
//            'updated_at'=>NOW()
//        ]);
//
//        DB::table('permissions')->insert([
//            'name'=>'Request a Business Card',
//            'guard_name'=>'web',
//            'created_at'=>NOW(),
//            'updated_at'=>NOW()
//        ]);
//
//        DB::table('permissions')->insert([
//            'name'=>'Request Business Card',
//            'guard_name'=>'web',
//            'created_at'=>NOW(),
//            'updated_at'=>NOW()
//        ]);
//
//
//
//        DB::table('permissions')->insert([
//            'name'=>'Employee Payroll',
//            'guard_name'=>'web',
//            'created_at'=>NOW(),
//            'updated_at'=>NOW()
//        ]);
//
//        DB::table('permissions')->insert([
//            'name'=>'Leave',
//            'guard_name'=>'web',
//            'created_at'=>NOW(),
//            'updated_at'=>NOW()
//        ]);
//
//        DB::table('permissions')->insert([
//            'name'=>'Training',
//            'guard_name'=>'web',
//            'created_at'=>NOW(),
//            'updated_at'=>NOW()
//        ]);
//
//        DB::table('permissions')->insert([
//            'name'=>'Leave Management',
//            'guard_name'=>'web',
//            'created_at'=>NOW(),
//            'updated_at'=>NOW()
//        ]);
//
//
//        DB::table('permissions')->insert([
//            'name'=>'Training Material',
//            'guard_name'=>'web',
//            'created_at'=>NOW(),
//            'updated_at'=>NOW()
//        ]);
//
//        DB::table('permissions')->insert([
//            'name'=>'Code of Conduct',
//            'guard_name'=>'web',
//            'created_at'=>NOW(),
//            'updated_at'=>NOW()
//        ]);
//
//        DB::table('permissions')->insert([
//            'name'=>'Salary Slip',
//            'guard_name'=>'web',
//            'created_at'=>NOW(),
//            'updated_at'=>NOW()
//        ]);
//
//        DB::table('permissions')->insert([
//            'name'=>'Salary Certificate',
//            'guard_name'=>'web',
//            'created_at'=>NOW(),
//            'updated_at'=>NOW()
//        ]);
//
//        DB::table('permissions')->insert([
//            'name'=>'Role Management',
//            'guard_name'=>'web',
//            'created_at'=>NOW(),
//            'updated_at'=>NOW()
//        ]);
//
//        DB::table('permissions')->insert([
//            'name'=>'Create Leave',
//            'guard_name'=>'web',
//            'created_at'=>NOW(),
//            'updated_at'=>NOW()
//        ]);
//
//        DB::table('permissions')->insert([
//            'name'=>'User Modify',
//            'guard_name'=>'web',
//            'created_at'=>NOW(),
//            'updated_at'=>NOW()
//        ]);
//// --- starting work here ---- //
//        DB::table('permissions')->insert([
//            'name'=>'Loan',
//            'guard_name'=>'web',
//            'created_at'=>NOW(),
//            'updated_at'=>NOW()
//        ]);
//        DB::table('permissions')->insert([
//            'name'=>'Loan Management',
//            'guard_name'=>'web',
//            'created_at'=>NOW(),
//            'updated_at'=>NOW()
//        ]);
//        DB::table('permissions')->insert([
//            'name'=>'Reimbursement Claim',
//            'guard_name'=>'web',
//            'created_at'=>NOW(),
//            'updated_at'=>NOW()
//        ]);
//        DB::table('permissions')->insert([
//            'name'=>'Reimbursement Claim Approver',
//            'guard_name'=>'web',
//            'created_at'=>NOW(),
//            'updated_at'=>NOW()
//        ]);
//        DB::table('permissions')->insert([
//            'name'=>'Reimbursement Slip Verification',
//            'guard_name'=>'web',
//            'created_at'=>NOW(),
//            'updated_at'=>NOW()
//        ]);
//        DB::table('permissions')->insert([
//            'name'=>'Employee Exit',
//            'guard_name'=>'web',
//            'created_at'=>NOW(),
//            'updated_at'=>NOW()
//        ]);
//        DB::table('permissions')->insert([
//            'name'=>'HR',
//            'guard_name'=>'web',
//            'created_at'=>NOW(),
//            'updated_at'=>NOW()
//        ]);
//        DB::table('permissions')->insert([
//            'name'=>'Employee resign',
//            'guard_name'=>'web',
//            'created_at'=>NOW(),
//            'updated_at'=>NOW()
//        ]);
//        DB::table('permissions')->insert([
//            'name'=>'Resign Accept',
//            'guard_name'=>'web',
//            'created_at'=>NOW(),
//            'updated_at'=>NOW()
//        ]);




        // $this->call("OthersTableSeeder");
    }
}
