<?php

namespace rad8329\placetopay\interfaces\aim\models;

use rad8329\placetopay\interfaces\common\Arrayable;

/**
 * Immutable class
 *
 * @property-read int $x_response_code
 * @property-read string $x_response_subcode
 * @property-read string $x_response_reason_code
 * @property-read string $x_response_reason_text
 * @property-read string $x_approval_code *
 * @property-read string $x_avs_result_code
 * @property-read string $x_transaction_id
 * @property-read string $x_invoice_num
 * @property-read string $x_description
 * @property-read string $x_amount
 * @property-read string $x_method
 * @property-read string $x_type
 * @property-read string $x_cust_id
 * @property-read string $x_first_name
 * @property-read string $x_last_name
 * @property-read string $x_company
 * @property-read string $x_address
 * @property-read string $x_city
 * @property-read string $x_state
 * @property-read string $x_zip
 * @property-read string $x_country
 * @property-read string $x_phone
 * @property-read string $x_fax
 * @property-read string $x_email
 * @property-read string $x_ship_to_first_name $x_ship_to_last_name
 * @property-read string $x_ship_to_company
 * @property-read string $x_ship_to_address
 * @property-read string $x_ship_to_city
 * @property-read string $x_ship_to_state
 * @property-read string $x_ship_to_zip
 * @property-read string $x_ship_to_country
 * @property-read string $x_tax
 * @property-read string $x_duty
 * @property-read string $x_freight
 * @property-read string $x_tax_exempt
 * @property-read string $x_po_num
 * @property-read string $x_md5_hash
 * @property-read string $x_CVV2_response
 * @property-read string $x_CAVV_response
 * @property-read string $x_bank_currency
 * @property-read string $x_bank_factor
 * @property-read string $x_bank_amount
 * @property-read string $x_franchise
 * @property-read string $x_bank_name
 * @property-read string $x_placetopay_id
 * @property-read string $x_ta_response_code
 * @property-read string $x_ta_response_reason_code
 * @property-read string $x_ta_approval_code
 * @property-read string $x_ta_transaction_id
 * @property-read string $x_placetopay_internal_reference
 *
 * @SuppressWarnings(PHPMD.LongVariable)
 */
class DataFrame extends Arrayable
{
    /**
     * @var int
     */
    private $x_response_code;
    /**
     * @var string
     */
    private $x_response_subcode;
    /**
     * @var string
     */
    private $x_response_reason_code;
    /**
     * @var string
     */
    private $x_response_reason_text;
    /**
     * @var string
     */
    private $x_approval_code;
    /**
     * @var string
     */
    private $x_avs_result_code;
    /**
     * @var string
     */
    private $x_transaction_id;
    /**
     * @var string
     */
    private $x_invoice_num;
    /**
     * @var string
     */
    private $x_description;
    /**
     * @var string
     */
    private $x_amount;
    /**
     * @var string
     */
    private $x_method;
    /**
     * @var string
     */
    private $x_type;
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
    private $x_company;
    /**
     * @var string
     */
    private $x_address;
    /**
     * @var string
     */
    private $x_city;
    /**
     * @var string
     */
    private $x_state;
    /**
     * @var string
     */
    private $x_zip;
    /**
     * @var string
     */
    private $x_country;
    /**
     * @var string
     */
    private $x_phone;
    /**
     * @var string
     */
    private $x_fax;
    /**
     * @var string
     */
    private $x_email;
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
    private $x_ship_to_company;
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
    private $x_ship_to_zip;
    /**
     * @var string
     */
    private $x_ship_to_country;
    /**
     * @var string
     */
    private $x_tax;
    /**
     * @var string
     */
    private $x_duty;
    /**
     * @var string
     */
    private $x_freight;
    /**
     * @var string
     */
    private $x_tax_exempt;
    /**
     * @var string
     */
    private $x_po_num;
    /**
     * @var string
     */
    private $x_md5_hash;
    /**
     * @var string
     */
    private $x_CVV2_response;
    /**
     * @var string
     */
    private $x_CAVV_response;
    /**
     * @var string
     */
    private $x_bank_currency;
    /**
     * @var string
     */
    private $x_bank_factor;
    /**
     * @var string
     */
    private $x_bank_amount;
    /**
     * @var string
     */
    private $x_franchise;
    /**
     * @var string
     */
    private $x_bank_name;
    /**
     * @var string
     */
    private $x_placetopay_id;
    /**
     * @var string
     */
    private $x_ta_response_code;
    /**
     * @var string
     */
    private $x_ta_response_reason_code;
    /**
     * @var string
     */
    private $x_ta_approval_code;
    /**
     * @var string
     */
    private $x_ta_transaction_id;
    /**
     * @var int
     */
    private $x_placetopay_internal_reference;

    /**
     * @param string $string
     */
    public function __construct(string $string)
    {
        /**
         * The array starts on 1 for PlaceToPay documentation match.
         */
        $map = [
            '1' => 'x_response_code',
            '2' => 'x_response_subcode',
            '3' => 'x_response_reason_code',
            '4' => 'x_response_reason_text',
            '5' => 'x_approval_code',
            '6' => 'x_avs_result_code',
            '7' => 'x_transaction_id',
            '8' => 'x_invoice_num',
            '9' => 'x_description',
            '10' => 'x_amount',
            '11' => 'x_method',
            '12' => 'x_type',
            '13' => 'x_cust_id',
            '14' => 'x_first_name',
            '15' => 'x_last_name',
            '16' => 'x_company',
            '17' => 'x_address',
            '18' => 'x_city',
            '19' => 'x_state',
            '20' => 'x_zip',
            '21' => 'x_country',
            '22' => 'x_phone',
            '23' => 'x_fax',
            '24' => 'x_email',
            '25' => 'x_ship_to_first_name',
            '26' => 'x_ship_to_last_name',
            '27' => 'x_ship_to_company',
            '28' => 'x_ship_to_address',
            '29' => 'x_ship_to_city',
            '30' => 'x_ship_to_state',
            '31' => 'x_ship_to_zip',
            '32' => 'x_ship_to_country',
            '33' => 'x_tax',
            '34' => 'x_duty',
            '35' => 'x_freight',
            '36' => 'x_tax_exempt',
            '37' => 'x_po_num',
            '38' => 'x_md5_hash',
            '39' => 'x_CVV2_response',
            '40' => 'x_CAVV_response',
            '41' => 'x_bank_currency',
            '42' => 'x_bank_factor',
            '43' => 'x_bank_amount',
            '44' => 'x_franchise',
            '45' => 'x_bank_name',
            '46' => 'x_placetopay_id',
            '47' => 'x_ta_response_code',
            '48' => 'x_ta_response_reason_code',
            '49' => 'x_ta_approval_code',
            '50' => 'x_ta_transaction_id',
            '51' => 'x_placetopay_internal_reference',
        ];

        $data = explode(',', $string);

        foreach ($map as $key => $property) {
            if (isset($data[$key - 1])) {
                $this->$property = utf8_encode($data[$key - 1]);
            }
        }

        unset($map, $data);
    }

    /**
     * @return int
     */
    public function getX_response_code()
    {
        return $this->x_response_code;
    }

    /**
     * @return string
     */
    public function getX_response_subcode()
    {
        return $this->x_response_subcode;
    }

    /**
     * @return string
     */
    public function getX_response_reason_code()
    {
        return $this->x_response_reason_code;
    }

    /**
     * @return string
     */
    public function getX_response_reason_text()
    {
        return $this->x_response_reason_text;
    }

    /**
     * @return string
     */
    public function getX_approval_code()
    {
        return $this->x_approval_code;
    }

    /**
     * @return string
     */
    public function getX_avs_result_code()
    {
        return $this->x_avs_result_code;
    }

    /**
     * @return string
     */
    public function getX_transaction_id()
    {
        return $this->x_transaction_id;
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
     * @return string
     */
    public function getX_amount()
    {
        return $this->x_amount;
    }

    /**
     * @return string
     */
    public function getX_method()
    {
        return $this->x_method;
    }

    /**
     * @return string
     */
    public function getX_type()
    {
        return $this->x_type;
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
    public function getX_company()
    {
        return $this->x_company;
    }

    /**
     * @return string
     */
    public function getX_address()
    {
        return $this->x_address;
    }

    /**
     * @return string
     */
    public function getX_city()
    {
        return $this->x_city;
    }

    /**
     * @return string
     */
    public function getX_state()
    {
        return $this->x_state;
    }

    /**
     * @return string
     */
    public function getX_zip()
    {
        return $this->x_zip;
    }

    /**
     * @return string
     */
    public function getX_country()
    {
        return $this->x_country;
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
    public function getX_fax()
    {
        return $this->x_fax;
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
    public function getX_ship_to_company()
    {
        return $this->x_ship_to_company;
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
    public function getX_ship_to_zip()
    {
        return $this->x_ship_to_zip;
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
    public function getX_tax()
    {
        return $this->x_tax;
    }

    /**
     * @return string
     */
    public function getX_duty()
    {
        return $this->x_duty;
    }

    /**
     * @return string
     */
    public function getX_freight()
    {
        return $this->x_freight;
    }

    /**
     * @return string
     */
    public function getX_tax_exempt()
    {
        return $this->x_tax_exempt;
    }

    /**
     * @return string
     */
    public function getX_po_num()
    {
        return $this->x_po_num;
    }

    /**
     * @return string
     */
    public function getX_md5_hash()
    {
        return $this->x_md5_hash;
    }

    /**
     * @return string
     */
    public function getX_CVV2_response()
    {
        return $this->x_CVV2_response;
    }

    /**
     * @return string
     */
    public function getX_CAVV_response()
    {
        return $this->x_CAVV_response;
    }

    /**
     * @return string
     */
    public function getX_bank_currency()
    {
        return $this->x_bank_currency;
    }

    /**
     * @return string
     */
    public function getX_bank_factor()
    {
        return $this->x_bank_factor;
    }

    /**
     * @return string
     */
    public function getX_bank_amount()
    {
        return $this->x_bank_amount;
    }

    /**
     * @return string
     */
    public function getX_franchise()
    {
        return $this->x_franchise;
    }

    /**
     * @return string
     */
    public function getX_bank_name()
    {
        return $this->x_bank_name;
    }

    /**
     * @return string
     */
    public function getX_placetopay_id()
    {
        return $this->x_placetopay_id;
    }

    /**
     * @return string
     */
    public function getX_ta_response_code()
    {
        return $this->x_ta_response_code;
    }

    /**
     * @return string
     */
    public function getX_ta_response_reason_code()
    {
        return $this->x_ta_response_reason_code;
    }

    /**
     * @return string
     */
    public function getX_ta_approval_code()
    {
        return $this->x_ta_approval_code;
    }

    /**
     * @return string
     */
    public function getX_ta_transaction_id()
    {
        return $this->x_ta_transaction_id;
    }

    /**
     * @return int
     */
    public function getX_placetopay_internal_reference()
    {
        return $this->x_placetopay_internal_reference;
    }
}
