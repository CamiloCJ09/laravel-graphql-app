<?php

namespace App\GraphQL\Queries\Employee;

use App\Models\Employee;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class EmployeesQuery extends Query
{
    protected $attributes = [
        'name' => 'employees',
        'description' => 'A query to get all employees'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Employee'));
    }

    public function args(): array
    {
        return [];
    }

    public function resolve($root, $args)
    {
        return Employee::all();
    }
}