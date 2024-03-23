<?php

namespace App\GraphQL\Queries\Employee;

use App\Models\Employee;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class EmployeeQuery extends Query
{
    protected $attributes = [
        'name' => 'employee',
        'description' => 'A query of employee'
    ];

    public function type(): Type
    {
        return GraphQL::type('Employee');
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
            'phone' => [
                'name' => 'phone',
                'type' => Type::string()
            ],
        ];
    }

    public function resolve($root, $args)
    {
        return Employee::findOrFail($args['id']);
    }
}