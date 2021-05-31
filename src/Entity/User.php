<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(
 *     fields={"username"},
 *     message="Ce nom d'utilisateur est déjà utilisé."
 * )
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=45, unique=true)
     * @Assert\NotBlank(message = "Le nom d'utilisateur ne peut pas être vide.")
     * @Assert\Length(
     *     max = 45,
     *     maxMessage = "Le nom d'utilisateur doit faire maximum {{ limit }} caractères."
     * )
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message = "La photo de l'utilisateur ne peut pas être vide.")
     * @Assert\Image(
     *     minWidth = 100,
     *     maxWidth = 200,
     *     minHeight = 100,
     *     maxHeight = 200,
     *     minWidthMessage = "La largeur minimale attendue est de {{ min_width }}px.",
     *     maxWidthMessage = "La largeur maximale attendue est de {{ max_width }}px.",
     *     minHeightMessage = "La hauteur minimale attendue est de {{ min_height }}px.",
     *     maxHeightMessage = "La hauteur maximale attendue est de {{ max_height }}px.",
     *     allowLandscape = false,
     *     allowPortrait = false,
     *     allowLandscapeMessage = "Seules les images carrées sont autorisées.",
     *     allowPortraitMessage = "Seules les images carrées sont autorisées."
     * )
     */
    private $userPhoto;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email
     * @Assert\NotBlank(message = "L'email ne peut pas être vide.")
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message = "Le mot de passe ne peut pas être vide.")
     */
    private $password;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getUserPhoto(): ?string
    {
        return $this->userPhoto;
    }

    public function setUserPhoto(string $userPhoto): self
    {
        $this->userPhoto = $userPhoto;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
}
