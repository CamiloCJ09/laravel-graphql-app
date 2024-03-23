<?php

namespace App\GraphQL\Queries\Sale;

use App\Models\Sale;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class SalesQuery extends Query
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
        return [];
    }

    public function resolve($root, $args)
    {
        return Sale::all();
    }
}