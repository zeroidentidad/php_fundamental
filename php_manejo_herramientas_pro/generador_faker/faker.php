<?php
require_once './vendor/autoload.php';

$faker = Faker\Factory::create();

for ($i=0; $i<5; $i++) {
    print '<div align="center">';
    echo '<b>'.$faker->name.'</b><br/>';
    echo '<u>'.$faker->address.'</u><br/>';
    echo '<hr/>';
    echo $faker->text;'<br/>';
    echo '<img src="'.$faker->image($dir = './').'"><br/>';
    print '</div>';

}
