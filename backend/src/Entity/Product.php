<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product", indexes={@ORM\Index(name="id_category", columns={"id_category"})})
 * @ORM\Entity
 */
class Product
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_product", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idProduct;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="stock", type="integer", nullable=false)
     */
    private $stock;

    /**
     * @var string|null
     *
     * @ORM\Column(name="volume", type="string", length=50, nullable=true)
     */
    private $volume;

    /**
     * @var string|null
     *
     * @ORM\Column(name="benefits", type="text", length=65535, nullable=true)
     */
    private $benefits;

    /**
     * @var string|null
     *
     * @ORM\Column(name="imgProduct", type="string", length=255, nullable=true)
     */
    private $imgproduct;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nutritionalProperties", type="text", length=65535, nullable=true)
     */
    private $nutritionalproperties;

    /**
     * @var \Category
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_category", referencedColumnName="id_category")
     * })
     */
    private $idCategory;


}
