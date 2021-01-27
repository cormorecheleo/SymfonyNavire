<?php

namespace App\Entity;

use App\Repository\AisShipTypeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;



/**
 * @ORM\Entity(repositoryClass=AisShipTypeRepository::class)
 */
class AisShipType
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    
    
    /**
     *@ORM\Column(type="string", length=60)
     */
    private $libelle;
    
    
    /**
     * @ORM\Column(type="integer")
     * @Assert\Length(
     *      min = 1, 
     *      max = 9,
     *      minMessage = "Le type d'un navire est compris entre 1 et 9",
     *      maxMessage = "Le type d'un navire est compris entre 1 et 9",
     *      allowEmptyString = false
     * )
     */
    private $aisShipType;

    public function getId(): ?int
    {
        return $this->id;
    }
}
