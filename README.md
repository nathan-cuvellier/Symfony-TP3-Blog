![PHP >= 8.0](https://img.shields.io/badge/php-%3E%3D%208.0-8892BF.svg)

# TP3 - Blog avec Symfony

## Doctrine
> Quelles relations existent entre les entités (Many To One/Many To Many/...) ?
Faire un schéma de la base de données.

> Expliquer ce qu'est le fichier .env

Le fichier .env est lu et analysé à chaque requête et ses variables d'environnement sont ajoutées aux variables PHP `$_ENV` & `$_SERVER`. Les variables d'environnements existants ne sont jamais écrasées par les valeurs définies dans .env, vous pouvez donc combiner les deux.

> Expliquer pourquoi il faut changer le connecteur à la base de données

La connexion par défaut est configuré pour postgres, ici on utilise SQLite

> Expliquer l'intérêt des migrations d'une base de données

Les migrations sont très utiles pour pouvoir créer / mettre à jour la base de données que se soit en dev ou en prod
Cela permet d'éviter d'appliquer manuellement les modifications de la base de données avec des instructions SQL.
