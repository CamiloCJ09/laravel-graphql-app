<?php

namespace App\GraphQL\Mutations\Sale;

use App\Models\Sale;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class EditSaleMutation extends Mutation
{
  protected $attributes = [
    'name' => 'editSale',
    'description' => 'A mutation to edit a sale'
  ];

  public function type(): Type
  {
    return GraphQL::type('Sale');
  }

  public function args(): array
  {
    return [
      'id' => [
        'name' => 'id',
        'type' => Type::int(),
        'rules' => ['required']
      ],
      'customer_id' => [
        'name' => 'customer_id',
        'type' => Type::string()
      ],
      'employee_id' => [
        'name' => 'employee_id',
        'type' => Type::int()
      ],
      'store_id' => [
        'name' => 'store_id',
        'type' => Type::int()
      ],
      'date' => [
        'name' => 'date',
        'type' => Type::string()
      ],
      'total' => [
        'name' => 'total',
        'type' => Type::float()
      ]

    ];
  }

  public function resolve($root, $args)
  {
    $sale = Sale::findOrFail($args['id']);
    $sale->fill([
      'updated_at' => now(),
    ]);
    $sale->update($args);
    return $sale;
  }
}
