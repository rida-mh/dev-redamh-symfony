<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Species
 *
 * @ORM\Table(name="species")
 * @ORM\Entity
 */
class Species
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
     * @ORM\Column(name="TEXT_CODE_NAME", type="string", length=191, nullable=true)
     */
    private $textCodeName;

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


}
