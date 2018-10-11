<?php

namespace rad8329\placetopay\interfaces\aim;

use rad8329\placetopay\exceptions\RequiredPropertyException;
use rad8329\placetopay\exceptions\UnknownPropertyException;
use rad8329\placetopay\interfaces\common\models\Authentication;
use rad8329\placetopay\interfaces\common\Validation;

class AuthOnlyRequest extends Request
{
    /**
     * @var string x_type
     */
    const REQUEST_TYPE = 'AUTH_ONLY';

    /**
     * @param Authentication $auth
     * @param array $data
     * @throws UnknownPropertyException
     * @throws \ReflectionException
     * @throws RequiredPropertyException
     */
    public function __construct(Authentication $auth, array $data)
    {
        parent::__construct($auth, $data);

        $this->configure($data);

        Validation::checkNoEmpty('x_currency_code', $this->x_currency_code);
        Validation::checkNoEmpty('x_amount', $this->x_amount);
        Validation::checkNoEmpty('x_card_num', $this->x_card_num);
        Validation::checkNoEmpty('x_exp_date', $this->x_exp_date);

    }
}
