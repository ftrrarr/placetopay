<?php

namespace rad8329\placetopay\aim\models;

class DataFrame
{
    /**
     * @var int
     */
    public $x_response_code;
    /**
     * @var string
     */
    public $x_response_subcode;
    /**
     * @var string
     */
    public $x_response_reason_code;
    /**
     * @var string
     */
    public $x_response_reason_text;
    /**
     * @var string
     */
    public $x_approval_code;
    /**
     * @var string
     */
    public $x_avs_result_code;
    /**
     * @var string
     */
    public $x_transaction_id;
    /**
     * @var string
     */
    public $x_invoice_num;
    /**
     * @var string
     */
    public $x_description;
    /**
     * @var string
     */
    public $x_amount;
    /**
     * @var string
     */
    public $x_method;
    /**
     * @var string
     */
    public $x_type;
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
    public $x_company;
    /**
     * @var string
     */
    public $x_address;
    /**
     * @var string
     */
    public $x_city;
    /**
     * @var string
     */
    public $x_state;
    /**
     * @var string
     */
    public $x_zip;
    /**
     * @var string
     */
    public $x_country;
    /**
     * @var string
     */
    public $x_phone;
    /**
     * @var string
     */
    public $x_fax;
    /**
     * @var string
     */
    public $x_email;
    /**
     * @var string
     */
    public $x_ship_to_first_name;
    /**
     * @var string
     */
    public $x_ship_to_last_name;
    /**
     * @var string
     */
    public $x_ship_to_company;
    /**
     * @var string
     */
    public $x_ship_to_address;
    /**
     * @var string
     */
    public $x_ship_to_city;
    /**
     * @var string
     */
    public $x_ship_to_state;
    /**
     * @var string
     */
    public $x_ship_to_zip;
    /**
     * @var string
     */
    public $x_ship_to_country;
    /**
     * @var string
     */
    public $x_tax;
    /**
     * @var string
     */
    public $x_duty;
    /**
     * @var string
     */
    public $x_freight;
    /**
     * @var string
     */
    public $x_tax_exempt;
    /**
     * @var string
     */
    public $x_po_num;
    /**
     * @var string
     */
    public $x_md5_hash;
    /**
     * @var string
     */
    public $x_CVV2_response;
    /**
     * @var string
     */
    public $x_CAVV_response;
    /**
     * @var string
     */
    public $x_bank_currency;
    /**
     * @var string
     */
    public $x_bank_factor;
    /**
     * @var string
     */
    public $x_bank_amount;
    /**
     * @var string
     */
    public $x_franchise;
    /**
     * @var string
     */
    public $x_bank_name;
    /**
     * @var string
     */
    public $x_placetopay_id;
    /**
     * @var string
     */
    public $x_ta_response_code;
    /**
     * @var string
     */
    public $x_ta_response_reason_code;
    /**
     * @var string
     */
    public $x_ta_approval_code;
    /**
     * @var string
     */
    public $x_ta_transaction_id;
    /**
     * @var int
     */
    public $x_placetopay_internal_reference;

    /**
     * DataFrame constructor.
     *
     * @param string $string Data frame
     */
    public function __construct($string)
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
                $this->{$property} = utf8_encode($data[$key - 1]);
            }
        }

        unset($map, $data);
    }
}
