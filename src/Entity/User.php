<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(
 *     fields={"username"},
 *     message="Ce nom d'utilisateur est déjà utilisé."
 * )
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Assert\NotBlank(message = "Le nom d'utilisateur ne peut pas être vide.")
     * @Assert\Length(
     *     max = 180,
     *     maxMessage = "Le nom d'utilisateur doit faire maximum {{ limit }} caractères."
     * )
     */
    private $username;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message = "Le mot de passe ne peut pas être vide.")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message = "La photo de l'utilisateur ne peut pas être vide.")
     * @Assert\Image(
     *     minWidth = 50,
     *     maxWidth = 200,
     *     minHeight = 50,
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

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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
}
