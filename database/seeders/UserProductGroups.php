<?php
namespace Database\Seeders;
use App\Models\UserProductGroup;
use Illuminate\Database\Seeder;

class UserProductGroups extends Seeder
{

    public function run()
    {
       UserProductGroup::create([
           'user_id'=>'1',
           'discount'=>'10'
       ]);

    }
}
