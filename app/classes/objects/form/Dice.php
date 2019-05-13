<?php

namespace App\Objects\Form;

class Dice extends \Core\Page\Objects\Form {

    const Vienas = 1;
    const Du = 2;
    const Trys = 3;
    const Keturi = 4;
    const Penki = 5;
    const Šeši = 6;

    public static function getDiceImages() {
        return [
            self::Vienas => 'images/vienas.png',
            self::Du => 'images/du.jpg',
            self::Trys => 'images/trys.png',
            self::Keturi => 'images/keturi.png',
            self::Penki => 'images/penki.png',
            self::Šeši => 'images/sesi.png',
        ];
    }

    public static function getDiceValues() {
        return [
            self::Vienas => 1,
            self::Du => 2,
            self::Trys => 3,
            self::Keturi => 4,
            self::Penki => 5,
            self::Šeši => 6,
        ];
    }

}
