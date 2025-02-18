<?php

namespace App\Entity;

use App\Repository\ProjetRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use OpenApi\Attributes as OA;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ProjetRepository::class)]
#[OA\Schema(
    schema: "Projet",
    description: "Représentation d'un projet",
    title: "Projet"
)]
class Projet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[OA\Property(type: "integer", example: 1)]
    #[Groups(['projet'])]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[OA\Property(type: "string", example: "Mon projet Symfony")]
    #[Groups(['projet'])]
    private ?string $titre = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[OA\Property(type: "string", example: "Une description détaillée de mon projet.")]
    #[Groups(['projet'])]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[OA\Property(type: "string", example: "Symfony, PHP, MySQL")]
    #[Groups(['projet'])]
    private ?string $technologie = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[OA\Property(type: "string", example: "https://demo.monprojet.com")]
    #[Groups(['projet'])]
    private ?string $lien_demo = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[OA\Property(type: "string", example: "https://github.com/user/projet")]
    #[Groups(['projet'])]
    private ?string $lien_github = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[OA\Property(type: "string", example: "https://monprojet.com/image.jpg")]
    #[Groups(['projet'])]
    private ?string $image = null;

    #[ORM\Column]
    #[OA\Property(type: "string", format: "date-time", example: "2025-02-16T14:00:00Z")]
    #[Groups(['projet'])]
    private ?\DateTimeImmutable $date_creation = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getTechnologie(): ?string
    {
        return $this->technologie;
    }

    public function setTechnologie(?string $technologie): static
    {
        $this->technologie = $technologie;

        return $this;
    }

    public function getLienDemo(): ?string
    {
        return $this->lien_demo;
    }

    public function setLienDemo(?string $lien_demo): static
    {
        $this->lien_demo = $lien_demo;

        return $this;
    }

    public function getLienGithub(): ?string
    {
        return $this->lien_github;
    }

    public function setLienGithub(?string $lien_github): static
    {
        $this->lien_github = $lien_github;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeImmutable
    {
        return $this->date_creation;
    }

    public function setDateCreation(\DateTimeImmutable $date_creation): static
    {
        $this->date_creation = $date_creation;

        return $this;
    }
}
