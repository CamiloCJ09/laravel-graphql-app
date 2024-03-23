<?php

namespace App\GraphQL\Queries\Payment;

use App\Models\Payment;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class PaymentQuery extends Query
{
    protected $attributes = [
        'name' => 'payments',
        'description' => 'A query to get all payments'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Payment'));
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'sale_id' => [
                'name' => 'sale_id',
                'type' => Type::int()
            ],
            'amount' => [
                'name' => 'amount',
                'type' => Type::float()
            ],
            'employee_id' => [
                'name' => 'employee_id',
                'type' => Type::int()
            ],
            'date' => [
                'name' => 'date',
                'type' => Type::string()
            ],
        ];
    }

    public function resolve($root, $args)
    {
        return Payment::findOrFail($args['id']);
    }
}