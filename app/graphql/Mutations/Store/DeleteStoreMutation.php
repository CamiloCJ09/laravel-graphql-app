<?php

namespace App\GraphQL\Mutations\Store;

use App\Models\Store;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class DeleteStoreMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteStore',
        'description' => 'A mutation to delete a store'
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
        $store = Store::findOrFail($args['id']);
        $store->delete();
        return $store;
    }
}