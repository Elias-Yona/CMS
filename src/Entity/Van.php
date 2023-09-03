<?php

namespace App\Entity;

use App\Repository\VanRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VanRepository::class)]
class Van
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $number_plate = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $working_area = null;

    #[ORM\OneToMany(mappedBy: 'van', targetEntity: VehicleStaffAssignment::class)]
    private Collection $vehicle_staff_assignments;

    #[ORM\OneToMany(mappedBy: 'van', targetEntity: VehicleDriverAssignment::class)]
    private Collection $vehicle_driver_assignments;

    public function __construct()
    {
        $this->vehicle_staff_assignments = new ArrayCollection();
        $this->vehicle_driver_assignments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumberPlate(): ?string
    {
        return $this->number_plate;
    }

    public function setNumberPlate(string $number_plate): static
    {
        $this->number_plate = $number_plate;

        return $this;
    }

    public function getWorkingArea(): ?string
    {
        return $this->working_area;
    }

    public function setWorkingArea(string $working_area): static
    {
        $this->working_area = $working_area;

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
            $vehicleStaffAssignment->setVan($this);
        }

        return $this;
    }

    public function removeVehicleStaffAssignment(VehicleStaffAssignment $vehicleStaffAssignment): static
    {
        if ($this->vehicle_staff_assignments->removeElement($vehicleStaffAssignment)) {
            // set the owning side to null (unless already changed)
            if ($vehicleStaffAssignment->getVan() === $this) {
                $vehicleStaffAssignment->setVan(null);
            }
        }

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
            $vehicleDriverAssignment->setVan($this);
        }

        return $this;
    }

    public function removeVehicleDriverAssignment(VehicleDriverAssignment $vehicleDriverAssignment): static
    {
        if ($this->vehicle_driver_assignments->removeElement($vehicleDriverAssignment)) {
            // set the owning side to null (unless already changed)
            if ($vehicleDriverAssignment->getVan() === $this) {
                $vehicleDriverAssignment->setVan(null);
            }
        }

        return $this;
    }
}
