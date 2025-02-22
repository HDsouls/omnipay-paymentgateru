<?php

namespace Omnipay\RbsUat\Message;

class PaymentResponse extends AbstractCurlResponse
{
    /**
     * Is the response successful?
     *
     * @return bool
     */
    public function isSuccessful(): bool
    {
        return $this->data['success'];
    }

    /**
     * Get order id.
     *
     * @return int|string|null
     */
    public function getOrderId()
    {
        return $this->isSuccessful() ? $this->data['data']['orderId'] : null;
    }

    /**
     * Response Message
     *
     * @return null|string A response message from the payment gateway
     */
    public function getMessage(): ?string
    {
        return $this->isSuccessful() ? null : $this->data['error']['message'];
    }

    /**
     * Get error description.
     *
     * @return null|string
     */
    public function getDescription(): ?string
    {
        return $this->isSuccessful() ? null : $this->data['error']['description'];
    }

    /**
     * Response code
     *
     * @return int A response code from the payment gateway
     */
    public function getCode(): int
    {
        return $this->isSuccessful() ? 0 : (int) $this->data['error']['code'];
    }
}
