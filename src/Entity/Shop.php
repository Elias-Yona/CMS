<?php

namespace App\Entity;

use App\Repository\ShopRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ShopRepository::class)]
class Shop
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $address = null;

    #[ORM\OneToMany(mappedBy: 'shop', targetEntity: ShopStaffAssignment::class)]
    private Collection $shop_staff_assignments;

    public function __construct()
    {
        $this->shop_staff_assignments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

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
            $shopStaffAssignment->setShop($this);
        }

        return $this;
    }

    public function removeShopStaffAssignment(ShopStaffAssignment $shopStaffAssignment): static
    {
        if ($this->shop_staff_assignments->removeElement($shopStaffAssignment)) {
            // set the owning side to null (unless already changed)
            if ($shopStaffAssignment->getShop() === $this) {
                $shopStaffAssignment->setShop(null);
            }
        }

        return $this;
    }
}
