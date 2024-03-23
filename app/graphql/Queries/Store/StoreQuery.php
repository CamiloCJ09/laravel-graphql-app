<?php

namespace App\GraphQL\Queries\Store;

use App\Models\Store;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class StoreQuery extends Query
{
    protected $attributes = [
        'name' => 'store',
        'description' => 'A query of store'
    ];

    public function type(): Type
    {
        return GraphQL::type('Store');
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
        return Store::findOrFail($args['id']);
    }
}