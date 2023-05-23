<?php
namespace App\Enums;

use Nette\Utils\Random;

enum BookTypeEnum: string
{
    case Printed = 'printed';
    case Graphic = 'graphic';
    case Digital = 'digital';



    public static function randomValue(): string
    {
        $arr = array_column(self::cases(), 'value');

        return $arr[array_rand($arr)];
    }
}
