<?php

namespace App\GraphQL\Queries\Tip;

use App\Models\Tip;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class TipQuery extends Query
{
    protected $attributes = [
        'name' => 'tip',
        'description' => 'A query of tip'
    ];

    public function type(): Type
    {
        return GraphQL::type('Tip');
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
        return Tip::findOrFail($args['id']);
    }
}