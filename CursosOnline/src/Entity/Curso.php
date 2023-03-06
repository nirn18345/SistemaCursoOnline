<?php

namespace App\Entity;

use App\Repository\CursoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CursoRepository::class)]
class Curso
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $nombre = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Usuario $UsuarioI = null;

    #[ORM\OneToMany(mappedBy: 'CursoID', targetEntity: Matriculacion::class)]
    private Collection $matriculacions;

    public function __construct()
    {
        $this->matriculacions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getUsuarioI(): ?Usuario
    {
        return $this->UsuarioI;
    }

    public function setUsuarioI(?Usuario $UsuarioI): self
    {
        $this->UsuarioI = $UsuarioI;

        return $this;
    }

    /**
     * @return Collection<int, Matriculacion>
     */
    public function getMatriculacions(): Collection
    {
        return $this->matriculacions;
    }

    public function addMatriculacion(Matriculacion $matriculacion): self
    {
        if (!$this->matriculacions->contains($matriculacion)) {
            $this->matriculacions->add($matriculacion);
            $matriculacion->setCursoID($this);
        }

        return $this;
    }

    public function removeMatriculacion(Matriculacion $matriculacion): self
    {
        if ($this->matriculacions->removeElement($matriculacion)) {
            // set the owning side to null (unless already changed)
            if ($matriculacion->getCursoID() === $this) {
                $matriculacion->setCursoID(null);
            }
        }

        return $this;
    }
}
