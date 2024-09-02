<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = User::where('email', 'rabigorkhaly@gmail.com')->first();
        if (!$userData) {
            User::factory()->create([
                'name' => 'Rabi Gorkhali',
                'email' => 'rabigorkhaly@gmail.com',
                'password' => bcrypt('rabigorkhaly@gmail.com'),
                'status' => 1,
                'role_id' => 1,
                'phone_number' => 9843169319,
                'date_of_birth' => '1994-09-18',
                'gender' => 'male',
                'address' => 'Bhaktapur',
            ]);
        }
    }
}
