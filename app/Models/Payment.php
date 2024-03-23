<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
  use HasFactory;

  protected $table = 'payments';

  protected $primaryKey = 'id';

  protected $fillable = [
    'sale_id',
    'amount',
    'employee_id',
    'date',
    'created_at',
    'updated_at',
  ];

  public function sale()
  {
    return $this->belongsTo(Sale::class);
  }

  public function employee()
  {
    return $this->belongsTo(Employee::class);
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
