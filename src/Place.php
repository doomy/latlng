<?php

final readonly class Place
{
    public function __construct(
        private float $latitude,
        private float $longitude
    ) {
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

}