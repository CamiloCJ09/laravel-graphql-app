<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
  use HasFactory;

  protected $table = 'users';
  protected $primaryKey = 'id';

  protected $fillable = [
    'name',
    'email',
    'password',
    'email_verified_at',
    'remember_token',
    'created_at',
    'updated_at',
  ];

  public function stores()
  {
    return $this->hasMany(Store::class);
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
