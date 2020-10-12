<?php

namespace Vlabs\GoogleMapBundle\VO;

/**
 * Class LatLngBoundsVO
 * @package Vlabs\GoogleMapBundle\VO
 */
class LatLngBoundsVO
{
    /**
     * @var string|null
     */
    private $south;

    /**
     * @var string|null
     */
    private $west;

    /**
     * @var string|null
     */
    private $north;

    /**
     * @var string|null
     */
    private $east;

    /**
     * LatLngVO constructor.
     * @param string|null $south
     * @param string|null $west
     * @param string|null $north
     * @param string|null $east
     */
    public function __construct(?string $south, ?string $west, ?string $north, ?string $east)
    {
        $this->south = is_null($south) ? null : $south;
        $this->west  = is_null($west)  ? null : $west;
        $this->north = is_null($north) ? null : $north;
        $this->east  = is_null($east)  ? null : $east;
    }

    /**
     * @return string|null
     */
    public function getSouth(): ?string
    {
        return $this->south;
    }

    /**
     * @return string|null
     */
    public function getWest(): ?string
    {
        return $this->west;
    }

    /**
     * @return string|null
     */
    public function getNorth(): ?string
    {
        return $this->north;
    }

    /**
     * @return string|null
     */
    public function getEast(): ?string
    {
        return $this->east;
    }
}