<?php

use App\Module;
use App\User;
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
            "modules" => ['Control escolar']
        ],
        [
            "name" => "Iván",
            "email" => "ivan.mena@uaslp.mx",
            "middlename" => "Mena",
            "surname" => "Loyola",
            "password" => '$2y$10$fiywHYoIwR6IideF12Rg4.g98YjKDrXR2j/WmhaKcU0pOINTJIBKO',
            "curp" => "MELI791017HSPNYV04",
            "modules" => ['Control escolar']
        ],
        [
            "name" => "Aldo Axel",
            "email" => "haloodst98@live.ca",
            "middlename" => "Díaz",
            "surname" => "Guzmán",
            "password" => '$2y$10$NikNxRP9ZzqE2mVUJ4kkQuIQ91ChazA1zMYOnJuEVXzMckFwUCBPG',
            "curp" => "DIGA980314HASZZL08",
            "modules" => ['Control escolar']
        ],
        [
            "name" => "Karina Sumire",
            "email" => "karinaogalvez@gmail.com",
            "middlename" => "Ortiz",
            "surname" => "Gálvez",
            "password" => '$2y$10$RQ67eLGOCFC3sY9XoTvZZeGWRnlkc.xiJQK7gXYVEW1hW9uCODoGi',
            "curp" => "OIGK980906MDFRLR00",
            "modules" => ['Control escolar']
        ],
        [
            "name" => "Mayra Yatnely",
            "email" => "yatnely@gmail.com",
            "middlename" => "Rodríguez",
            "surname" => "Montenegro",
            "password" => '$2y$10$40v5FL2CMVulNRXbFMxOSOUH7UR/fHPgVMU3tzlOGGOuKUDkOxPlC',
            "curp" => "ROMM861015MSPDNY05",
            "modules" => ['Control escolar']
        ],
        [
            "name" => "Alicia",
            "email" => "varte.ali@gmail.com",
            "middlename" => "Vargas",
            "surname" => "Ortega",
            "password" => '$2y$10$rvwTKYQryAbigGLQX/S.X.2fVZLu0t8ZPQGreuh9Qyu/vu/TwrOQm',
            "curp" => "VAOA891114MSPRRL06",
            "modules" => ['Control escolar']
        ],
        [
            "name" => "Mariana",
            "email" => "pennylane196873@gmail.com",
            "middlename" => "Gómez",
            "surname" => "RAMIREZ",
            "password" => '$2y$10$/QaD.SaNRTPPjHb/HCWZsu2qEd7uR69Pl67ull7F53midqPEKM4hW',
            "curp" => "GORM921007MSPMMR05",
            "modules" => ['Control escolar']
        ],
        [
            "name" => "Ana Rebeca",
            "email" => "beca529@hotmail.com",
            "middlename" => "Mata",
            "surname" => "Lopez",
            "password" => '$2y$10$QpgDcaB9pT2lXtpBgLqh3ep2oi/FcDVbvCfsbwx8DPe02WHcRN2SW',
            "curp" => "MALA961129MSPTPN02",
            "modules" => ['Control escolar']
        ],
        [
            "name" => "ANA VALERIA",
            "email" => "valee_anaa@hotmail.com",
            "middlename" => "MARTINEZ",
            "surname" => "DIMAS",
            "password" => '$2y$10$NLDNnIho.9QfVkWPSCMgSOZcT3R00yKR7gE5gfA1Da6zFz8y.1tlq',
            "curp" => "MADA970710MSPRMN00",
            "modules" => ['Control escolar']
        ],
        [
            "name" => "NINFA EDITH",
            "email" => "nedithlopezf@gmail.com",
            "middlename" => "LÓPEZ",
            "surname" => "FLORES",
            "password" => '$2y$10$sL3y.55aJ6lw8ile1lPK8OrqrQ.frlJI4PvceQ//rtejsFoSGIBhy',
            "curp" => "LOFN850806MSPPLN05",
            "modules" => ['Control escolar']
        ],
        [
            "name" => "MIGUEL ANGEL",
            "email" => "a262698@alumnos.uaslp.mx",
            "middlename" => "MENDEZ",
            "surname" => "ORTA",
            'dependency' => 'FACULTAD DE INGENIERIA',
            "modules" => ['Administración', 'Control Escolar', 'Biodiversidad']
        ],
        [
            "name" => "JACOB ALEJANDRO",
            "email" => "a260651@alumnos.uaslp.mx",
            "middlename" => "LOREDO",
            "surname" => "DE LA ROSA",
            'dependency' => 'FACULTAD DE INGENIERIA',
            "modules" => ['Administración', 'Control Escolar', 'Biodiversidad']
        ]
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

            # Modelo de usuario.
            $user_model =  User::create($user_data);

            # Agrega los módulos del usuario.
            foreach ($user['modules'] as $moduleName)
            {
                $module = Module::firstWhere('name', $moduleName);
            
                $user_model->userModules()->attach($module->id);
            }
        }
    }
}
