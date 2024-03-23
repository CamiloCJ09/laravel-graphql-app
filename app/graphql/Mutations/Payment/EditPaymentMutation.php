<?php

namespace App\GraphQL\Mutations\Payment;

use App\Models\Payment;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\Facades\GraphQL;

class EditPaymentMutation extends Mutation
{
  protected $attributes = [
    'name' => 'editPayment',
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
      ],
      'amount' => [
        'name' => 'amount',
        'type' => Type::float()
      ],
      'date' => [
        'name' => 'date',
        'type' => Type::string()
      ],
      'employee_id' => [
        'name' => 'employee_id',
        'type' => Type::int()
      ],
      'sale_id' => [
        'name' => 'sale_id',
        'type' => Type::int()
      ],
    ];
  }

  public function resolve($root, $args)
  {
    $payment = Payment::find($args['id']);
    $payment->fill($args);
    $payment->fill([
      'updated_at' => now(),
    ]);
    $payment->update();

    return $payment;
  }
}
