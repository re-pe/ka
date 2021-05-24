<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'darbuotojai';

    protected $fillable = [
        'name',
        'surname',
    ];

    // Get employee sales
    public function sales()
    {
            return $this->hasMany(Sale::class, 'darbuotojo_id', 'id');
    }
}
