<?php

namespace App\Entity;

use App\Repository\MatriculacionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MatriculacionRepository::class)]
class Matriculacion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'matriculacion', targetEntity: Usuario::class)]
    private Collection $UsuarioID;

    #[ORM\ManyToOne(inversedBy: 'matriculacions')]
    private ?Curso $CursoID = null;

    public function __construct()
    {
        $this->UsuarioID = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Usuario>
     */
    public function getUsuarioID(): Collection
    {
        return $this->UsuarioID;
    }

    public function addUsuarioID(Usuario $usuarioID): self
    {
        if (!$this->UsuarioID->contains($usuarioID)) {
            $this->UsuarioID->add($usuarioID);
            $usuarioID->setMatriculacion($this);
        }

        return $this;
    }

    public function removeUsuarioID(Usuario $usuarioID): self
    {
        if ($this->UsuarioID->removeElement($usuarioID)) {
            // set the owning side to null (unless already changed)
            if ($usuarioID->getMatriculacion() === $this) {
                $usuarioID->setMatriculacion(null);
            }
        }

        return $this;
    }

    public function getCursoID(): ?Curso
    {
        return $this->CursoID;
    }

    public function setCursoID(?Curso $CursoID): self
    {
        $this->CursoID = $CursoID;

        return $this;
    }
}
