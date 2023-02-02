<?php

namespace App\Enums;

enum UserRole: int
{
    case User = 0;
    case Sorter = 1;
    case Admin = 2;

}
