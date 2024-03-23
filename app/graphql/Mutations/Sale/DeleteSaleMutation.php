<?php

namespace App\GraphQL\Mutations\Sale;

use App\Models\Sale;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class DeleteSaleMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteSale',
        'description' => 'A mutation to delete a sale'
    ];

    public function type(): Type
    {
        return GraphQL::type('Sale');
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
        $sale = Sale::findOrFail($args['id']);
        $sale->delete();
        return $sale;
    }
}