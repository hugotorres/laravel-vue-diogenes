<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(
            [
                'title' => 'Tecnologia',
                'image' => 'tecnologia.png',
                'icon' => 'icon.png',
                'description' => 'texto descriptivo de la categoria actual, este texto es dummy asi que debe ser actualizado y ademas devberia crearse un crud para las categorias'
            ]
        );

        Category::create(
            [
                'title' => 'Muebles',
                'image' => 'muebles.png',
                'icon' => 'icon.png',
                'description' => 'texto descriptivo de la categoria actual, este texto es dummy asi que debe ser actualizado y ademas devberia crearse un crud para las categorias'

            ]
        );

        Category::create(
            [
                'title' => 'Mascotas',
                'image' => 'mascotas.png',
                'icon' => 'icon.png',
                'description' => 'texto descriptivo de la categoria actual, este texto es dummy asi que debe ser actualizado y ademas devberia crearse un crud para las categorias'

            ]
        );

        Category::create(
            [
                'title' => 'Deportes',
                'image' => 'deportes.png',
                'icon' => 'icon.png',
                'description' => 'texto descriptivo de la categoria actual, este texto es dummy asi que debe ser actualizado y ademas devberia crearse un crud para las categorias'

            ]
        );
    }
}
