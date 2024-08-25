<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = ['nome', 'site', 'uf' , 'email'];


    public function produtos(){             //Foreign_key                    
        return $this->hasMany(Item::class, 'fornecedor_id', 'id');
    }
}
