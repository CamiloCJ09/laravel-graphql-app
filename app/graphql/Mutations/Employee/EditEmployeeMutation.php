<?php

namespace App\GraphQL\Mutations\Employee;

use App\Models\Employee;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class EditEmployeeMutation extends Mutation
{
  protected $attributes = [
    'name' => 'editEmployee',
    'description' => 'A mutation to edit a employee'
  ];

  public function type(): Type
  {
    return GraphQL::type('Employee');
  }

  public function args(): array
  {
    return [
      'id' => [
        'name' => 'id',
        'type' => Type::int(),
        'rules' => ['required']
      ],
      'first_name' => [
        'name' => 'first_name',
        'type' => Type::string()
      ],
      'last_name' => [
        'name' => 'last_name',
        'type' => Type::string()
      ],
      'email' => [
        'name' => 'email',
        'type' => Type::string()
      ],
      'phone' => [
        'name' => 'phone',
        'type' => Type::string()
      ],
      'store_id' => [
        'name' => 'store_id',
        'type' => Type::int()
      ],
    ];
  }

  public function resolve($root, $args)
  {
    $employee = Employee::findOrFail($args['id']);
    $employee->fill([
      'updated_at' => now(),
    ]);
    $employee->update($args);
    return $employee;
  }
}
