<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Pet
 *
 * @ORM\Table(name="pet", indexes={@ORM\Index(name="PET-BREED_ID->BREED-ID", columns={"BREED_ID"}), @ORM\Index(name="PET-GENDER_ID->GENDER-ID", columns={"GENDER_ID"})})
 * @ORM\Entity
 */
class Pet
{






    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NAME", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var float|null
     *
     * @ORM\Column(name="WEIGHT_KG", type="float", precision=10, scale=0, nullable=true)
     */
    private $weightKg;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CHIP_NUMBER", type="string", length=255, nullable=true)
     */
    private $chipNumber = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="CROSSED", type="boolean", nullable=false)
     */
    private $crossed = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="BIRTH_DATE", type="datetime", nullable=true)
     */
    private $birthDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="COLOR", type="string", length=255, nullable=true)
     */
    private $color;

    /**
     * @var bool
     *
     * @ORM\Column(name="STERILIZED", type="boolean", nullable=false)
     */
    private $sterilized = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="IS_DECEASED", type="string", length=20, nullable=true)
     */
    private $isDeceased;

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

    /**
     * @var \Breed
     *
     * @ORM\ManyToOne(targetEntity="Breed")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="BREED_ID", referencedColumnName="ID")
     * })
     */
    private $breed;

    /**
     * @var \Gender
     *
     * @ORM\ManyToOne(targetEntity="Gender")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="GENDER_ID", referencedColumnName="ID")
     * })
     */
    private $gender;




    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getWeightKg(): ?float
    {
        return $this->weightKg;
    }

    public function setWeightKg(?float $weightKg): self
    {
        $this->weightKg = $weightKg;

        return $this;
    }

    public function getChipNumber(): ?bool
    {
        return $this->chipNumber;
    }

    public function setChipNumber(?string $chipNumber): self
    {
        $this->chipNumber = $chipNumber;

        return $this;
    }
    public function getCrossed(): ?bool
    {
        return $this->crossed;
    }

    public function setCrossed(?bool $crossed): self
    {
        $this->crossed = $crossed;

        return $this;
    }


    public function getBirthDate(): ?\DateTime
    {
         return $this->birthDate;
    }

    public function setBirthDate(?\DateTime $birthDate): self
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): self
    {
        $this->name = $color;

        return $this;
    }
    public function getSterilized(): ?bool
    {
        return $this->sterilized;
    }

    public function setSterilized(?bool $sterilized): self
    {
        $this->sterilized = $sterilized;

        return $this;
    }
    public function getIsDeceased(): ?string
    {
        return $this->isDeceased;
    }

    public function setIsDeceased(?string $isDeceased): self
    {
        $this->isDeceased = $isDeceased;

        return $this;
    }

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
        $this->UpdateUserId = $UpdateUserId;

        return $this;
    }



    public function getBreed(): ?Breed
    {
        return $this->breed;
    }

    public function setBreed(?Breed $breed): self
    {
        $this->breed = $breed;

        return $this;
    }

    public function getGender(): ?Gender
    {
        return $this->gender;
    }

    public function setGender(?Gender $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(): ?int
    {
        return $this->id;
    }

    public function __toString()
    {
        return strval( $this->getId() );
    }




}
