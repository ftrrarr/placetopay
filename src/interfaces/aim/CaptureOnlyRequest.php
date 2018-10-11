<?php

namespace rad8329\placetopay\interfaces\aim;

use rad8329\placetopay\exceptions\UnknownPropertyException;
use rad8329\placetopay\interfaces\common\models\Authentication;

class CaptureOnlyRequest extends Request
{
    /**
     * @var string x_type
     */
    const REQUEST_TYPE = 'CAPTURE_ONLY';

    /**
     * @param Authentication $auth
     * @param array $data
     * @throws UnknownPropertyException
     * @throws \ReflectionException
     */
    public function __construct(Authentication $auth, array $data)
    {
        parent::__construct($auth, $data);

        $this->configure($data);
    }
}
