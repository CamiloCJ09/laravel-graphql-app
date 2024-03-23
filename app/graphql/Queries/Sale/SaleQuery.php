<?php

namespace App\GraphQL\Queries\Sale;

use App\Models\Sale;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class SaleQuery extends Query
{
    protected $attributes = [
        'name' => 'sales',
        'description' => 'A query to get all sales'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Sale'));
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
                'rules' => ['required']
            ],
            'store_id' => [
                'name' => 'store_id',
                'type' => Type::int()
            ],
            'customer_id' => [
                'name' => 'customer_id',
                'type' => Type::int()
            ],
            'date' => [
                'name' => 'date',
                'type' => Type::string()
            ],
            'total' => [
                'name' => 'total',
                'type' => Type::float()
            ],
            'employee_id' => [
                'name' => 'employee_id',
                'type' => Type::int()
            ],
        ];
    }

    public function resolve($root, $args)
    {
        return Sale::findOrFail($args['id']);
    }
}