<?php

namespace App\Enums;

enum  UserRoleEnum :string
{
    case UTILISATEUR_CENTRAL = 'central';
    case REGIONAL = 'regional';
    case LOCAL = 'local';
    case INTERVENANT = 'intervenant';
    case ENTREPRISE = 'entreprise';
}
