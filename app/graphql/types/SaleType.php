<?php

namespace App\Graphql\Types;

use App\Models\Sale;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class SaleType extends GraphQLType
{
  protected $attributes = [
    'name' => 'Sale',
    'description' => 'A collection of sales',
    'model' => Sale::class
  ];

  public function fields(): array
  {
    return [
      'id' => [
        'type' => Type::nonNull(Type::int()),
        'description' => 'The id of the sale'
      ],
      'date' => [
        'type' => Type::nonNull(Type::string()),
        'description' => 'The date of sale'
      ],
      'total' => [
        'type' => Type::nonNull(Type::float()),
        'description' => 'The total of sale'
      ],
      'customer_id' => [
        'type' => Type::nonNull(Type::string()),
        'description' => 'The customer of sale'
      ],
      'employee' => [
        'type' => GraphQL::type('Employee'),
        'description' => 'The employee of sale'
      ],
      'store' => [
        'type' => GraphQL::type('Store'),
        'description' => 'The store of sale'
      ],
    ];
  }
}
