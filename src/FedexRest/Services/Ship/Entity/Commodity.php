<?php
namespace FedexRest\Services\Ship\Entity;

use FedexRest\Entity\Weight;

class Commodity
{
    public string $description;

    public ?Value $unitPrice;

    public ?int $numberOfPieces;

    public ?int $quantity;

    public ?string $quantityUnits;

    public ?Value $customsValue;

    public ?string $countryOfManufacture;

    public ?string $harmonizedCode;

    public ?Weight $weight;
    
    /**
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description): Commodity
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param Value|null $unitPrice
     * @return $this
     */
    public function setUnitPrice(?Value $unitPrice): Commodity
    {
        $this->unitPrice = $unitPrice;
        return $this;
    }

    /**
     * @param int|null $numberOfPieces
     * @return $this
     */
    public function setNumberOfPieces(?int $numberOfPieces): Commodity
    {
        $this->numberOfPieces = $numberOfPieces;
        return $this;
    }

    /**
     * @param int|null $quantity
     * @return $this
     */
    public function setQuantity(?int $quantity): Commodity
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @param string|null $quantityUnits
     * @return $this
     */
    public function setQuantityUnits(?string $quantityUnits): Commodity
    {
        $this->quantityUnits = $quantityUnits;
        return $this;
    }

    /**
     * @param Value|null $customsValue
     * @return $this
     */
    public function setCustomsValue(?Value $customsValue): Commodity
    {
        $this->customsValue = $customsValue;
        return $this;
    }

    /**
     * @param string|null $countryOfManufacture
     * @return $this
     */
    public function setCountryOfManufacture(?string $countryOfManufacture): Commodity
    {
        $this->countryOfManufacture = $countryOfManufacture;
        return $this;
    }

    /**
     * @param string|null $harmonizedCode
     * @return $this
     */
    public function setHarmonizedCode(?string $harmonizedCode): Commodity
    {
        $this->harmonizedCode = $harmonizedCode;
        return $this;
    }

    /**
     * @param Weight|null $weight
     * @return $this
     */
    public function setWeight(?Weight $weight): Commodity
    {
        $this->weight = $weight;
        return $this;
    }

    public function prepare(): array
    {
        $data = [];
        if (!empty($this->description)) {
            $data['description'] = $this->description;
        }

        if (!empty($this->unitPrice)) {
            $data['unitPrice'] = $this->unitPrice->prepare();
        }

        if (!empty($this->numberOfPieces)) {
            $data['numberOfPieces'] = $this->numberOfPieces;
        }

        if (!empty($this->quantity)) {
            $data['quantity'] = $this->quantity;
        }

        if (!empty($this->quantityUnits)) {
            $data['quantityUnits'] = $this->quantityUnits;
        }

        if (!empty($this->customsValue)) {
            $data['customsValue'] = $this->customsValue->prepare();
        }

        if (!empty($this->countryOfManufacture)) {
            $data['countryOfManufacture'] = $this->countryOfManufacture;
        }

        if (!empty($this->harmonizedCode)) {
            $data['harmonizedCode'] = $this->harmonizedCode;
        }

        if (!empty($this->weight)) {
            $data['weight'] = $this->weight->prepare();
        }

        return $data;
    }

}