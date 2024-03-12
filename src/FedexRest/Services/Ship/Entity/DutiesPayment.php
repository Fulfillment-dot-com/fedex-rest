<?php

namespace FedexRest\Services\Ship\Entity;

class DutiesPayment
{
    public ?Payor $payor;

    public ?string $paymentType;

    public function setPayor(?Payor $payor): DutiesPayment
    {
        $this->payor = $payor;
        return $this;
    }

    public function setPaymentType(?string $paymentType): DutiesPayment
    {
        $this->paymentType = $paymentType;
        return $this;
    }

    public function prepare(): array
    {
        $data = [];
        if (!empty($this->payor)) {
            $data['payor'] = $this->payor->prepare();
        }

        if (!empty($this->paymentType)) {
            $data['paymentType'] = $this->paymentType;
        }

        return $data;
    }
}