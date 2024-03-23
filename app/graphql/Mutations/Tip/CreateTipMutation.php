<?php

namespace App\GraphQL\Mutations\Tip;

use App\Models\Tip;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CreateTipMutation extends Mutation
{
  protected $attributes = [
    'name' => 'createTip',
    'description' => 'A mutation'
  ];

  public function type(): Type
  {
    return GraphQL::type('Tip');
  }

  public function args(): array
  {
    return [
      'amount' => [
        'name' => 'amount',
        'type' => Type::nonNull(Type::float())
      ],
      'date' => [
        'name' => 'date',
        'type' => Type::nonNull(Type::string())
      ],
      'employee_id' => [
        'name' => 'employee_id',
        'type' => Type::nonNull(Type::int())
      ],
      'sale_id' => [
        'name' => 'sale_id',
        'type' => Type::nonNull(Type::int())
      ],
      'comment' => [
        'name' => 'comment',
        'type' => Type::string()
      ],
    ];
  }

  public function resolve($root, $args)
  {
    $tip = new Tip();
    $tip->fill($args);
    $tip->fill([
      'created_at' => now(),
      'updated_at' => now(),
    ]);
    $tip->save();

    return $tip;
  }
}
