<?php

namespace App\Graphql\Types;

use App\Models\Payment;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class PaymentType extends GraphQLType
{
  protected $attributes = [
    'name' => 'Payment',
    'description' => 'A collection of payments',
    'model' => Payment::class
  ];

  public function fields(): array
  {
    return [
      'id' => [
        'type' => Type::nonNull(Type::int()),
        'description' => 'The id of the payment'
      ],
      'amount' => [
        'type' => Type::nonNull(Type::float()),
        'description' => 'The amount of payment'
      ],
      'date' => [
        'type' => Type::nonNull(Type::string()),
        'description' => 'The date of payment'
      ],
    ];
  }
}
