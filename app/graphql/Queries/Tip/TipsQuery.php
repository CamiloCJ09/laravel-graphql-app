<?php

namespace App\GraphQL\Queries\Tip;

use App\Models\Tip;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class TipsQuery extends Query
{
    protected $attributes = [
        'name' => 'tips',
        'description' => 'A query to get all tips'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Tip'));
    }

    public function args(): array
    {
        return [];
    }

    public function resolve($root, $args)
    {
        return Tip::all();
    }
}