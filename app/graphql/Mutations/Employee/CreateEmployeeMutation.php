<?php

namespace App\GraphQL\Mutations\Employee;

use App\Models\Employee;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class CreateEmployeeMutation extends Mutation
{
  protected $attributes = [
    'name' => 'createEmployee',
    'description' => 'A mutation to create a employee'
  ];

  public function type(): Type
  {
    return GraphQL::type('Employee');
  }

  public function args(): array
  {
    return [
      'first_name' => [
        'name' => 'first_name',
        'type' => Type::string(),
        'rules' => ['required']
      ],
      'last_name' => [
        'name' => 'last_name',
        'type' => Type::string(),
        'rules' => ['required']
      ],
      'email' => [
        'name' => 'email',
        'type' => Type::string(),
        'rules' => ['required']
      ],
      'phone' => [
        'name' => 'phone',
        'type' => Type::string(),
        'rules' => ['required']
      ],
      'store_id' => [
        'name' => 'store_id',
        'type' => Type::int(),
        'rules' => ['required']
      ],
    ];
  }

  public function resolve($root, $args)
  {
    $employee = new Employee();
    $employee->fill($args);
    $employee->fill([
      'created_at' => now(),
      'updated_at' => now(),
    ]);
    $employee->save();
    return $employee;
  }
}
