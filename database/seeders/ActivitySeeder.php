<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Activity::create(['activity_name'=>'Starting a business','activity_order'=>1, 'activity_status'=>1]);
        Activity::create(['activity_name'=>'Running / Growing Operations','activity_order'=>2, 'activity_status'=>1]);
        Activity::create(['activity_name'=>'Utility Connections','activity_order'=>3, 'activity_status'=>1]);
        Activity::create(['activity_name'=>'Paying Taxes','activity_order'=>4, 'activity_status'=>1]);
        Activity::create(['activity_name'=>'Human Resources','activity_order'=>5, 'activity_status'=>1]);
        Activity::create(['activity_name'=>'Legal and Policy services','activity_order'=>5, 'activity_status'=>1]);
    }
}
