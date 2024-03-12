<?php

namespace FedexRest\Services\Ship\Entity;

use FedexRest\Services\Ship\Type\AncillaryEndorsement;
use FedexRest\Services\Ship\Type\Indicia;

class SmartPostInfoDetail
{
    public ?string $ancillaryEndorsement;

    public string $hubId;

    public string $indicia;

    public ?string $specialServices;

    /**
     * @param string|null $ancillaryEndorsement
     * @return SmartPostInfoDetail
     * @see AncillaryEndorsement
     */
    public function setAncillaryEndorsement(?string $ancillaryEndorsement): SmartPostInfoDetail
    {
        $this->ancillaryEndorsement = $ancillaryEndorsement;
        return $this;
    }

    /**
     * @param string $hubId
     * @return SmartPostInfoDetail
     */
    public function setHubId(string $hubId): SmartPostInfoDetail
    {
        $this->hubId = $hubId;
        return $this;
    }

    /**
     * @param string $indicia
     * @return SmartPostInfoDetail
     * @see Indicia
     */
    public function setIndicia(string $indicia): SmartPostInfoDetail
    {
        $this->indicia = $indicia;
        return $this;
    }

    /**
     * @param string|null $specialServices
     * @return SmartPostInfoDetail
     */
    public function setSpecialServices(?string $specialServices): SmartPostInfoDetail
    {
        $this->specialServices = $specialServices;
        return $this;
    }

    public function prepare(): array
    {
        $data = [];
        if (!empty($this->ancillaryEndorsement)) {
            $data['ancillaryEndorsement'] = $this->ancillaryEndorsement;
        }
        if (!empty($this->hubId)) {
            $data['hubId'] = $this->hubId;
        }
        if (!empty($this->indicia)) {
            $data['indicia'] = $this->indicia;
        }
        if (!empty($this->specialServices)) {
            $data['specialServices'] = $this->specialServices;
        }

        return $data;
    }
}