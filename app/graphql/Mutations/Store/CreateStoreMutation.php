<?php

namespace App\GraphQL\Mutations\Store;

use App\Models\Store;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class CreateStoreMutation extends Mutation
{
  protected $attributes = [
    'name' => 'createStore',
    'description' => 'A mutation to create a store'
  ];

  public function type(): Type
  {
    return GraphQL::type('Store');
  }

  public function args(): array
  {
    return [
      'name' => [
        'name' => 'name',
        'type' => Type::string(),
        'rules' => ['required']
      ],
      'address' => [
        'name' => 'address',
        'type' => Type::string(),
        'rules' => ['required']
      ],
      'phone' => [
        'name' => 'phone',
        'type' => Type::string(),
        'rules' => ['required']
      ],
      'email' => [
        'name' => 'email',
        'type' => Type::string(),
        'rules' => ['required']
      ],
      'user_id' => [
        'name' => 'user_id',
        'type' => Type::int(),
        'rules' => ['required']
      ],
    ];
  }

  public function resolve($root, $args)
  {
    $store = new Store();
    $store->fill($args);
    $store->fill([
      'created_at' => now(),
      'updated_at' => now(),
    ]);
    return Store::create($store->toArray());
  }
}
