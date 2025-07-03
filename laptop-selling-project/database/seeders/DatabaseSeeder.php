<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       User::factory()->create([
        'name' => 'Admin',
        'role' => 'admin',
        'email' => 'admin@gmail.com',
        'password' => bcrypt('password'),
        'age' => 18,
        'gender' => 'male',
        'phone' => '09777777777',
        ]);

        $categories = [
            [
                'name' => 'Acer',
                'description' => 'Acer Inc (Acer) is an information and communication technology company that develops, designs, markets, and exports IT products.',
            ],
            [
                'name' => 'Asus',
                'description' => 'ASUS is a Taiwan-based, multinational computer hardware and consumer electronics company that was established in 1989.',
            ],
            [
                'name' => 'Dell',
                'description' => "Dell Inc., formerly PC's Limited (1984–88) and Dell Computer Corporation (1988–2003), global company that designs, develops, and manufactures personal computers (PCs) and a variety of computer-related products.",
            ],
            [
                'name' => 'Lenovo',
                'description' => "Lenovo Group Limited, is a Chinese multinational technology company specializing in designing, manufacturing, and marketing consumer electronics, personal computers, software, business solutions, and related services.",
            ],
            [
                'name' => 'MSI',
                'description' => "MSI is a world leader in gaming, business & productivity and AIoT solutions. MSI has a wide-ranging global presence spanning over 120 countries.
                ",
            ],
            [
                'name' => 'Microsoft',
                'description' => "Microsoft is the largest vendor of computer software in the world. It is also a leading provider of cloud computing services, video games, computer and gaming hardware, search and other online services.",
            ],
        ];

        foreach ($categories as $categoryData) {
        Category::create($categoryData);
        }
    }
}
