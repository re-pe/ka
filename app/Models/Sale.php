<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sale extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pardavimai';

    protected $fillable = [
        'darbuotojo_id',
        'sutarties_nr',
        'rekomendacija',
        'greitis',
        'aptarnavimas',
        'pastabos',
        'sutikimas',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'darbuotojo_id', 'id');
    }
}
