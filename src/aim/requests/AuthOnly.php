<?php

namespace rad8329\placetopay\aim\requests;

use rad8329\placetopay\aim\models\Person;
use rad8329\placetopay\common\Request;

class AuthOnly extends Request
{
    /**
     * @var string x_type
     */
    const REQUEST_TYPE = 'AUTH_ONLY';
    /**
     * @var string x_method
     */
    const METHOD = 'CC';
    /**
     * @var string x_card_type
     */
    const CARD_TYPE = 'C';

    /**
     * @var string
     */
    public $x_version = '2.0';
    /**
     * @var string
     */
    public $x_delim_data = 'TRUE';

    /**
     * @var string
     */
    public $x_language;
    /**
     * @var string
     */
    public $x_relay_response = 'FALSE';
    /**
     * @var string
     */
    public $x_login;
    /**
     * @var string
     */
    public $x_tran_key;
    /**
     * @var string
     */
    public $x_test_request = 'TRUE';

    /**
     * @var string
     */
    public $x_email_customer = 'TRUE';
    /**
     * @var string
     */
    public $x_customer_ip;
    /**
     * @var string
     */
    public $x_invoice_num;
    /**
     * @var string
     */
    public $x_description;
    /**
     * @var float
     */
    public $x_amount;
    /**
     * @var float
     */
    public $x_tax;
    /**
     * @var float
     */
    public $x_amount_base;
    /**
     * @var int
     */
    public $x_differed = 12;
    /**
     * @var string
     */
    public $x_cust_id;
    /**
     * @var string
     */
    public $x_first_name;
    /**
     * @var string
     */
    public $x_last_name;

    /**
     * @var string
     */
    public $x_card_num;

    /**
     * @var string
     */
    public $x_exp_date;
    /**
     * @var string
     */
    public $x_card_code;

    /**
     * @var Person
     */
    public $person;

    /**
     * AuthOnly constructor.
     *
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->configure($config);
    }

    public function rules()
    {
        return [
            [
                [
                    'x_version',
                    'x_delim_data',
                    'x_language',
                    'x_relay_response',
                    'x_login',
                    'x_tran_key',
                    'x_test_request',
                    'x_email_customer',
                    'x_customer_ip',
                    'x_invoice_num',
                    'x_description',
                    'x_cust_id',
                    'x_first_name',
                    'x_last_name',
                    'x_card_num',
                    'x_exp_date',
                    'x_card_code',

                ],
                'filter',
                'filter' => 'trim',
            ],
            [
                [
                    'x_version',
                    'x_delim_data',
                    'x_language',
                    'x_relay_response',
                    'x_login',
                    'x_tran_key',
                    'x_test_request',
                    'x_email_customer',
                    'x_customer_ip',
                    'x_invoice_num',
                    'x_cust_id',
                    'x_first_name',
                    'x_last_name',
                    'x_card_num',
                    'x_exp_date',
                    'x_card_code',
                    'x_amount',
                    'x_tax',
                    'x_amount_base',
                    'x_delim_data',
                    'x_relay_response',
                    'x_test_request',
                    'x_email_customer',
                ],
                'required',
            ],

            [['x_amount', 'x_tax', 'x_amount_base'], 'number'],
            [['x_differed'], 'integer', 'min' => 1, 'max' => 36],
            [['x_delim_data', 'x_relay_response', 'x_test_request', 'x_email_customer'], 'in', 'range' => ['TRUE', 'FALSE']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(array $properties = [], $recursive = true)
    {
        return $array = array_merge(
            parent::toArray($properties, $recursive),
            ['x_type' => self::REQUEST_TYPE, 'x_method' => self::METHOD, 'x_card_type' => self::CARD_TYPE]
        );
    }
}
