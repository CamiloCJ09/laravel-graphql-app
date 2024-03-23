<?php

namespace App\GraphQL\Mutations\User;

use App\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class EditUserMutation extends Mutation
{
  protected $attributes = [
    'name' => 'editUser',
    'description' => 'A mutation to edit a user'
  ];

  public function type(): Type
  {
    return GraphQL::type('User');
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
      'email' => [
        'name' => 'email',
        'type' => Type::string()
      ],
      'password' => [
        'name' => 'password',
        'type' => Type::string()
      ],
    ];
  }

  public function resolve($root, $args)
  {
    $user = User::findOrFail($args['id']);
    $user->fill([
      'updated_at' => now(),
    ]);
    $user->update($args);
    return $user;
  }
}
