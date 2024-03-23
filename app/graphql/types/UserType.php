<?php

namespace App\Graphql\Types;

use App\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'User',
        'description' => 'A collection of users',
        'model' => User::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the user'
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The name of user'
            ],
            'email' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The email of user'
            ],
            'password' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The password of user'
            ],
            'stores' => [
                'type' => Type::listOf(GraphQL::type('Store')),
                'description' => 'The stores of user'
            ],
        ];
    }
}