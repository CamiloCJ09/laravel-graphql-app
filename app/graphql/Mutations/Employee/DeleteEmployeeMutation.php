<?php

namespace App\GraphQL\Mutations\Employee;

use App\Models\Employee;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class DeleteEmployeeMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteEmployee',
        'description' => 'A mutation to delete a employee'
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
        ];
    }

    public function resolve($root, $args)
    {
        $employee = Employee::findOrFail($args['id']);
        $employee->delete();
        return $employee;
    }
}