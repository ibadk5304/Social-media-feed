<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Theme extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded=[];



    public function createdBy(){  //user(){
        return $this->belongsTo('\App\Models\User', 'created_by');
    }
    public function updatedBy()
    {
        return $this->belongsTo('\App\Models\User', 'deleted_by');
    }
    public function deletedBy()
    {
        return $this->belongsTo('\App\Models\User', 'deleted_by');
    }
}
