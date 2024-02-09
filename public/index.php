<?php
use Twig\Loader\FilesystemLoader ;
use EsperoSoft\Faker\Faker;
require_once dirname(__DIR__) .'/vendor/autoload.php';

$loader = new FilesystemLoader(dirname(__DIR__) .'/templates');

$twig = new \Twig\Environment($loader, [
    //'cache' => dirname(__DIR__) .'/var/cache',
]);

$faker = new Faker();

$users=[];
 for ($i=0; $i<15 ;$i++){

        $listuesr = [
            'full_name' =>$faker->full_name(),
            'email' =>$faker->email(),
            'address' => [
                'street' => $faker->streetAddress(),
                'code_postal' => $faker->codePostal(),
                'city' => $faker->city(),
                'country' => $faker->country()

            ],
            'age' =>rand(12, 60),
            'picture' =>$faker->image(),
            'cover' =>$faker->image(),
            'createdAt'=>$faker->dateTime(),
            
            
        ];
        $users[] = $listuesr;


 }

// echo "<h1>hello world</h1>";
echo $twig->render('home.html.twig' , [ 
    "title" => "Home" ,
    "users" => $users] ,

  );
