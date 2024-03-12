<?php
namespace FedexRest\Services\Ship\Entity;

use FedexRest\Services\Ship\Type\TermsOfSale;

class CommercialInvoice
{
    public array $customerReferences = [];

    public ?string $termsOfSale;


    /**
     * @param CustomerReference ...$customerReferences
     * @return $this
     */
    public function setCustomerReferences(CustomerReference ...$customerReferences): CommercialInvoice
    {
        $this->customerReferences = $customerReferences;
        return $this;
    }

    /**
     * @param string $tos
     * @return $this
     * @see TermsOfSale
     */
    public function setTermsOfSale(string $tos): CommercialInvoice
    {
        $this->termsOfSale = $tos;
        return $this;
    }

    public function prepare(): array
    {
        $data = [];
        $customerReferences = [];
        if (!empty($this->customerReferences)) {
            foreach ($this->customerReferences as $customerReference) {
                $customerReferences[] = $customerReference->prepare();
            }

            $data = [
                'customerReferences' => $customerReferences
            ];
        }

        if(!empty($this->termsOfSale)) {
            $data['termsOfSale'] = $this->termsOfSale;
        }

        return $data;
    }

}