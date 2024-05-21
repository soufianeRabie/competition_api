<?php

namespace App\Enums;

enum  UserRoleEnum :int
{
    case REGIONAUX = 0;
    case CENTREAUX = 1;
    case LOCAUX = 2;
    case ADMIN = 4;
}
