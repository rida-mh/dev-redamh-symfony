<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Owner
 *
 * @ORM\Table(name="owner", uniqueConstraints={@ORM\UniqueConstraint(name="OWNER-USER_ID->USER-ID", columns={"USER_ID"})})
 * @ORM\Entity
 */
class Owner
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
     * @ORM\Column(name="PHONE", type="string", length=255, nullable=true)
     */
    private $phone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PHONE2", type="string", length=255, nullable=true)
     */
    private $phone2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ADDRESS", type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ZIP_CODE", type="string", length=8, nullable=true)
     */
    private $zipCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CITY", type="string", length=255, nullable=true)
     */
    private $city;

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
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="USER_ID", referencedColumnName="ID")
     * })
     */
    private $user;


}
