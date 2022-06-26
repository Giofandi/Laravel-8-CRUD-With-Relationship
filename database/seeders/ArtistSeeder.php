<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artist;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
Artist::create(['id' => '1', 'name' => 'Audioslave']);
Artist::create(['id' => '2', 'name' => 'Led Zeppelin']);
Artist::create(['id' => '3', 'name' => 'Metallica']);
Artist::create(['id' => '4', 'name' => 'Queen']);
Artist::create(['id' => '5', 'name' => 'Def Leppard']);
Artist::create(['id' => '6', 'name' => 'Faith No More']);
Artist::create(['id' => '7', 'name' => 'Foo Fighters']);
Artist::create(['id' => '8', 'name' => "Guns N' Roses"]);
Artist::create(['id' => '9', 'name' => 'Jimi Hendrix']);
Artist::create(['id' => '10', 'name' => 'Joe Satriani']);
Artist::create(['id' => '11', 'name' => 'Nirvana']);
Artist::create(['id' => '12', 'name' => 'Pearl Jam']);
Artist::create(['id' => '13', 'name' => 'Red Hot Chili Peppers']);
Artist::create(['id' => '14', 'name' => 'Smashing Pumpkins']);
Artist::create(['id' => '15', 'name' => 'Soundgarden']);
Artist::create(['id' => '16', 'name' => 'Stone Temple Pilots']);
Artist::create(['id' => '17', 'name' => 'System Of A Down']);
Artist::create(['id' => '18', 'name' => 'The Doors']);
Artist::create(['id' => '19', 'name' => 'The Police']);
Artist::create(['id' => '20', 'name' => 'The Rolling Stones']);
Artist::create(['id' => '21', 'name' => 'U2']);
Artist::create(['id' => '22', 'name' => 'UB40']);
Artist::create(['id' => '23', 'name' => 'Van Halen']);
Artist::create(['id' => '24', 'name' => 'Whitesnake']);
Artist::create(['id' => '25', 'name' => 'Avril Lavigne']);
Artist::create(['id' => '26', 'name' => 'Scorpions']);
Artist::create(['id' => '27', 'name' => 'Cake']);
    }
}
