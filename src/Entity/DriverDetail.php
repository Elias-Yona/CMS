<?php

namespace App\Entity;

use App\Repository\DriverDetailRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DriverDetailRepository::class)]
class DriverDetail
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

    #[ORM\Column(length: 30)]
    private ?string $license_number = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $license_expiry_date = null;

    #[ORM\Column(length: 255)]
    private ?string $license_class = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $profile_picture = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updated_at = null;

    #[ORM\OneToMany(mappedBy: 'driverDetail', targetEntity: VehicleDriverAssignment::class)]
    private Collection $vehicle_driver_assignments;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user_account = null;

    public function __construct()
    {
        $this->vehicle_driver_assignments = new ArrayCollection();
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

    public function getLicenseNumber(): ?string
    {
        return $this->license_number;
    }

    public function setLicenseNumber(string $license_number): static
    {
        $this->license_number = $license_number;

        return $this;
    }

    public function getLicenseExpiryDate(): ?\DateTimeInterface
    {
        return $this->license_expiry_date;
    }

    public function setLicenseExpiryDate(\DateTimeInterface $license_expiry_date): static
    {
        $this->license_expiry_date = $license_expiry_date;

        return $this;
    }

    public function getLicenseClass(): ?string
    {
        return $this->license_class;
    }

    public function setLicenseClass(string $license_class): static
    {
        $this->license_class = $license_class;

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

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeImmutable $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * @return Collection<int, VehicleDriverAssignment>
     */
    public function getVehicleDriverAssignments(): Collection
    {
        return $this->vehicle_driver_assignments;
    }

    public function addVehicleDriverAssignment(VehicleDriverAssignment $vehicleDriverAssignment): static
    {
        if (!$this->vehicle_driver_assignments->contains($vehicleDriverAssignment)) {
            $this->vehicle_driver_assignments->add($vehicleDriverAssignment);
            $vehicleDriverAssignment->setDriverDetail($this);
        }

        return $this;
    }

    public function removeVehicleDriverAssignment(VehicleDriverAssignment $vehicleDriverAssignment): static
    {
        if ($this->vehicle_driver_assignments->removeElement($vehicleDriverAssignment)) {
            // set the owning side to null (unless already changed)
            if ($vehicleDriverAssignment->getDriverDetail() === $this) {
                $vehicleDriverAssignment->setDriverDetail(null);
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
}
