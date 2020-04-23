<?php

namespace App\Dto;

class Product
{
    public $brand;
    public $model;
    public $width;
    public $height;
    public $design;
    public $diameter;
    public $indexLoad;
    public $indexSpeed;
    public $attribute;
    public $runflat;
    public $camera;
    public $season;

    /**
     * Product constructor.
     * @param $brand
     * @param $model
     * @param $width
     * @param $height
     * @param $design
     * @param $diameter
     * @param $indexLoad
     * @param $indexSpeed
     * @param $attribute
     * @param $runflat
     * @param $camera
     * @param $season
     */
    /*public function __construct($brand, $model, $width, $height, $design, $diameter, $indexLoad, $indexSpeed, $attribute, $runflat, $camera, $season)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->width = $width;
        $this->height = $height;
        $this->design = $design;
        $this->diameter = $diameter;
        $this->indexLoad = $indexLoad;
        $this->indexSpeed = $indexSpeed;
        $this->attribute = $attribute;
        $this->runflat = $runflat;
        $this->camera = $camera;
        $this->season = $season;
    }*/

}