<?php

namespace Omnipay\PaymentgateRu\Message;

class RefundResponse extends AbstractCurlResponse
{
    /**
     * Is the response successful?
     *
     * @return boolean
     */
    public function isSuccessful()
    {
        return $this->getCode() === 0;
    }

    /**
     * Response code
     *
     * @return null|string A response code from the payment gateway
     */
    public function getCode()
    {
        return (int) $this->data['errorCode'];
    }

    /**
     * Response message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->data['errorMessage'];
    }
}
