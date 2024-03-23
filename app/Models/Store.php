<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
  use HasFactory;

  protected $table = 'stores';
  protected $primaryKey = 'id';
  protected $fillable = [
    'name',
    'address',
    'phone',
    'email',
    'user_id',
    'created_at',
    'updated_at',
  ];

  public function sales()
  {
    return $this->hasMany(Sale::class);
  }

  public function employees()
  {
    return $this->hasMany(Employee::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
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
