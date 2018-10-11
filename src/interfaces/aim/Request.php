<?php

namespace rad8329\placetopay\interfaces\aim;

use rad8329\placetopay\exceptions\UnknownPropertyException;
use rad8329\placetopay\interfaces\common\ConfigurableObjectTrait;
use rad8329\placetopay\interfaces\common\models\Authentication;
use rad8329\placetopay\interfaces\common\ReachableAttributesTrait;
use rad8329\placetopay\interfaces\common\Request as CommonRequest;


/**
 * @see https://dev.placetopay.com/web/tarjeta-de-credito/ (Matriz de campos por tipo de operación)
 *
 * @property-read string $x_version
 * @property-read string $x_delim_data
 * @property-read string $x_language
 * @property-read string $x_relay_response
 * @property-read string $x_test_request
 * @property-read string $x_email_customer
 * @property-read string $x_email_merchant
 * @property-read string $x_customer_ip
 * @property-read string $x_invoice_num
 * @property-read string $x_description
 * @property-read float $x_amount
 * @property-read float $x_tax
 * @property-read float $x_amount_base
 * @property-read string $x_currency_code
 * @property-read int $x_differed
 * @property-read string $x_cust_id
 * @property-read string $x_first_name
 * @property-read string $x_last_name
 * @property-read string $x_phone
 * @property-read string $x_email
 * @property-read string $x_card_num
 * @property-read string $x_exp_date
 * @property-read string $x_card_code
 * @property-read string $x_ship_to_id
 * @property-read string $x_ship_to_first_name
 * @property-read string $x_ship_to_last_name
 * @property-read string $x_ship_to_address
 * @property-read string $x_ship_to_city
 * @property-read string $x_ship_to_state
 * @property-read string $x_ship_to_country
 * @property-read string $x_ship_to_phone
 * @property-read string $x_ship_to_mobile
 * @property-read string $x_login
 * @property-read string $x_tran_key
 */
abstract class Request extends CommonRequest implements RequestInterface
{
    use ConfigurableObjectTrait;
    use ReachableAttributesTrait;

    /**
     * @var string x_type
     */
    const REQUEST_TYPE = '';

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
    private $x_login;

    /**
     * @var string
     */
    private $x_tran_key;


    /**
     * @var string
     */
    private $x_version = '2.0';

    /**
     * @var string
     */
    private $x_delim_data = 'TRUE';

    /**
     * @var string
     */
    private $x_language;

    /**
     * @var string
     */
    private $x_relay_response = 'FALSE';

    /**
     * @var string
     */
    private $x_test_request = 'TRUE';

    /**
     * @var string
     */
    private $x_email_customer = 'TRUE';

    /**
     * @var string
     */
    private $x_email_merchant = 'TRUE';

    /**
     * @var string
     */
    private $x_customer_ip;

    /**
     * @var string
     */
    private $x_invoice_num;

    /**
     * @var string
     */
    private $x_description;

    /**
     * @var float
     */
    private $x_amount;

    /**
     * @var float
     */
    private $x_tax;

    /**
     * @var float
     */
    private $x_amount_base;

    /**
     * @var string
     */
    private $x_currency_code;

    /**
     * @var int
     */
    private $x_differed = 12;

    /**
     * @var string
     */
    private $x_cust_id;

    /**
     * @var string
     */
    private $x_first_name;

    /**
     * @var string
     */
    private $x_last_name;

    /**
     * @var string
     */
    private $x_phone;

    /**
     * @var string
     */
    private $x_email;

    /**
     * @var string
     */
    private $x_card_num;

    /**
     * @var string
     */
    private $x_exp_date;

    /**
     * @var string
     */
    private $x_card_code;

    /**
     * @var string
     */
    private $x_ship_to_id;

    /**
     * @var string
     */
    private $x_ship_to_first_name;
    /**
     * @var string
     */
    private $x_ship_to_last_name;

    /**
     * @var string
     */
    private $x_ship_to_address;

    /**
     * @var string
     */
    private $x_ship_to_city;

    /**
     * @var string
     */
    private $x_ship_to_state;

    /**
     * @var string
     */
    private $x_ship_to_country;

    /**
     * @var string
     */
    private $x_ship_to_phone;

    /**
     * @var string
     */
    private $x_ship_to_mobile;

    /**
     * @param Authentication $auth
     * @param array $data
     * @throws UnknownPropertyException
     * @throws \ReflectionException
     */
    public function __construct(Authentication $auth, array $data)
    {

        $this->x_login = $auth->login;
        $this->x_tran_key = $auth->plainTranKey;

        $this->configure($data);
    }

    /**
     * {@inheritdoc}
     */
    public function toArray($recursive = true)
    {
        return array_merge(
            parent::toArray($recursive),
            ['x_type' => static::REQUEST_TYPE, 'x_method' => static::METHOD, 'x_card_type' => static::CARD_TYPE]
        );
    }

    /**
     * @return string
     */
    public function getX_version()
    {
        return $this->x_version;
    }

    /**
     * @return string
     */
    public function getX_delim_data()
    {
        return $this->x_delim_data;
    }

    /**
     * @return string
     */
    public function getX_language()
    {
        return $this->x_language;
    }

    /**
     * @return string
     */
    public function getX_relay_response()
    {
        return $this->x_relay_response;
    }

    /**
     * @return string
     */
    public function getX_test_request()
    {
        return $this->x_test_request;
    }

    /**
     * @return string
     */
    public function getX_email_customer()
    {
        return $this->x_email_customer;
    }

    /**
     * @return string
     */
    public function getX_email_merchant()
    {
        return $this->x_email_merchant;
    }

    /**
     * @return string
     */
    public function getX_customer_ip()
    {
        return $this->x_customer_ip;
    }

    /**
     * @return string
     */
    public function getX_invoice_num()
    {
        return $this->x_invoice_num;
    }

    /**
     * @return string
     */
    public function getX_description()
    {
        return $this->x_description;
    }

    /**
     * @return float
     */
    public function getX_amount()
    {
        return $this->x_amount;
    }

    /**
     * @return float
     */
    public function getX_tax()
    {
        return $this->x_tax;
    }

    /**
     * @return float
     */
    public function getX_amount_base()
    {
        return $this->x_amount_base;
    }

    /**
     * @return string
     */
    public function getX_currency_code()
    {
        return $this->x_currency_code;
    }

    /**
     * @return int
     */
    public function getX_differed()
    {
        return $this->x_differed;
    }

    /**
     * @return string
     */
    public function getX_cust_id()
    {
        return $this->x_cust_id;
    }

    /**
     * @return string
     */
    public function getX_first_name()
    {
        return $this->x_first_name;
    }

    /**
     * @return string
     */
    public function getX_last_name()
    {
        return $this->x_last_name;
    }

    /**
     * @return string
     */
    public function getX_phone()
    {
        return $this->x_phone;
    }

    /**
     * @return string
     */
    public function getX_email()
    {
        return $this->x_email;
    }

    /**
     * @return string
     */
    public function getX_card_num()
    {
        return $this->x_card_num;
    }

    /**
     * @return string
     */
    public function getX_exp_date()
    {
        return $this->x_exp_date;
    }

    /**
     * @return string
     */
    public function getX_card_code()
    {
        return $this->x_card_code;
    }

    /**
     * @return string
     */
    public function getX_ship_to_id()
    {
        return $this->x_ship_to_id;
    }

    /**
     * @return string
     */
    public function getX_ship_to_first_name()
    {
        return $this->x_ship_to_first_name;
    }

    /**
     * @return string
     */
    public function getX_ship_to_last_name()
    {
        return $this->x_ship_to_last_name;
    }

    /**
     * @return string
     */
    public function getX_ship_to_address()
    {
        return $this->x_ship_to_address;
    }

    /**
     * @return string
     */
    public function getX_ship_to_city()
    {
        return $this->x_ship_to_city;
    }

    /**
     * @return string
     */
    public function getX_ship_to_state()
    {
        return $this->x_ship_to_state;
    }

    /**
     * @return string
     */
    public function getX_ship_to_country()
    {
        return $this->x_ship_to_country;
    }

    /**
     * @return string
     */
    public function getX_ship_to_phone()
    {
        return $this->x_ship_to_phone;
    }

    /**
     * @return string
     */
    public function getX_ship_to_mobile()
    {
        return $this->x_ship_to_mobile;
    }

    /**
     * @return string
     */
    public function getX_login()
    {
        return $this->x_login;
    }

    /**
     * @return string
     */
    public function getX_tran_key()
    {
        return $this->x_tran_key;
    }
}
