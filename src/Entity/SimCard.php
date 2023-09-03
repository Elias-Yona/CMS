<?php

namespace App\Entity;

use App\Repository\SimCardRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SimCardRepository::class)]
class SimCard
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $phone_number = null;

    #[ORM\Column(length: 255)]
    private ?string $serial_number = null;

    #[ORM\Column(length: 255)]
    private ?string $personal_unblocking_key_code = null;

    #[ORM\Column(length: 255)]
    private ?string $personal_identification_number_code = null;

    #[ORM\ManyToOne(inversedBy: 'simcards')]
    private ?SimcardType $simcardType = null;

    #[ORM\OneToMany(mappedBy: 'simCard', targetEntity: SimActivation::class)]
    private Collection $simcard_activations;

    public function __construct()
    {
        $this->simcard_activations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(string $phone_number): static
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    public function getSerialNumber(): ?string
    {
        return $this->serial_number;
    }

    public function setSerialNumber(string $serial_number): static
    {
        $this->serial_number = $serial_number;

        return $this;
    }

    public function getPersonalUnblockingKeyCode(): ?string
    {
        return $this->personal_unblocking_key_code;
    }

    public function setPersonalUnblockingKeyCode(string $personal_unblocking_key_code): static
    {
        $this->personal_unblocking_key_code = $personal_unblocking_key_code;

        return $this;
    }

    public function getPersonalIdentificationNumberCode(): ?string
    {
        return $this->personal_identification_number_code;
    }

    public function setPersonalIdentificationNumberCode(string $personal_identification_number_code): static
    {
        $this->personal_identification_number_code = $personal_identification_number_code;

        return $this;
    }

    public function getSimcardType(): ?SimcardType
    {
        return $this->simcardType;
    }

    public function setSimcardType(?SimcardType $simcardType): static
    {
        $this->simcardType = $simcardType;

        return $this;
    }

    /**
     * @return Collection<int, SimActivation>
     */
    public function getSimcardActivations(): Collection
    {
        return $this->simcard_activations;
    }

    public function addSimcardActivation(SimActivation $simcardActivation): static
    {
        if (!$this->simcard_activations->contains($simcardActivation)) {
            $this->simcard_activations->add($simcardActivation);
            $simcardActivation->setSimCard($this);
        }

        return $this;
    }

    public function removeSimcardActivation(SimActivation $simcardActivation): static
    {
        if ($this->simcard_activations->removeElement($simcardActivation)) {
            // set the owning side to null (unless already changed)
            if ($simcardActivation->getSimCard() === $this) {
                $simcardActivation->setSimCard(null);
            }
        }

        return $this;
    }
}
