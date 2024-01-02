<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrderTable
 *
 * @ORM\Table(name="order_table", indexes={@ORM\Index(name="id_product", columns={"id_product"}), @ORM\Index(name="id_user", columns={"id_user"})})
 * @ORM\Entity
 */
class OrderTable
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_order", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOrder;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=50, nullable=false)
     */
    private $status;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="orderDate", type="date", nullable=true)
     */
    private $orderdate;

    /**
     * @var string
     *
     * @ORM\Column(name="orderNumber", type="string", length=20, nullable=false)
     */
    private $ordernumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address", type="text", length=65535, nullable=true)
     */
    private $address;

    /**
     * @var \Product
     *
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_product", referencedColumnName="id_product")
     * })
     */
    private $idProduct;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id_user")
     * })
     */
    private $idUser;


}
