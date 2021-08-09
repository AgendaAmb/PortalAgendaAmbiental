<?php

use App\Models\Module;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class PassportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('passport:install');

        foreach (Module::all() as $module)

            Artisan::call('passport:client --name="'.$module->name.'" --user_id=1 --redirect_uri='.$module->url);

        # Token temporal para 17 Gemas.
        $tempToken = 'ezyE4A80cfBdZHmlZgRkr6VkORvWlh5otJcW8Ir8';

    }
}
