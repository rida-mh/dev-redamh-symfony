<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OwnerPet
 *
 * @ORM\Table(name="owner_pet", uniqueConstraints={@ORM\UniqueConstraint(name="P_OWNER_ID-PET_ID", columns={"OWNER_ID", "PET_ID"})}, indexes={@ORM\Index(name="OWNER_PET_PET_ID", columns={"PET_ID"}), @ORM\Index(name="OWNER_PET_POWNER_ID", columns={"OWNER_ID"})})
 * @ORM\Entity
 */
class OwnerPet
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="CREATE_DATE", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $createDate = 'CURRENT_TIMESTAMP';

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
     * @var \Owner
     *
     * @ORM\ManyToOne(targetEntity="Owner")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="OWNER_ID", referencedColumnName="ID")
     * })
     */
    private $owner;

    /**
     * @var \Pet
     *
     * @ORM\ManyToOne(targetEntity="Pet")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="PET_ID", referencedColumnName="ID")
     * })
     */
    private $pet;


}
