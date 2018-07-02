<?php

/**
 * Created by PhpStorm.
 * User: zhu_lin
 * Date: 2018/6/29
 * Time: 17:04
 */
class EnterpriseBasicInfo
{
    private $unit_name;
    private $unit_code;
    private $unit_peop;
    private $adress;
    private $coordX;
    private $coordY;
    private $tel;
    private $startTime;
    private $businessRange;
    private $block;


    /**
     * @return mixed
     */
    public function getUnitName()
    {
        return $this->unit_name;
    }

    /**
     * @param mixed $unit_name
     */
    public function setUnitName($unit_name)
    {
        $this->unit_name = $unit_name;
    }

    /**
     * @return mixed
     */
    public function getUnitCode()
    {
        return $this->unit_code;
    }

    /**
     * @param mixed $unit_code
     */
    public function setUnitCode($unit_code)
    {
        $this->unit_code = $unit_code;
    }

    /**
     * @return mixed
     */
    public function getUnitPeop()
    {
        return $this->unit_peop;
    }

    /**
     * @param mixed $unit_peop
     */
    public function setUnitPeop($unit_peop)
    {
        $this->unit_peop = $unit_peop;
    }

    /**
     * @return mixed
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * @param mixed $adress
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;
    }

    /**
     * @return mixed
     */
    public function getCoordX()
    {
        return $this->coordX;
    }

    /**
     * @param mixed $coordX
     */
    public function setCoordX($coordX)
    {
        $this->coordX = $coordX;
    }

    /**
     * @return mixed
     */
    public function getCoordY()
    {
        return $this->coordY;
    }

    /**
     * @param mixed $coordY
     */
    public function setCoordY($coordY)
    {
        $this->coordY = $coordY;
    }

    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param mixed $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    /**
     * @return mixed
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * @param mixed $startTime
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;
    }

    /**
     * @return mixed
     */
    public function getBusinessRange()
    {
        return $this->businessRange;
    }

    /**
     * @param mixed $businessRange
     */
    public function setBusinessRange($businessRange)
    {
        $this->businessRange = $businessRange;
    }

    /**
     * @return mixed
     */
    public function getBlock()
    {
        return $this->block;
    }

    /**
     * @param mixed $block
     */
    public function setBlock($block)
    {
        $this->block = $block;
    }

}