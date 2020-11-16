<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User1 implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="email", type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $civility;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    protected $last_name;


    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $first_name;


    /**
     * @ORM\Column(type="string")
     */
    private $roles ;


    /**
     * @var string The hashed password
     * @ORM\Column(name="password", type="string")
     */
    private $password;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="CREATE_DATE", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $createDate ;

    /**
     * @var int|null
     *
     * @ORM\Column(name="CREATE_USER_ID", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $createUserId;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="UPDATE_DATE", type="datetime", nullable=true)
     */
    private $updateDate;

    /**
     * @var int|null
     *
     * @ORM\Column(name="UPDATE_USER_ID", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $updateUserId;

    public function getCreateDate(): ?\DateTime
    {
        return $this->createDate;
    }

    public function setCreateDate(?\DateTime $createDate): self
    {
        $this->createDate = $createDate;

        return $this;
    }

    public function getCreateUserId(): ?int
    {
        return $this->createUserId;
    }

    public function setCreateUserId(?int $createUserId): self
    {
        $this->createUserId = $createUserId;

        return $this;
    }

    public function getUpdateDate(): ?\DateTime
    {
        return $this->updateDate;
    }

    public function setUpdateDate(?\DateTime $updateDate): self
    {
        $this->updateDate = $updateDate;

        return $this;
    }

    public function getUpdateUserId(): ?int
    {
        return $this->updateUserId;
    }

    public function setUpdateUserId(?int $UpdateUserId): self
    {
        $this->updateUserId = $UpdateUserId;

        return $this;
    }


    public function getId(): ?int
    {
        return $this->id;
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

    public function getCivility(): ?string
    {
        return $this->civility;
    }

    public function setCivility(string $civility): self
    {
        $this->email = $civility;

        return $this;
    }
    public function getLastName(): ?string
    {
        return $this->last_name;
    }


    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->first_name;
    }

    public function setFirstname(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }


    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
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
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
}
