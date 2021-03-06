<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CoachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Sasuke Uchiha',
            'email' => 'sasuke@gmail.com', 
            'password' => Hash::make('Sasuke1234'),
            'username' => 'sasuke',
            'role' => 3,
            'bio' => 'One of the last surviving members of Konohagakure\'s Uchiha clan. After his older brother, Itachi, slaughtered their clan, Sasuke made it his mission in life to avenge them by killing Itachi. He is added to Team 7 upon becoming a ninja and, through competition with his rival and best friend, Naruto Uzumaki, Sasuke starts developing his skills. Dissatisfied with his progress, he defects from Konoha so that he can acquire the strength needed to exact his revenge. His years of seeking vengeance and his actions that followed become increasingly demanding, irrational and isolates him from others, leading him to be branded as an international criminal.',
            'city' => 'London',
            'country' => 'England'
        ]);

        User::create([
            'name' => 'Naruto Uzumaki',
            'email' => 'naruto@gmail.com', 
            'password' => Hash::make('Naruto1234'),
            'role' => 3,
            'bio' => 'One of the last surviving members of Konohagakure\'s Uchiha clan. After his older brother, Itachi, slaughtered their clan, Sasuke made it his mission in life to avenge them by killing Itachi. He is added to Team 7 upon becoming a ninja and, through competition with his rival and best friend, Naruto Uzumaki, Sasuke starts developing his skills. Dissatisfied with his progress, he defects from Konoha so that he can acquire the strength needed to exact his revenge. His years of seeking vengeance and his actions that followed become increasingly demanding, irrational and isolates him from others, leading him to be branded as an international criminal.',
            'city' => 'London',
            'country' => 'England',
            'username' => 'naruto',
        ]);

        User::create([
            'name' => 'Ichigo Kurasaki',
            'email' => 'ichigo@gmail.com', 
            'password' => Hash::make('Ichigo1234'),
            'role' => 3,
            'bio' => 'One of the last surviving members of Konohagakure\'s Uchiha clan. After his older brother, Itachi, slaughtered their clan, Sasuke made it his mission in life to avenge them by killing Itachi. He is added to Team 7 upon becoming a ninja and, through competition with his rival and best friend, Naruto Uzumaki, Sasuke starts developing his skills. Dissatisfied with his progress, he defects from Konoha so that he can acquire the strength needed to exact his revenge. His years of seeking vengeance and his actions that followed become increasingly demanding, irrational and isolates him from others, leading him to be branded as an international criminal.',
            'city' => 'London',
            'country' => 'England',
            'username' => 'ichigo',
        ]);

    }
}
