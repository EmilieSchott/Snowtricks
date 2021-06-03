<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ImageRepository::class)
 */
class Image
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=45, unique=true)
     * @Assert\Image(
     *     minWidth = 800,
     *     maxWidth = 1200,
     *     minHeight = 800,
     *     maxHeight = 1200,
     *     minWidthMessage = "La largeur minimale attendue est de {{ min_width }}px.",
     *     maxWidthMessage = "La largeur maximmale attendue est de {{ max_width }}px.",
     *     minHeightMessage = "La hauteur minimale attendue est de {{ min_height }}px.",
     *     maxHeightMessage = "La hauteur maximale attendue est de {{ max_height }}px."
     * )
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=150)
     * @Assert\Length(
     *     max = 150,
     *     maxMessage = "La description de l'image doit faire au maximum {{ limit }} caractères."
     * )
     */
    private $alt;

    /**
     * @ORM\ManyToOne(targetEntity=Figure::class, inversedBy="images")
     * @ORM\JoinColumn(nullable=false)
     */
    private $figure;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAlt(): ?string
    {
        return $this->alt;
    }

    public function setAlt(string $alt): self
    {
        $this->alt = $alt;

        return $this;
    }

    public function getFigure(): ?Figure
    {
        return $this->figure;
    }

    public function setFigure(?Figure $figure): self
    {
        $this->figure = $figure;

        return $this;
    }
}
