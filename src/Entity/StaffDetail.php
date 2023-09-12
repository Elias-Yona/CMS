<?php

namespace App\Entity;

use App\Repository\StaffDetailRepository;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;

#[ORM\Entity(repositoryClass: StaffDetailRepository::class)]
class StaffDetail
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_of_birth = null;

    #[ORM\Column(length: 30)]
    private ?string $gender = null;

    #[ORM\Column(length: 20)]
    private ?string $phone_number = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $address = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updated_at = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $profile_picture = null;

    #[ORM\OneToMany(mappedBy: 'staffDetail', targetEntity: VehicleStaffAssignment::class)]
    private Collection $vehicle_staff_assignments;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user_account = null;

    #[ORM\OneToMany(mappedBy: 'staffDetail', targetEntity: ShopStaffAssignment::class)]
    private Collection $shop_staff_assignments;

    #[ORM\OneToMany(mappedBy: 'staffDetail', targetEntity: StaffEarning::class)]
    private Collection $staff_earnings;

    #[ORM\OneToMany(mappedBy: 'staffDetail', targetEntity: SimActivation::class)]
    private Collection $simcard_activations;


    public function __construct()
    {
        $this->vehicle_staff_assignments = new ArrayCollection();
        $this->shop_staff_assignments = new ArrayCollection();
        $this->staff_earnings = new ArrayCollection();
        $this->simcard_activations = new ArrayCollection();
        $this->updated_at = new \DateTimeImmutable();
    }

    public function __toString(): string
    {
        return $this->user_account;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateOfBirth(): ?\DateTimeInterface
    {
        return $this->date_of_birth;
    }

    public function setDateOfBirth(\DateTimeInterface $date_of_birth): static
    {
        $this->date_of_birth = $date_of_birth;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): static
    {
        $this->gender = $gender;

        return $this;
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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeImmutable $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getProfilePicture(): ?string
    {
        return $this->profile_picture;
    }

    public function setProfilePicture(?string $profile_picture): static
    {
        $this->profile_picture = $profile_picture;

        return $this;
    }

    /**
     * @return Collection<int, VehicleStaffAssignment>
     */
    public function getVehicleStaffAssignments(): Collection
    {
        return $this->vehicle_staff_assignments;
    }

    public function addVehicleStaffAssignment(VehicleStaffAssignment $vehicleStaffAssignment): static
    {
        if (!$this->vehicle_staff_assignments->contains($vehicleStaffAssignment)) {
            $this->vehicle_staff_assignments->add($vehicleStaffAssignment);
            $vehicleStaffAssignment->setStaffDetail($this);
        }

        return $this;
    }

    public function removeVehicleStaffAssignment(VehicleStaffAssignment $vehicleStaffAssignment): static
    {
        if ($this->vehicle_staff_assignments->removeElement($vehicleStaffAssignment)) {
            // set the owning side to null (unless already changed)
            if ($vehicleStaffAssignment->getStaffDetail() === $this) {
                $vehicleStaffAssignment->setStaffDetail(null);
            }
        }

        return $this;
    }

    public function getUserAccount(): ?User
    {
        return $this->user_account;
    }

    public function setUserAccount(User $user_account): static
    {
        $this->user_account = $user_account;

        return $this;
    }

    /**
     * @return Collection<int, ShopStaffAssignment>
     */
    public function getShopStaffAssignments(): Collection
    {
        return $this->shop_staff_assignments;
    }

    public function addShopStaffAssignment(ShopStaffAssignment $shopStaffAssignment): static
    {
        if (!$this->shop_staff_assignments->contains($shopStaffAssignment)) {
            $this->shop_staff_assignments->add($shopStaffAssignment);
            $shopStaffAssignment->setStaffDetail($this);
        }

        return $this;
    }

    public function removeShopStaffAssignment(ShopStaffAssignment $shopStaffAssignment): static
    {
        if ($this->shop_staff_assignments->removeElement($shopStaffAssignment)) {
            // set the owning side to null (unless already changed)
            if ($shopStaffAssignment->getStaffDetail() === $this) {
                $shopStaffAssignment->setStaffDetail(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, StaffEarning>
     */
    public function getStaffEarnings(): Collection
    {
        return $this->staff_earnings;
    }

    public function addStaffEarning(StaffEarning $staffEarning): static
    {
        if (!$this->staff_earnings->contains($staffEarning)) {
            $this->staff_earnings->add($staffEarning);
            $staffEarning->setStaffDetail($this);
        }

        return $this;
    }

    public function removeStaffEarning(StaffEarning $staffEarning): static
    {
        if ($this->staff_earnings->removeElement($staffEarning)) {
            // set the owning side to null (unless already changed)
            if ($staffEarning->getStaffDetail() === $this) {
                $staffEarning->setStaffDetail(null);
            }
        }

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
            $simcardActivation->setStaffDetail($this);
        }

        return $this;
    }

    public function removeSimcardActivation(SimActivation $simcardActivation): static
    {
        if ($this->simcard_activations->removeElement($simcardActivation)) {
            // set the owning side to null (unless already changed)
            if ($simcardActivation->getStaffDetail() === $this) {
                $simcardActivation->setStaffDetail(null);
            }
        }

        return $this;
    }
}
