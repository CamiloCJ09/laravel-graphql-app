<?php

namespace App\GraphQL\Mutations\Sale;

use App\Models\Sale;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class CreateSaleMutation extends Mutation
{
  protected $attributes = [
    'name' => 'createSale',
    'description' => 'A mutation to create a sale'
  ];

  public function type(): Type
  {
    return GraphQL::type('Sale');
  }

  public function args(): array
  {
    return [
      'customer_id' => [
        'name' => 'customer_id',
        'type' => Type::string(),
        'rules' => ['required']
      ],
      'employee_id' => [
        'name' => 'employee_id',
        'type' => Type::int(),
        'rules' => ['required']
      ],
      'store_id' => [
        'name' => 'store_id',
        'type' => Type::int(),
        'rules' => ['required']
      ],
      'date' => [
        'name' => 'date',
        'type' => Type::string(),
        'rules' => ['required']
      ],
      'total' => [
        'name' => 'total',
        'type' => Type::float(),
        'rules' => ['required']
      ]
    ];
  }

  public function resolve($root, $args)
  {
    $sale = new Sale();
    $sale->fill([
      'customer_id' => $args['customer_id'],
      'employee_id' => $args['employee_id'],
      'store_id' => $args['store_id'],
      'date' => $args['date'],
      'total' => $args['total'],
      'created_at' => now(),
      'updated_at' => now(),
    ]);
    return Sale::create($sale->toArray());
  }
}
