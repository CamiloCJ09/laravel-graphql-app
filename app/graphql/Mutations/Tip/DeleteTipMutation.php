<?php

namespace App\GraphQL\Mutations\Tip;

use App\Models\Tip;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\Facades\GraphQL;

class DeleteTipMutation extends Mutation
{
  protected $attributes = [
    'name' => 'deleteTip',
    'description' => 'A mutation to delete a tip'
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
      ]
    ];
  }

  public function resolve($root, $args)
  {
    $tip = Tip::find($args['id']);
    $tip->delete();

    return $tip;
  }
}
