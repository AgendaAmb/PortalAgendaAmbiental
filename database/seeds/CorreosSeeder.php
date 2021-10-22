<?php

use Illuminate\Database\Seeder;
use App\Correos;

class CorreosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $correo = new Correos();
        $correo->email="coordinacion.academica@uaslp.mx";
        $correo->eje_id=1;
        $correo->save();

        $correo = new Correos();
        $correo->email="pmpca@uaslp.mx";
        $correo->eje_id=1;
        $correo->save();

        $correo = new Correos();
        $correo->email="pmpca.enrem@uaslp.mx";
        $correo->eje_id=1;
        $correo->save();

        $correo = new Correos();
        $correo->email="imarec.academico@uaslp.mx";
        $correo->eje_id=1;
        $correo->save();

        $correo = new Correos();
        $correo->email="imarec.control@uaslp.mx";
        $correo->eje_id=1;
        $correo->save();

        $correo = new Correos();
        $correo->email="gestion.ambiental@uaslp.mx";
        $correo->eje_id=2;
        $correo->save();
        
        $correo = new Correos();
        $correo->email="unibici@uaslp.mx";
        $correo->eje_id=2;
        $correo->save();
        
        $correo = new Correos();
        $correo->email="unihuerto@uaslp.mx";
        $correo->eje_id=2;
        $correo->save();

        $correo = new Correos();
        $correo->email="proserem@uaslp.mx";
        $correo->eje_id=2;
        $correo->save();

        $correo = new Correos();
        $correo->email="vinculacion.agenda@uaslp.mx";
        $correo->eje_id=3;
        $correo->save();

        $correo = new Correos();
        $correo->email="difusion.agenda@uaslp.mx";
        $correo->eje_id=5;
        $correo->save();
        
        $correo = new Correos();
        $correo->email="rtic.ambiental@uaslp.mx";
        $correo->eje_id=4;
        $correo->save();

        $correo = new Correos();
        $correo->email="agenda.ambiental@uaslp.mx ";
        $correo->eje_id=4;
        $correo->save();

        $correo = new Correos();
        $correo->email="imarec@uaslp.mx";
        $correo->eje_id=4;
        $correo->save();


        

    }
}
