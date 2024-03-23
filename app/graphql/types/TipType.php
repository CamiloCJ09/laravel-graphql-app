<?php

namespace App\Graphql\Types;

use App\Models\Tip;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class TipType extends GraphQLType
{
  protected $attributes = [
    'name' => 'Tip',
    'description' => 'A collection of tips',
    'model' => Tip::class
  ];

  public function fields(): array
  {
    return [
      'id' => [
        'type' => Type::nonNull(Type::int()),
        'description' => 'The id of the tip'
      ],
      'amount' => [
        'type' => Type::nonNull(Type::float()),
        'description' => 'The amount of tip'
      ],
      'date' => [
        'type' => Type::nonNull(Type::string()),
        'description' => 'The date of tip'
      ],
      'employee' => [
        'type' => GraphQL::type('Employee'),
        'description' => 'The employee of tip'
      ],
      'sale' => [
        'type' => GraphQL::type('Sale'),
        'description' => 'The sale of tip'
      ],
      'comment' => [
        'type' => Type::string(),
        'description' => 'The comment of tip'
      ],
    ];
  }
}
