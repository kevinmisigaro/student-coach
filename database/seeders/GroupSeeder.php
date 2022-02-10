<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Group;
use App\Models\GroupMember;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        Group::create([
            'name' => 'The prospects of a postgraduate qualification in the UK',
            'user_id' => 1,
            'icon' => 'fa-graduation-cap'
        ]);

        //2
        Group::create([
            'name' => 'The prospects of a postgraduate qualification in the Canada',
            'user_id' => 1,
            'icon' => 'fa-graduation-cap'
        ]);

        //3
        Group::create([
            'name' => 'Dependant visa applications for UK & Canada',
            'user_id' => 1,
            'icon' => 'fa-file-text'
        ]);

        //4
        Group::create([
            'name' => 'Visa rejections and how to avoid them',
            'user_id' => 1,
            'icon' => 'fa-times-circle'
        ]);

        //5
        Group::create([
            'name' => 'Financing your studies abroad',
            'user_id' => 1,
            'icon' => 'fa-money'
        ]);

        //6
        Group::create([
            'name' => 'Work experience, networking and job search strategies',
            'user_id' => 1,
            'icon' => 'fa-briefcase'
        ]);

        GroupMember::create([
            'group_id' => 1, 'user_id' => 1
        ]);

        GroupMember::create([
            'group_id' => 2, 'user_id' => 1
        ]);

        GroupMember::create([
            'group_id' => 3, 'user_id' => 1
        ]);

        GroupMember::create([
            'group_id' => 4, 'user_id' => 1
        ]);

        GroupMember::create([
            'group_id' => 5, 'user_id' => 1
        ]);

        GroupMember::create([
            'group_id' => 6, 'user_id' => 1
        ]);
    }
}
