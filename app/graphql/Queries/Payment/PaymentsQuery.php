<?php

namespace App\GraphQL\Queries\Payment;

use App\Models\Payment;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class PaymentsQuery extends Query
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
        return [];
    }

    public function resolve($root, $args)
    {
        return Payment::all();
    }
}