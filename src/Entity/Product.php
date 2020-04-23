<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=160)
     */
    private $brand;

    /**
     * @ORM\Column(type="string", length=160)
     */
    private $model;

    /**
     * @ORM\Column(type="integer")
     */
    private $width;

    /**
     * @ORM\Column(type="integer")
     */
    private $height;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $design;

    /**
     * @ORM\Column(type="integer")
     */
    private $diameter;

    /**
     * @ORM\Column(type="integer")
     */
    private $indexLoad;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $indexSpeed;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $attribute;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $runflat;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $camera;

    /**
     * @ORM\Column(type="string", length=160)
     */
    private $season;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function setWidth(int $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setHeight(int $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getDesign(): ?string
    {
        return $this->design;
    }

    public function setDesign(string $design): self
    {
        $this->design = $design;

        return $this;
    }

    public function getDiameter(): ?int
    {
        return $this->diameter;
    }

    public function setDiameter(int $diameter): self
    {
        $this->diameter = $diameter;

        return $this;
    }

    public function getIndexLoad(): ?int
    {
        return $this->indexLoad;
    }

    public function setIndexLoad(int $indexLoad): self
    {
        $this->indexLoad = $indexLoad;

        return $this;
    }

    public function getIndexSpeed(): ?string
    {
        return $this->indexSpeed;
    }

    public function setIndexSpeed(string $indexSpeed): self
    {
        $this->indexSpeed = $indexSpeed;

        return $this;
    }

    public function getAttribute(): ?string
    {
        return $this->attribute;
    }

    public function setAttribute(?string $attribute): self
    {
        $this->attribute = $attribute;

        return $this;
    }

    public function getRunflat(): ?string
    {
        return $this->runflat;
    }

    public function setRunflat(?string $runflat): self
    {
        $this->runflat = $runflat;

        return $this;
    }

    public function getCamera(): ?string
    {
        return $this->camera;
    }

    public function setCamera(?string $camera): self
    {
        $this->camera = $camera;

        return $this;
    }

    public function getSeason(): ?string
    {
        return $this->season;
    }

    public function setSeason(string $season): self
    {
        $this->season = $season;

        return $this;
    }

}
