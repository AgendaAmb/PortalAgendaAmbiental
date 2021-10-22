<?php

use Illuminate\Database\Seeder;
use App\ejes;
class EjesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $eje=new ejes();
        $eje->name="Educación";
        $eje->save();
        $eje=new ejes();
        $eje->name="Gestión ambiental";
        $eje->save();
        $eje=new ejes();
        $eje->name="Vinculación";
        $eje->save();
        $eje=new ejes();
        $eje->name="Administración";
        $eje->save();
        $eje=new ejes();
        $eje->name="Comunicación";
        $eje->save();
       

    }
}
