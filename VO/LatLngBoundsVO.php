<?php

namespace Vlabs\GoogleMapBundle\VO;

/**
 * Class LatLngBoundsVO
 * @package Vlabs\GoogleMapBundle\VO
 */
class LatLngBoundsVO
{
    /**
     * @var float|null
     */
    private $south;

    /**
     * @var float|null
     */
    private $west;

    /**
     * @var float|null
     */
    private $north;

    /**
     * @var float|null
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
        $this->south = is_null($south) ? null : (float)$south;
        $this->west  = is_null($west)  ? null : (float)$west;
        $this->north = is_null($north) ? null : (float)$north;
        $this->east  = is_null($east)  ? null : (float)$east;
    }

    /**
     * @return float|null
     */
    public function getSouth(): ?float
    {
        return $this->south;
    }

    /**
     * @return float|null
     */
    public function getWest(): ?float
    {
        return $this->west;
    }

    /**
     * @return float|null
     */
    public function getNorth(): ?float
    {
        return $this->north;
    }

    /**
     * @return float|null
     */
    public function getEast(): ?float
    {
        return $this->east;
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return (
            is_null($this->south)
            && is_null($this->west)
            && is_null($this->north)
            && is_null($this->east)
        );
    }
}