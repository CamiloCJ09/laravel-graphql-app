<?php

namespace App\Graphql\Types;

use App\Models\Store;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class StoreType extends GraphQLType
{
  protected $attributes = [
    'name' => 'Store',
    'description' => 'A collection of stores',
    'model' => Store::class
  ];

  public function fields(): array
  {
    return [
      'id' => [
        'type' => Type::nonNull(Type::int()),
        'description' => 'The id of the store'
      ],
      'name' => [
        'type' => Type::nonNull(Type::string()),
        'description' => 'The name of store'
      ],
      'address' => [
        'type' => Type::nonNull(Type::string()),
        'description' => 'The address of store'
      ],
      'phone' => [
        'type' => Type::nonNull(Type::string()),
        'description' => 'The phone of store'
      ],
      'user' => [
        'type' => GraphQL::type('User'),
        'description' => 'The user of store'
      ],
      'employees' => [
        'type' => Type::listOf(GraphQL::type('Employee')),
        'description' => 'The employees of store'
      ],
    ];
  }
}
