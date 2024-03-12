<?php

namespace FedexRest\Services\Ship\Entity;

use FedexRest\Services\Ship\Type\RegulatoryControl;

class CustomsClearanceDetail
{
    public ?CommercialInvoice $commercialInvoice;
    public array $regulatoryControls = [];
    public array $commodities = [];
    public ?Value $totalCustomsValue;

    public ?DutiesPayment $dutiesPayment;

    /**
     * @param CommercialInvoice $commercialInvoice
     * @return $this
     */
    public function setCommercialInvoice(CommercialInvoice $commercialInvoice): CustomsClearanceDetail
    {
        $this->commercialInvoice = $commercialInvoice;
        return $this;
    }

    /**
     * @param Commodity ...$commodities
     * @return $this
     */
    public function setCommodities(Commodity ...$commodities): CustomsClearanceDetail
    {
        $this->commodities = $commodities;
        return $this;
    }

    /**
     * @param string ...$regulatoryControls
     * @return $this
     * @see RegulatoryControl
     */
    public function setRegulatoryControls(string ...$regulatoryControls): CustomsClearanceDetail
    {
        $this->regulatoryControls = $regulatoryControls;
        return $this;
    }

    /**
     * @param DutiesPayment|null $dutiesPayment
     * @return $this
     */
    public function setDutiesPayment(?DutiesPayment $dutiesPayment): CustomsClearanceDetail
    {
        $this->dutiesPayment = $dutiesPayment;
        return $this;
    }

    /**
     * @param Value|null $totalCustomsValue
     * @return $this
     */
    public function setTotalCustomsValue(?Value $totalCustomsValue): CustomsClearanceDetail
    {
        $this->totalCustomsValue = $totalCustomsValue;
        return $this;
    }

    public function prepare(): array
    {
        $data = [];
        $commodities = [];
        if (!empty($this->commercialInvoice)) {
            $data['commercialInvoice'] = $this->commercialInvoice->prepare();
        }

        if (!empty($this->commodities)) {
            foreach ($this->commodities as $commodity) {
                $commodities[] = $commodity->prepare();
            }
            $data['commodities'] = $commodities;
        }

        if(!empty($this->regulatoryControls)) {
            $data['regulatoryControls'] = $this->regulatoryControls;
        }

        if(!empty($this->dutiesPayment)) {
            $data['dutiesPayment'] = $this->dutiesPayment->prepare();
        }

        if(!empty($this->totalCustomsValue)) {
            $data['totalCustomsValue'] = $this->totalCustomsValue->prepare();
        }

        return $data;
    }
}
