<?php

use App\Models\Module;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

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
        /*
        $tempToken = 'ezyE4A80cfBdZHmlZgRkr6VkORvWlh5otJcW8Ir8';

        DB::table('oauth_clients')
            ->where('name', '17 Gemas')
            ->update([ 'secret' => $tempToken ]);

        DB::table('oauth_clients')
            ->where('name', 'Control Escolar')
            ->update([ 'secret' => 'qhKwQafNp4tbWjkBvuFxxzG7wYhjUHzgVfLCNk1d' ]);*/
    }
}
