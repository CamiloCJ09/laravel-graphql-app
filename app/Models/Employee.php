<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
  use HasFactory;

  protected $table = 'employees';

  protected $primaryKey = 'id';


  protected $fillable = [
    'first_name',
    'last_name',
    'email',
    'phone',
    'store_id',
    'created_at',
    'updated_at',
  ];

  public function store()
  {
    return $this->belongsTo(Store::class);
  }

  public function tips()
  {
    return $this->hasMany(Tip::class);
  }

  public function sales()
  {
    return $this->hasMany(Sale::class);
  }

  public function __set($name, $value)
  {
    $this->$name = $value;
  }

  public function __get($name)
  {
    return $this->$name;
  }

  public function __isset($name)
  {
    return isset($this->$name);
  }

  public function __serialize()
  {
    return $this->toArray();
  }

  public function __unserialize($data)
  {
    $this->fill($data);
  }
}
