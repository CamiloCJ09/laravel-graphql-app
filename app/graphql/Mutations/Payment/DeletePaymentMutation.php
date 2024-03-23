<?php

namespace App\GraphQL\Mutations\Payment;

use App\Models\Payment;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\Facades\GraphQL;

class DeletePaymentMutation extends Mutation
{
  protected $attributes = [
    'name' => 'deletePayment',
    'description' => 'A mutation'
  ];

  public function type(): Type
  {
    return GraphQL::type('Payment');
  }

  public function args(): array
  {
    return [
      'id' => [
        'name' => 'id',
        'type' => Type::nonNull(Type::int())
      ]
    ];
  }

  public function resolve($root, $args)
  {
    $payment = Payment::find($args['id']);
    $payment->delete();

    return $payment;
  }
}
