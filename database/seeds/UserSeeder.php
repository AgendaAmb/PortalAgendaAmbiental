<?php

use App\Models\Auth\Extern;
use App\Models\Auth\Student;
use App\Models\Auth\Worker;
use App\Models\Module;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Usuarios del app
    */
    private $users =  [
        [
            "name" => "Andrés Alberto",
            "email" => "andres.rangelor@gmail.com",
            "middlename" => "Rangel",
            "surname" => "Orduña",
            "password" => '$2y$10$ZQfpxcwS0jqxdtfovHKzyuUvsGvFf224.g8MORbxouwQ8HqeTqQWG',
            "curp" => "RAOA910713HSPNRN02",
            "modules" => ['Control escolar'],
            "roles" => [ 'user' ],
            'user_type' => Extern::class,
        ],
        [
            "name" => "Iván",
            "email" => "ivan.mena@uaslp.mx",
            "middlename" => "Mena",
            "surname" => "Loyola",
            "password" => '$2y$10$fiywHYoIwR6IideF12Rg4.g98YjKDrXR2j/WmhaKcU0pOINTJIBKO',
            "curp" => "MELI791017HSPNYV04",
            "modules" => ['Control escolar'],
            "roles" => [ 'user' ],
            'user_type' => Extern::class,
        ],
        [
            "name" => "Aldo Axel",
            "email" => "haloodst98@live.ca",
            "middlename" => "Díaz",
            "surname" => "Guzmán",
            "password" => '$2y$10$NikNxRP9ZzqE2mVUJ4kkQuIQ91ChazA1zMYOnJuEVXzMckFwUCBPG',
            "curp" => "DIGA980314HASZZL08",
            "modules" => ['Control escolar'],
            "roles" => [ 'user' ],
            'user_type' => Extern::class,
        ],
        [
            "name" => "Karina Sumire",
            "email" => "karinaogalvez@gmail.com",
            "middlename" => "Ortiz",
            "surname" => "Gálvez",
            "password" => '$2y$10$RQ67eLGOCFC3sY9XoTvZZeGWRnlkc.xiJQK7gXYVEW1hW9uCODoGi',
            "curp" => "OIGK980906MDFRLR00",
            "modules" => ['Control escolar'],
            "roles" => [ 'user' ],
            'user_type' => Extern::class,
        ],
        [
            "name" => "Mayra Yatnely",
            "email" => "yatnely@gmail.com",
            "middlename" => "Rodríguez",
            "surname" => "Montenegro",
            "password" => '$2y$10$40v5FL2CMVulNRXbFMxOSOUH7UR/fHPgVMU3tzlOGGOuKUDkOxPlC',
            "curp" => "ROMM861015MSPDNY05",
            "modules" => ['Control escolar'],
            "roles" => [ 'user' ],
            'user_type' => Extern::class,
        ],
        [
            "name" => "Alicia",
            "email" => "varte.ali@gmail.com",
            "middlename" => "Vargas",
            "surname" => "Ortega",
            "password" => '$2y$10$rvwTKYQryAbigGLQX/S.X.2fVZLu0t8ZPQGreuh9Qyu/vu/TwrOQm',
            "curp" => "VAOA891114MSPRRL06",
            "modules" => ['Control escolar'],
            "roles" => [ 'user' ],
            'user_type' => Extern::class,
        ],
        [
            "name" => "Mariana",
            "email" => "pennylane196873@gmail.com",
            "middlename" => "Gómez",
            "surname" => "RAMIREZ",
            "password" => '$2y$10$/QaD.SaNRTPPjHb/HCWZsu2qEd7uR69Pl67ull7F53midqPEKM4hW',
            "curp" => "GORM921007MSPMMR05",
            "modules" => ['Control escolar'],
            "roles" => [ 'user' ],
            'user_type' => Extern::class,
        ],
        [
            "name" => "Ana Rebeca",
            "email" => "beca529@hotmail.com",
            "middlename" => "Mata",
            "surname" => "Lopez",
            "password" => '$2y$10$QpgDcaB9pT2lXtpBgLqh3ep2oi/FcDVbvCfsbwx8DPe02WHcRN2SW',
            "curp" => "MALA961129MSPTPN02",
            "modules" => ['Control escolar'],
            "roles" => [ 'user' ],
            'user_type' => Extern::class,
        ],
        [
            "name" => "ANA VALERIA",
            "email" => "valee_anaa@hotmail.com",
            "middlename" => "MARTINEZ",
            "surname" => "DIMAS",
            "password" => '$2y$10$NLDNnIho.9QfVkWPSCMgSOZcT3R00yKR7gE5gfA1Da6zFz8y.1tlq',
            "curp" => "MADA970710MSPRMN00",
            "modules" => ['Control escolar'],
            "roles" => [ 'user' ],
            'user_type' => Extern::class,
        ],
        [
            "name" => "NINFA EDITH",
            "email" => "nedithlopezf@gmail.com",
            "middlename" => "LÓPEZ",
            "surname" => "FLORES",
            "password" => '$2y$10$sL3y.55aJ6lw8ile1lPK8OrqrQ.frlJI4PvceQ//rtejsFoSGIBhy',
            "curp" => "LOFN850806MSPPLN05",
            "modules" => ['Control escolar'],
            "roles" => [ 'user' ],
            'user_type' => Extern::class,
        ],
        [
            "id" => "262698",
            "name" => "MIGUEL ANGEL",
            "email" => "a262698@alumnos.uaslp.mx",
            "middlename" => "MENDEZ",
            "surname" => "ORTA",
            'dependency' => 'FACULTAD DE INGENIERIA',
            "modules" => [ 'Control Escolar', 'Biodiversidad'],
            "roles" => [ 'user', 'administrator' ],
            'user_type' => Student::class,
        ],
        [
            "id" => "260651",
            "name" => "JACOB ALEJANDRO",
            "email" => "a260651@alumnos.uaslp.mx",
            "middlename" => "LOREDO",
            "surname" => "DE LA ROSA",
            'dependency' => 'FACULTAD DE INGENIERIA',
            "modules" => ['17 gemas', 'Biodiversidad'],
            "roles" => [ 'user', 'administrator' ],
            'user_type' => Student::class,
        ],
        [
            "id" => "11007",
            "name" => "MARIA EUGENIA",
            "email" => "eugenia.almendarez@uaslp.mx",
            "middlename" => "ALMENDAREZ",
            "surname" => "GARCIA",
            'dependency' => 'COORDINACION DE AGENDA AMBIENTAL DE LA UASLP',
            "modules" => [ '17 Gemas', 'Control Escolar', 'Biodiversidad' ],
            "roles" => [ 'administrator' ],
            'user_type' => Worker::class,
        ],
        [
            "id" => "13763",
            "name" => "MIGUEL ANGEL",
            "email" => "miguel.mendez@uaslp.mx",
            "middlename" => "MENDEZ",
            "surname" => "MONTENEGRO",
            'dependency' => 'FACULTAD DE MEDICINA',
            "modules" => [ '17 Gemas', 'Control Escolar', 'Biodiversidad' ],
            "roles" => [ 'administrator' ],
            'user_type' => Worker::class,
        ],
    ];


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->users as $user)
        {
            # Quita la llave 'modules'
            $user_data = $user;
            unset($user_data['modules']);
            unset($user_data['roles']);
            unset($user_data['user_type']);

            # Modelo de usuario.
            $user_model =  $user['user_type']::create($user_data);

            # Agrega los módulos del usuario.
            foreach ($user['modules'] as $moduleName)
            {
                $module = Module::firstWhere('name', $moduleName);

                $user_model->attachModule($module);
            }

            # Agrega los módulos del usuario.
            foreach ($user['roles'] as $roleName)
                $user_model->assignRole($roleName);
        }
    }
}
