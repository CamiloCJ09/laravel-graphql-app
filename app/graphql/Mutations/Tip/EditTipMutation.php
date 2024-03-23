<?php

namespace App\GraphQL\Mutations\Tip;

use App\Models\Tip;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\Facades\GraphQL;

class EditTipMutation extends Mutation
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
      'id' => [
        'name' => 'id',
        'type' => Type::nonNull(Type::int()),
        'rules' => ['required']
      ],
      'amount' => [
        'name' => 'amount',
        'type' => Type::float()
      ],
      'date' => [
        'name' => 'date',
        'type' => Type::string()
      ],
      'employee_id' => [
        'name' => 'employee_id',
        'type' => Type::int()
      ],
      'sale_id' => [
        'name' => 'sale_id',
        'type' => Type::int()
      ],
      'comment' => [
        'name' => 'comment',
        'type' => Type::string()
      ],
    ];
  }

  public function resolve($root, $args)
  {
    $tip = Tip::find($args['id']);
    $tip->fill($args);
    $tip->fill([
      'updated_at' => now(),
    ]);
    $tip->update();

    return $tip;
  }
}
