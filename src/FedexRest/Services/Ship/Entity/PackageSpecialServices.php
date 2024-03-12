<?php

namespace FedexRest\Services\Ship\Entity;

use FedexRest\Services\Ship\Type\PackageSpecialServiceType;

class PackageSpecialServices
{
    public ?array $specialServiceTypes;

    public ?string $signatureOptionType;

    /**
     * @param string[] $specialServiceTypes
     * @return $this
     * @see PackageSpecialServiceType
     */
    public function setSpecialServiceTypes(array $specialServiceTypes): PackageSpecialServices
    {
        $this->specialServiceTypes = $specialServiceTypes;
        return $this;
    }

    /**
     * @param string|null $signatureOptionType
     * @return PackageSpecialServices
     */
    public function setSignatureOptionType(?string $signatureOptionType): PackageSpecialServices
    {
        $this->signatureOptionType = $signatureOptionType;
        return $this;
    }

    public function prepare(): array
    {
        $data = [];
        if (!empty($this->specialServiceTypes)) {
            $data['specialServiceTypes'] = $this->specialServiceTypes;
        }
        if (!empty($this->signatureOptionType)) {
            $data['signatureOptionType'] = $this->signatureOptionType;
        }
        return $data;
    }
}
