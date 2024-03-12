<?php

namespace FedexRest\Entity;

use FedexRest\Services\Ship\Entity\CustomerReference;
use FedexRest\Services\Ship\Entity\PackageSpecialServices;
use FedexRest\Services\Ship\Entity\Value;

class Item
{
    public string $itemDescription = '';
    public ?Weight $weight;
    public ?Dimensions $dimensions;
    public array $customerReferences = [];

    public ?Value $declaredValue;

    public ?int $groupPackageCount;

    public ?PackageSpecialServices $packageSpecialServices;

    /**
     * @param string $itemDescription
     * @return Item
     */
    public function setItemDescription(string $itemDescription): Item
    {
        $this->itemDescription = $itemDescription;
        return $this;
    }

    /**
     * @param Weight|null $weight
     * @return $this
     */
    public function setWeight(?Weight $weight): Item
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * @param Dimensions|null $dimensions
     * @return $this
     */
    public function setDimensions(?Dimensions $dimensions): Item
    {
        $this->dimensions = $dimensions;
        return $this;
    }

    /**
     * @param CustomerReference ...$customerReferences
     * @return $this
     */
    public function setCustomerReferences(CustomerReference ...$customerReferences): Item
    {
        $this->customerReferences = $customerReferences;
        return $this;
    }

    /**
     * @param Value|null $declaredValue
     * @return Item
     */
    public function setDeclaredValue(?Value $declaredValue): Item
    {
        $this->declaredValue = $declaredValue;
        return $this;
    }

    /**
     * @param int|null $groupPackageCount
     * @return Item
     */
    public function setGroupPackageCount(?int $groupPackageCount): Item
    {
        $this->groupPackageCount = $groupPackageCount;
        return $this;
    }

    /**
     * @param PackageSpecialServices|null $packageSpecialServices
     * @return Item
     */
    public function setPackageSpecialServices(?PackageSpecialServices $packageSpecialServices): Item
    {
        $this->packageSpecialServices = $packageSpecialServices;
        return $this;
    }

    public function prepare(): array
    {
        $data = [];

        if (!empty($this->itemDescription)) {
            $data['itemDescription'] = $this->itemDescription;
        }

        if (!empty($this->weight)) {
            $data['weight'] = $this->weight->prepare();
        }

        if (!empty($this->dimensions)) {
            $data['dimensions'] = $this->dimensions->prepare();
        }

        $customerReferences = [];
        if (!empty($this->customerReferences)) {
            foreach ($this->customerReferences as $customerReference) {
                $customerReferences[] = $customerReference->prepare();
            }

            $data['customerReferences'] = $customerReferences;
        }

        if (!empty($this->declaredValue)) {
            $data['declaredValue'] = $this->declaredValue->prepare();
        }

        if (!empty($this->groupPackageCount)) {
            $data['groupPackageCount'] = $this->groupPackageCount;
        }

        if (!empty($this->packageSpecialServices)) {
            $data['packageSpecialServices'] = $this->packageSpecialServices->prepare();
        }

        return $data;
    }


}
