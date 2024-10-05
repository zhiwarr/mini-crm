<?php

namespace App;

enum TaskStatus :string
{
    case OPEN = 'open';
    case IN_PROGRESS = 'in_progress';
    case PENDING = 'pending';
    case BLOCKED = 'blocked';
    case WAITING_CLIENT = 'waiting_client';
    case CANCELLED = 'cancelled';
}
