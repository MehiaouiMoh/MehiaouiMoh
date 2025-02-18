<?php
// src/Controller/HomeController.php
namespace App\Controller;

use App\Entity\Projet;
use Doctrine\ORM\EntityManagerInterface;
use JsonException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use OpenApi\Attributes as OA;
use PHPUnit\Framework\MockObject\Rule\Parameters;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/projets')]
class ProjetController extends AbstractController{
    //Ici on viendra definir chaque routes de notre API
    //Ensemble des requêtes de type get:

    //Route pour recuperer la liste des projets
    #[Route('', methods: ['GET'])] //On definit la route api/projets qui renverra la liste des projets avec un rep 200
    #[OA\Get(
        summary: 'Recuperer la liste des projets',
        tags: ['Projet'], //On definit le tag Projet pour la documentation Swagger UI
        responses: [
            new OA\Response(
                response: 200,
                description: 'Liste des projets',
                content: new OA\JsonContent(type: "array", items: new OA\Items(ref: "#/components/schemas/Projet"))
            ),
            new OA\Response(
                response: 404,
                description: 'Aucun projet trouve, revoyez votre requete',
            ),
            new OA\Response(
                response: 500,
                description: 'Erreur serveur, desole pour le desagrement',
            ),
        ]
        
    )]
    #[Route('/{id}', methods: ['GET'])] //On definit la route api/projets qui renverra la liste des projets avec un rep 200
    #[OA\Get(
        summary: 'Recuperer un projet par son ID',
        tags: ['Projet'], //On definit le tag Projet pour la documentation Swagger UI
        parameters: [
            new OA\Parameter(
                name: 'id',
                in: 'path',
                required: true,
                description: 'ID du projet',
                schema: new OA\Schema(type: 'integer', example: 1)
            )
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: 'Voici le projet: ',
                content: new OA\JsonContent(type: "array", items: new OA\Items(ref: "#/components/schemas/Projet"))
            ),
            new OA\Response(
                response: 404,
                description: 'Aucun projet trouve, revoyez votre requete',
            ),
            new OA\Response(
                response: 500,
                description: 'Erreur serveur, desole pour le desagrement',
            ),
        ]
        
    )]
    #[Route('/titles/{title}', methods: ['GET'])] //On definit la route api/projets qui renverra la liste des projets avec un rep 200
    #[OA\Get(
        summary: 'Recuperer un projets par son nom',
        tags: ['Projet'], //On definit le tag Projet pour la documentation Swagger UI
        parameters: [
            new OA\Parameter(
                name: 'title',
                in: 'path',
                required: true,
                description: "Recupere un projet grâce à son titre",
                schema: new OA\Schema(type: 'string', example: "un site vitrine")
            )

        ],
        responses: [
            new OA\Response(
                response: 200,
                description: 'Voici le projet',
                content: new OA\JsonContent(type: "array", items: new OA\Items(ref: "#/components/schemas/Projet"))
            ),
            new OA\Response(
                response: 404,
                description: 'Aucun projet trouve, revoyez votre requete',
            ),
            new OA\Response(
                response: 500,
                description: 'Erreur serveur, desole pour le desagrement',
            ),
        ]
        
    )]
    public function getProjetByTitle(string $title, EntityManagerInterface $em): JsonResponse{
        $projet = $em->getRepository(Projet::class)->find($title);

        if (!$projet) {
            return $this->json(['message' => 'Aucun projet trouvé'], 404);
        }

        return $this->json($projet, 200, [], ['groups' => 'projet']);
    }
    public function getProjets(EntityManagerInterface $em): JsonResponse{
        $projets = $em->getRepository(Projet::class)->findAll();

        if (!$projets) {
            return $this->json(['message' => 'Aucun projet trouvé'], 404);
        }

        return $this->json($projets, 200, [], ['groups' => 'projet']);
    }
}