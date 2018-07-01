<?php

/**
 * Created by PhpStorm.
 * User: zhu_lin
 * Date: 2018/7/1
 * Time: 11:07
 */
class pollution_industry
{
    private $unit_code;
    private $unit_name;

    private $w_god;
    private $w_andan;
    private $w_lin;
    private $w_dan;
    private $w_shiyou;
    private $w_fen;
    private $w_jing;
    private $w_gong;
    private $w_geCd;
    private $w_qian;
    private $w_geCr;
    private $w_shen;

    private $a_so2;
    private $a_nox;
    private $a_keliwu;
    private $a_vocs;
    private $a_nh3;
    private $a_gong;
    private $a_geCd;
    private $a_qian;
    private $a_geCr;
    private $a_shen;

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
    public function getWGod()
    {
        return $this->w_god;
    }

    /**
     * @param mixed $w_god
     */
    public function setWGod($w_god)
    {
        $this->w_god = $w_god;
    }

    /**
     * @return mixed
     */
    public function getWAndan()
    {
        return $this->w_andan;
    }

    /**
     * @param mixed $w_andan
     */
    public function setWAndan($w_andan)
    {
        $this->w_andan = $w_andan;
    }

    /**
     * @return mixed
     */
    public function getWLin()
    {
        return $this->w_lin;
    }

    /**
     * @param mixed $w_lin
     */
    public function setWLin($w_lin)
    {
        $this->w_lin = $w_lin;
    }

    /**
     * @return mixed
     */
    public function getWDan()
    {
        return $this->w_dan;
    }

    /**
     * @param mixed $w_dan
     */
    public function setWDan($w_dan)
    {
        $this->w_dan = $w_dan;
    }

    /**
     * @return mixed
     */
    public function getWShiyou()
    {
        return $this->w_shiyou;
    }

    /**
     * @param mixed $w_shiyou
     */
    public function setWShiyou($w_shiyou)
    {
        $this->w_shiyou = $w_shiyou;
    }

    /**
     * @return mixed
     */
    public function getWFen()
    {
        return $this->w_fen;
    }

    /**
     * @param mixed $w_fen
     */
    public function setWFen($w_fen)
    {
        $this->w_fen = $w_fen;
    }

    /**
     * @return mixed
     */
    public function getWJing()
    {
        return $this->w_jing;
    }

    /**
     * @param mixed $w_jing
     */
    public function setWJing($w_jing)
    {
        $this->w_jing = $w_jing;
    }

    /**
     * @return mixed
     */
    public function getWGong()
    {
        return $this->w_gong;
    }

    /**
     * @param mixed $w_gong
     */
    public function setWGong($w_gong)
    {
        $this->w_gong = $w_gong;
    }

    /**
     * @return mixed
     */
    public function getWGeCd()
    {
        return $this->w_geCd;
    }

    /**
     * @param mixed $w_geCd
     */
    public function setWGeCd($w_geCd)
    {
        $this->w_geCd = $w_geCd;
    }

    /**
     * @return mixed
     */
    public function getWQian()
    {
        return $this->w_qian;
    }

    /**
     * @param mixed $w_qian
     */
    public function setWQian($w_qian)
    {
        $this->w_qian = $w_qian;
    }

    /**
     * @return mixed
     */
    public function getWGeCr()
    {
        return $this->w_geCr;
    }

    /**
     * @param mixed $w_geCr
     */
    public function setWGeCr($w_geCr)
    {
        $this->w_geCr = $w_geCr;
    }

    /**
     * @return mixed
     */
    public function getWShen()
    {
        return $this->w_shen;
    }

    /**
     * @param mixed $w_shen
     */
    public function setWShen($w_shen)
    {
        $this->w_shen = $w_shen;
    }

    /**
     * @return mixed
     */
    public function getASo2()
    {
        return $this->a_so2;
    }

    /**
     * @param mixed $a_so2
     */
    public function setASo2($a_so2)
    {
        $this->a_so2 = $a_so2;
    }

    /**
     * @return mixed
     */
    public function getANox()
    {
        return $this->a_nox;
    }

    /**
     * @param mixed $a_nox
     */
    public function setANox($a_nox)
    {
        $this->a_nox = $a_nox;
    }

    /**
     * @return mixed
     */
    public function getAKeliwu()
    {
        return $this->a_keliwu;
    }

    /**
     * @param mixed $a_keliwu
     */
    public function setAKeliwu($a_keliwu)
    {
        $this->a_keliwu = $a_keliwu;
    }

    /**
     * @return mixed
     */
    public function getAVocs()
    {
        return $this->a_vocs;
    }

    /**
     * @param mixed $a_vocs
     */
    public function setAVocs($a_vocs)
    {
        $this->a_vocs = $a_vocs;
    }

    /**
     * @return mixed
     */
    public function getANh3()
    {
        return $this->a_nh3;
    }

    /**
     * @param mixed $a_nh3
     */
    public function setANh3($a_nh3)
    {
        $this->a_nh3 = $a_nh3;
    }

    /**
     * @return mixed
     */
    public function getAGong()
    {
        return $this->a_gong;
    }

    /**
     * @param mixed $a_gong
     */
    public function setAGong($a_gong)
    {
        $this->a_gong = $a_gong;
    }

    /**
     * @return mixed
     */
    public function getAGeCd()
    {
        return $this->a_geCd;
    }

    /**
     * @param mixed $a_geCd
     */
    public function setAGeCd($a_geCd)
    {
        $this->a_geCd = $a_geCd;
    }

    /**
     * @return mixed
     */
    public function getAQian()
    {
        return $this->a_qian;
    }

    /**
     * @param mixed $a_qian
     */
    public function setAQian($a_qian)
    {
        $this->a_qian = $a_qian;
    }

    /**
     * @return mixed
     */
    public function getAGeCr()
    {
        return $this->a_geCr;
    }

    /**
     * @param mixed $a_geCr
     */
    public function setAGeCr($a_geCr)
    {
        $this->a_geCr = $a_geCr;
    }

    /**
     * @return mixed
     */
    public function getAShen()
    {
        return $this->a_shen;
    }

    /**
     * @param mixed $a_shen
     */
    public function setAShen($a_shen)
    {
        $this->a_shen = $a_shen;
    }


}