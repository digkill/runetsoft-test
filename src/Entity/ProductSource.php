<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductSourceRepository")
 */
class ProductSource
{
    const STATUS_NEW = 0;
    const STATUS_DONE = 1;
    const STATUS_REJECT = 2;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="integer", length=1,  nullable=false, options={"unsigned":true, "default":0})
     */
    private $status;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status = self::STATUS_NEW): self
    {
        $this->status = $status;

        return $this;
    }

    public function isStatusNew()
    {
        return $this->getStatus() === self::STATUS_NEW;
    }
}
