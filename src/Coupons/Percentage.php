<?php

namespace LukePOLO\LaraCart\Coupons;

use LukePOLO\LaraCart\Contracts\CouponContract;
use LukePOLO\LaraCart\LaraCart;
use LukePOLO\LaraCart\Traits\CouponTrait;

/**
 * Class Percentage
 * @package LukePOLO\LaraCart\Coupons
 */

/**
 * Class Percentage
 * @package LukePOLO\LaraCart\Coupons
 */
class Percentage implements CouponContract
{
    use CouponTrait;

    public $code;
    public $value;

    /**
     * Percentage constructor.
     * @param $code
     * @param $value
     * @param array $options
     */
    public function __construct($code, $value, array $options = [])
    {
        $this->code = $code;
        $this->value = $value;

        $this->setOptions($options);
    }

    /**
     * Gets the discount amount
     * @param $throwErrors boolean this allows us to capture errors in our code if we wish, that way we can spit out why the coupon has failed
     * @return string
     */
    public function discount($throwErrors = false)
    {
        return $this->formatMoney(
            app(LaraCart::SERVICE)->subTotal(false) * $this->value,
            null,
            null,
            false
        );
    }

    /**
     * Displays the value in a percentage
     * @return mixed
     */
    public function displayValue()
    {
        return ($this->value * 100) . '%';
    }
}
