<?php

namespace App\Enums;

enum  UserRoleEnum :string
{
    case UTILISATEUR_CENTRAL = 'utilisateur central';
    case UTILISATEUR_RÉGIONAL = 'utilisateur régional';
    case UTILISATEUR_LOCAL = 'utilisateur local';
    case INTERVENANT = 'intervenant';
    case ENTREPRISE = 'entreprise';
}