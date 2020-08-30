<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Application;
use App\Category;


class ApplicationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Emiliano',
            'email'  => 'emilianoandres2010@gmail.com',
            'role'   => 'Desarrollador',
            'password'   =>  Hash::make(12345678)
        ]);

        User::create([
            'name' => 'Oscar',
            'email'  => 'oscargomez@gmail.com',
            'role'   => 'Cliente',
            'password'   =>  Hash::make(12345678)
        ]);

        Category::truncate(); // Evita duplicar datos

        $categoria = new Category();
        $categoria->name = "Accion";
        $categoria->save();

        $categoria = new Category();
        $categoria->name = "Aventura";
        $categoria->save();

        $categoria = new Category();
        $categoria->name = "Educativos";
        $categoria->save();

        $categoria = new Category();
        $categoria->name = "Estrategia";
        $categoria->save();

        $categoria = new Category();
        $categoria->name = "Musica";
        $categoria->save();

        $categoria = new Category();
        $categoria->name = "Rompecabezas";
        $categoria->save();

        $categoria = new Category();
        $categoria->name = "Juegos de Mesa";
        $categoria->save();

        $categoria = new Category();
        $categoria->name = "Simulacion";
        $categoria->save();

        Application::truncate(); // Evita duplicar datos

        $aplicacion = new Application();
        $aplicacion->name = "Whatsapp";
        $aplicacion->image = "favicon.jpg";
        $aplicacion->price = 105;
        $aplicacion->category_id = 3;
        $aplicacion->user_id = 1;
        $aplicacion->save();

        $aplicacion = new Application();
        $aplicacion->name = "Telegram";
        $aplicacion->image = "telegram.png";
        $aplicacion->price = 85;
        $aplicacion->category_id = 3;
        $aplicacion->user_id = 1;
        $aplicacion->save();

        $aplicacion = new Application();
        $aplicacion->name = "Instagram";
        $aplicacion->image = "instagram.png";
        $aplicacion->price = 70;
        $aplicacion->category_id = 3;
        $aplicacion->user_id = 1;
        $aplicacion->save();
        
        $aplicacion = new Application();
        $aplicacion->name = "Slack";
        $aplicacion->image = "slack.png";
        $aplicacion->price = 110;
        $aplicacion->category_id = 3;
        $aplicacion->user_id = 1;
        $aplicacion->save();

        $aplicacion = new Application();
        $aplicacion->name = "Zoom";
        $aplicacion->image = "zoom.png";
        $aplicacion->price = 60;
        $aplicacion->category_id = 3;
        $aplicacion->user_id = 1;
        $aplicacion->save();

        $aplicacion = new Application();
        $aplicacion->name = "Duolingo";
        $aplicacion->image = "duolingo.png";
        $aplicacion->price = 35;
        $aplicacion->category_id = 3;
        $aplicacion->user_id = 1;
        $aplicacion->save();

        $aplicacion = new Application();
        $aplicacion->name = "Facebook";
        $aplicacion->image = "facebook.png";
        $aplicacion->price = 120;
        $aplicacion->category_id = 3;
        $aplicacion->user_id = 1;
        $aplicacion->save();

        $aplicacion = new Application();
        $aplicacion->name = "Hangout";
        $aplicacion->image = "hangout.png";
        $aplicacion->price = 88;
        $aplicacion->category_id = 3;
        $aplicacion->user_id = 1;
        $aplicacion->save();

        $aplicacion = new Application();
        $aplicacion->name = "Linkedin";
        $aplicacion->image = "linkedin.jpg";
        $aplicacion->price = 115;
        $aplicacion->category_id = 3;
        $aplicacion->user_id = 1;
        $aplicacion->save();

        $aplicacion = new Application();
        $aplicacion->name = "Snapchat";
        $aplicacion->image = "snapchat.jpg";
        $aplicacion->price = 50;
        $aplicacion->category_id = 3;
        $aplicacion->user_id = 1;
        $aplicacion->save();

        $aplicacion = new Application();
        $aplicacion->name = "Microsoft Teams";
        $aplicacion->image = "teams.jpg";
        $aplicacion->price = 160;
        $aplicacion->category_id = 3;
        $aplicacion->user_id = 1;
        $aplicacion->save();

        $aplicacion = new Application();
        $aplicacion->name = "Twitter";
        $aplicacion->image = "twitter.png";
        $aplicacion->price = 118;
        $aplicacion->category_id = 3;
        $aplicacion->user_id = 1;
        $aplicacion->save();

        $aplicacion = new Application();
        $aplicacion->name = "Cisco Webex";
        $aplicacion->image = "webex.png";
        $aplicacion->price = 90;
        $aplicacion->category_id = 3;
        $aplicacion->user_id = 1;
        $aplicacion->save();

        $aplicacion = new Application();
        $aplicacion->name = "Among Us";
        $aplicacion->image = "amongUs.jpg";
        $aplicacion->price = 25;
        $aplicacion->category_id = 1;
        $aplicacion->user_id = 1;
        $aplicacion->save();

        $aplicacion = new Application();
        $aplicacion->name = "Super Mario Run";
        $aplicacion->image = "supermario.jpg";
        $aplicacion->price = 25;
        $aplicacion->category_id = 1;
        $aplicacion->user_id = 1;
        $aplicacion->save();

        $aplicacion = new Application();
        $aplicacion->name = "Super Start Fish";
        $aplicacion->image = "superstartfish.png";
        $aplicacion->price = 30;
        $aplicacion->category_id = 1;
        $aplicacion->user_id = 1;
        $aplicacion->save();

        $aplicacion = new Application();
        $aplicacion->name = "The Elf";
        $aplicacion->image = "elf.jpg";
        $aplicacion->price = 28;
        $aplicacion->category_id = 1;
        $aplicacion->user_id = 1;
        $aplicacion->save();

        $aplicacion = new Application();
        $aplicacion->name = "Damas";
        $aplicacion->image = "damas.png";
        $aplicacion->price = 15;
        $aplicacion->category_id = 7;
        $aplicacion->user_id = 1;
        $aplicacion->save();

        $aplicacion = new Application();
        $aplicacion->name = "Ajedrez";
        $aplicacion->image = "ajedrez.png";
        $aplicacion->price = 10;
        $aplicacion->category_id = 7;
        $aplicacion->user_id = 1;
        $aplicacion->save();

        $aplicacion = new Application();
        $aplicacion->name = "Tetris";
        $aplicacion->image = "tetris.jpg";
        $aplicacion->price = 18;
        $aplicacion->category_id = 6;
        $aplicacion->user_id = 1;
        $aplicacion->save();

        $aplicacion = new Application();
        $aplicacion->name = "Bubble Shooter";
        $aplicacion->image = "bubble.png";
        $aplicacion->price = 16;
        $aplicacion->category_id = 6;
        $aplicacion->user_id = 1;
        $aplicacion->save();

        $aplicacion = new Application();
        $aplicacion->name = "Flow Free";
        $aplicacion->image = "flow.png";
        $aplicacion->price = 22;
        $aplicacion->category_id = 6;
        $aplicacion->user_id = 1;
        $aplicacion->save();

        $aplicacion = new Application();
        $aplicacion->name = "Buscaminas";
        $aplicacion->image = "buscaminas.jpg";
        $aplicacion->price = 30;
        $aplicacion->category_id = 6;
        $aplicacion->user_id = 1;
        $aplicacion->save();

        $aplicacion = new Application();
        $aplicacion->name = "Sudoku";
        $aplicacion->image = "sudoku.png";
        $aplicacion->price = 20;
        $aplicacion->category_id = 6;
        $aplicacion->user_id = 1;
        $aplicacion->save();

        $aplicacion = new Application();
        $aplicacion->name = "Guitar Band Battle";
        $aplicacion->image = "guitar.jpg";
        $aplicacion->price = 40;
        $aplicacion->category_id = 5;
        $aplicacion->user_id = 1;
        $aplicacion->save();

    }
}
