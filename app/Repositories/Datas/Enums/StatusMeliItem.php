<?php

namespace App\Repositories\Datas\Enums;

enum StatusMeliItem: string
{
    case in_process = 'Em processamento';

    case processed = 'Processado';
}
