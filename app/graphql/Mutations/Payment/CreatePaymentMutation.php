<?php

namespace App\GraphQL\Mutations\Payment;

use App\Models\Payment;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CreatePaymentMutation extends Mutation
{
  protected $attributes = [
    'name' => 'createPayment',
    'description' => 'A mutation'
  ];

  public function type(): Type
  {
    return GraphQL::type('Payment');
  }

  public function args(): array
  {
    return [
      'amount' => [
        'name' => 'amount',
        'type' => Type::nonNull(Type::float())
      ],
      'date' => [
        'name' => 'date',
        'type' => Type::nonNull(Type::string())
      ],
      'employee_id' => [
        'name' => 'employee_id',
        'type' => Type::nonNull(Type::int())
      ],
      'sale_id' => [
        'name' => 'sale_id',
        'type' => Type::nonNull(Type::int())
      ],
    ];
  }

  public function resolve($root, $args)
  {
    $payment = new Payment();
    $payment->fill([
      'amount' => $args['amount'],
      'date' => $args['date'],
      'employee_id' => $args['employee_id'],
      'sale_id' => $args['sale_id'],
      'created_at' => now(),
      'updated_at' => now(),
    ]);
    $payment->save();

    return $payment;
  }
}
