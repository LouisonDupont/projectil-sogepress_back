# Back-end du projet de CRM pour Projectil-Sogepress

Mise à disposition d'une API pour le front-end du projet. 
Réalisé sous Symfony avec API Plateform

projet front : https://github.com/LouisonDupont/projectil-sogepress_front
documentation : https://github.com/LouisonDupont/projectil-sogepress_doc

## Installation

```
git clone git@github.com:LouisonDupont/projectil-sogepress_back.git
cd projectil-sogepress_back
```

Puis, créer un fichier .env.local et paramétrer DATABASE_URL avec vos données de connexion MySQL locales. Choisir un nom pour la base de données de test.

```
symfony console doctrine:database:create
symfony console doctrine:migrations:migrate
```
