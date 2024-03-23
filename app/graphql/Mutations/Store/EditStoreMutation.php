<?php

namespace App\GraphQL\Mutations\Store;

use App\Models\Store;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class EditStoreMutation extends Mutation
{
  protected $attributes = [
    'name' => 'editStore',
    'description' => 'A mutation to edit a store'
  ];

  public function type(): Type
  {
    return GraphQL::type('Store');
  }

  public function args(): array
  {
    return [
      'id' => [
        'name' => 'id',
        'type' => Type::int(),
        'rules' => ['required']
      ],
      'name' => [
        'name' => 'name',
        'type' => Type::string()
      ],
      'address' => [
        'name' => 'address',
        'type' => Type::string()
      ],
      'phone' => [
        'name' => 'phone',
        'type' => Type::string()
      ],
      'email' => [
        'name' => 'email',
        'type' => Type::string()
      ],
      'user_id' => [
        'name' => 'user_id',
        'type' => Type::int()
      ],
    ];
  }

  public function resolve($root, $args)
  {
    $store = Store::findOrFail($args['id']);
    $store->fill([
      'updated_at' => now(),
    ]);
    $store->update($args);
    return $store;
  }
}
