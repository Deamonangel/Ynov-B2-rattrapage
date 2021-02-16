# Ynov-B2-rattrapge


Réponse au question: 

1. Qu'est-ce qu'un container de services ? Quel est son rôle ?

-Elément PHP permettant de gérer les services nécessaires au développement.

2. Quelle est la différence entre les commandes make:entity et make:user lorsqu'on utilise la console Symfony ?

-make:entity crée un entité classique ou le développeur ajoutera élément tandis que make:user créera une entité user 
avec les éléments nécessaire a tous les users ainsi que l'encodage des mots de passe

3. Quelle commande utiliser pour charger les fixtures dans la base de données ?

-Voici la commande pour charger les fixtures: -php bin/console doctrine:fixtures:load

4. Résumez de manière simple le fonctionnement du système de versions "Semver"

-Semver sers à versionner les packages (Majeur,Mineur, Patch) 


5. Qu'est-ce qu'un Repository ? A quoi sert-il ?

-Un repository est un lieu de stockage qui centralise la récupération de vos entités 

6. Quelle commande utiliser pour voir la liste des routes ?

-Voici la commande pour voir la liste des routes :-php bin/console debug:router

7. Dans un template Twig, quelle variable globale permet d'accéder à la requête courante, l'utilisateur courant, etc...?

-La variable globale est "app" et pour appeler l'utilisateur faire "app.user"

8. Pour mettre à jour la structure de la base de données, quelles sont les 2 possibilités que nous avons abordées en cours ?

Pour mettre à jour la strucutre de la BDD; voici les possibilité: migration - mise à jour à la volée

9. Quelle commande permet de créer une classe de contrôleur ?

-Voici la commande pour créer une classe contrôleur: -php bin/console make:controller 

10. Décrivez succinctement l'outil Flex de Symfony

Flex de symfony automatise les tâches l'installation et la suppression des bundles et autres dépendances de Composer. 
Flex de symfony fonctionne pour Symfony 4.4 et plus.
