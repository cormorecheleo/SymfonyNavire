<?php

namespace App\Entity;

use App\Repository\NavireRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=NavireRepository::class)
 */
class Navire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string", length=7)
     * @Assert\Regex(
     *      pattern="/[1-9]{7}/",
     *      message = "Le numero IMO doit comporter 7 chiffres"
     * )
     */
    private $imo;

    /*
     * @ORM\Column(type="string", length=100)
     * @Assert\Length(
     *              min = 3,
     *              max = 100
     *              )
     */
    private $nom;
    
    
    /**
     *@ORM\Column(type="string", length=9)
     * @Assert\Length(
     *              min = 9,
     *              max = 9,
     *              minMessage = "Le numéro MMSI doit être minimum 9",
     *              maxMessage = "Le numero MMSI doit être maximum 9",
     *              allowEmptyString = false
     * )
     */
    private $mmsi;
    
    /**
     * @ORM\Column(type="string", length=10)
     */
    private $indicatifAppel;
    
    
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $eta;
    
    public function getId(): ?int
    {
        return $this->id;
    }
}
