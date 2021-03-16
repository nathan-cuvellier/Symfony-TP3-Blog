![PHP >= 8.0](https://img.shields.io/badge/php-%3E%3D%208.0-8892BF.svg)

# TP3 - Blog avec Symfony

## Getting stared

> Quelles sont les fonctionnalités principales du Symfony CLI ?

- Un serveur web local puissant
- Un outil pour vérifier les vulnérabilités de sécurité

## Doctrine
> Quelles relations existent entre les entités (Many To One/Many To Many/...) ?
Faire un schéma de la base de données.

![mcd](https://nathan-cuvellier.fr/img/mcd_tp3.png)


> Expliquer ce qu'est le fichier .env

Le fichier .env est lu et analysé à chaque requête et ses variables d'environnement sont ajoutées aux variables PHP `$_ENV` & `$_SERVER`. Les variables d'environnements existants ne sont jamais écrasées par les valeurs définies dans .env, vous pouvez donc combiner les deux.

> Expliquer pourquoi il faut changer le connecteur à la base de données

La connexion par défaut est configuré pour postgres, ici on utilise SQLite

> Expliquer l'intérêt des migrations d'une base de données

Les migrations sont très utiles pour pouvoir créer / mettre à jour la base de données que se soit en dev ou en prod
Cela permet d'éviter d'appliquer manuellement les modifications de la base de données avec des instructions SQL.

## Administration

> Faire une recherche sur les différentes solutions disponibles pour l'administration dans Symfony

- EasyAdmin
- A la main
- SONATA PROJECT

> Travail préparatoire : Qu'est-ce que EasyAdmin ?

EasyAdmin crée de superbes backends d'administration, il s'appuit sur le composant Security de Symfony

## Controller

> Qu'est-ce que le ParamConverter ? À quoi sert le Doctrine Param Converter ?

Le ParamConverter est une annotation, elle sert à convertir les paramètres (request) en objet
