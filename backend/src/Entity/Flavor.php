<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Flavor
 *
 * @ORM\Table(name="flavor")
 * @ORM\Entity
 */
class Flavor
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_flavor", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFlavor;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="flavorDescription", type="text", length=65535, nullable=true)
     */
    private $flavordescription;


}
