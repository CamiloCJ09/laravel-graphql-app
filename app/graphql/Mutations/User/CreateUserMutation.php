<?php

namespace App\Graphql\Mutations\User;

use App\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;
use Illuminate\Support\Str;


class CreateUserMutation extends Mutation
{
  protected $attributes = [
    'name' => 'createUser',
    'description' => 'A mutation of user'
  ];

  public function type(): Type
  {
    return GraphQL::type('User');
  }

  public function args(): array
  {
    return [
      'name' => [
        'name' => 'name',
        'type' => Type::nonNull(Type::string()),
        'rules' => ['required']
      ],
      'email' => [
        'name' => 'email',
        'type' => Type::nonNull(Type::string()),
        'rules' => ['required', 'email']
      ],
      'password' => [
        'name' => 'password',
        'type' => Type::nonNull(Type::string()),
        'rules' => ['required']
      ],
    ];
  }

  public function resolve($root, $args)
  {
    $user = new User();
    $user->fill($args);
    $user->fill([
      'password' => bcrypt($args['password']),
      'email_verified_at' => now(),
      'remember_token' => Str::random(10),
      'created_at' => now(),
      'updated_at' => now(),
    ]);
    $user->save();

    return $user;
  }
}
