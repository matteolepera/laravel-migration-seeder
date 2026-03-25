<?php

namespace Database\Seeders;

use App\Models\Train;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// IMPORT FAKER
use Faker\Generator as Faker;

class TrainsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        //Array con le aziende it.
        $companies = ['Trenitalia', 'Italo', 'Trenord', 'Circumvesuviana'];
        //Array con le stazioni.
        $stations = [
            'Roma Termini',
            'Milano Centrale',
            'Napoli Centrale',
            'Torino Porta Nuova',
            'Firenze Santa Maria Novella',
            'Bologna Centrale',
            'Venezia Santa Lucia',
            'Genova Piazza Principe',
            'Palermo Centrale',
            'Bari Centrale',
        ];
        //Array prefissi treni.
        $trainPrefixes = ['FR', 'IC', 'R', 'RV', 'EC', 'EN'];

        for ($i = 0; $i < 20; $i++) {
            //ISTANZA
            $newTrain = new Train();
            //Treno canellato 10% di possibilità
            $isCancelled = $faker->boolean(10);
            //Data di partenza da oggi a 30 giorni.
            $departureAt = $faker->dateTimeBetween('today', '+30 days');
            //Stazione di partenza
            $departureStation = $faker->randomElement($stations);
            //Stazione di arrivo
            //con array_diff mi da l'array senza la stazione di partenza
            $arrivalStation = $faker->randomElement(array_diff($stations, [$departureStation]));

            $newTrain->company = $faker->randomElement($companies);
            $newTrain->departure_station = $departureStation;
            $newTrain->departure_at = $departureAt;
            $newTrain->arrival_station = $arrivalStation;
            //Copio l'ora di partenza, aggiungendo da 30 minuti a 5 ore
            $newTrain->arrival_at = (clone $departureAt)->modify('+' . $faker->numberBetween(30, 300) . ' minutes');
            $newTrain->train_code = $faker->randomElement($trainPrefixes) . $faker->unique()->numberBetween(1000, 9999);
            $newTrain->total_carriages = $faker->numberBetween(3, 12);
            $newTrain->is_cancelled = $isCancelled;
            $newTrain->is_on_time = $isCancelled ? false : $faker->boolean(80); // 80% in orario se non viene cancellato

            //SALVATAGGIO
            $newTrain->save();
        }
    }
}
