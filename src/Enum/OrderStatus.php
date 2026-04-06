<?php

declare(strict_types=1);

namespace App\SharedBundle\Enum;

enum OrderStatus: string
{
    case Processing = 'Processing';
    case Completed = 'Completed';
    case Cancelled = 'Cancelled';
    case Failed = 'Failed';
}