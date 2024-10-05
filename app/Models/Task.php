<?php

namespace App\Models;

use App\TaskStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory,SoftDeletes;
     protected $fillable = ['client_id','user_id', 'project_id','title', 'description', 'deadline_at', 'status'];
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
    public function client():BelongsTo{
        return $this->belongsTo(Client::class);
    }
    public function project():BelongsTo{
        return $this->belongsTo(Project::class);
    }
    public function casts():array{
        return [
            'status'=>TaskStatus::class
        ];
    }
}