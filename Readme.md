Api avec symfony :
1 Installer le bundle : composer require nelmio/api-doc-bundle
2 l'ajouter dans les bundle symfony si ce n'est pas automatique :
    Dans config/bundle.php
    Nelmio\ApiDocBundle\NelmioApiDocBundle::class => ['all' => true],
3 Allez dans config/packages/nelmio_api_doc.yaml pour ecrire la doc relative à l'api :
    nelmio_api_doc:
        documentation:
            info:
                title: "titre pour API"
                description:"a quoi elle va servir"
                version: "1.0.0"
        areas:
            path_patterns: #pour inclure les routes de l'api
                - ^/api

4 Connection bdd symfony dans .env: DATABASE_URL="mysql://nom_utilisateur:@adreese_localhost:port_decoute_du localhost/nom_bdd"

5 Creer vos entité !!
    symfony console make:entity
    Donner un nom a votre entité puis definir les differentes colonnes de la table (entité)
6 Migrations
    Une fois ta table créé, tu dois obligatoirement faire des migration:
        symfony console make:migration









Le coin des verification :

- BDD driver not found au moment de la creation d'une entité:
    1) Tape dans le terminal : 
        - php -r "new PDO('mysql:host=127.0.0.1;dbname=projets_portfolio', 'root', '');" pour verifier la connection à la bdd
        - Si message d'erreur :
            - php -i | findstr "Loaded Configuration File" pour trouver le fichier php.ini utilisé :
                -> Loaded Configuration File => C:\PHP\php.ini
            - Assure toi que les extensions soit decommenter (enlever le point virgule) :
                extension=mysqli et = pdo_mysql
        - Rataper dans le terminal:
            php -m | findstr pdo :
                reponse positive : 
                    pdo_mysql 
                    pdo_sqlite