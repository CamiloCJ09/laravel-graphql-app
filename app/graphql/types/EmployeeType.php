<?php

namespace App\Graphql\Types;

use App\Models\Employee;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class EmployeeType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Employee',
        'description' => 'A collection of employees',
        'model' => Employee::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the employee'
            ],
            'first_name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The name of employee'
            ],
            'last_name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The name of employee'
            ],
            'email' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The email of employee'
            ],
            'phone' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The phone of employee'
            ],
            'store' => [
                'type' => GraphQL::type('Store'),
                'description' => 'The store of employee'
            ],
        ];
    }
}