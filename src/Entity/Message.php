<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=MessageRepository::class)
 */
class Message
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    
    
    /**
     *
     * @ORM\Column(type="string", length=60)
     */
    private $nom;
    
    
    /**
     *
     * @ORM\Column(type="string", length=60)
     */
    private $prenom;
    
    
    /**
     *
     * @ORM\Column(type="string", length=100)
     * @Assert\Email(
     *      message = "{{ value }}' n'est pas une adresse mail valide"
     * )
     */
    private $mail;
    
    
    /**
     *
     * @ORM\Column(type="text")
     * @Assert\Length(
     *          min = 30,
     *          minMessage = "Le message à envoyer doit faire au moins {{ limit }} caracteres",
     *      )
     */
    private $message;
    

    public function getId(): ?int
    {
        return $this->id;
    }
}
