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

> Pourquoi doit-on implémenter des méthodes to string dans nos entités ?

Lorsque l'on a une relation, symfony essaie d'afficher un object (Entity) s'il on ne met pas de __toString, ce qui n'est pas possible


## Controller

> Qu'est-ce que le ParamConverter ? À quoi sert le Doctrine Param Converter ?

Le ParamConverter est une annotation, elle sert à convertir les paramètres (request) en objet

## Formulaires

> Qu'est-ce qu'un formulaire Symfony ?

Le formulaire de symfony est un outil puissant qui évite le code habituel rébarbatif

> Quels avantages offrent l'usage d'un formulaire ?

Un formulaire Symfony permet de générer les champs (côté front-end) très facilement avec les class css graces aux thèmes.

Côté back-end, il permet en plus de générer des champs dynamiques, de renvoyer des erreurs en fonction des validations écrites via les entités ou directement dans les class types

Niveau sécurité, un token CSRF est inséré et vérifié de manière automatique

> Quelles sont les différentes personalisations de formulaire qui peuvent être faites dans Symfony ?

- Customisation des validations
- Customisation du rendu HTML
- Customisation "FormType"

## Sécurité

> Définir les termes suivants : Encoder, Provider, Firewall, Access Control, Role, Voter

**Encoder** : Option qui définit l'algorithme utilisé pour encoder le mot de passe des utilisateurs.

**Provider** : 

**Firewall** : Permet de rendre accessible des urls en fonction des roles

**Access Control** : autoriser / refuser des liens à des ips / nom de domaines. Forcer le protocol HTTP / HTTPS

**Role** : les rôles sont un tableau qui est stocké dans la base de données, et chaque utilisateur se voit toujours attribuer au moins un rôle: ROLE_USER

**Voter** : Centraliser les permissions et les rendres réutilisables

> Définir les termes suivants : Argon2i, Bcrypt, Plaintext, BasicHTTP

**Argon2i** : algorithme de hash

**Bcrypt** : algorithme de hash

**Plaintext** : mot de passe en clair

**BasicHTTP** : authentification par une popup du navigateur

> Expliquer le principe de hachage.

Rendre le mot de passe un con préhensible pour nous pour améliorer la sécurité

> Expliquer le principe de hachage.

Rendez la tâche d'un attaquant très difficile pour connaitre le mot de passe original

## Services

> À quoi sert un service dans Symfony ? <br />
Avez-vous déjà utilisé des services dans ce projet ? Si oui, lesquels ?<br />
Définir les termes suivant : Dependency Injection, Service, Autowiring, Container

> À quoi sert un service dans Symfony ? <br />
Avez-vous déjà utilisé des services dans ce projet ? Si oui, lesquels ?<br />
Définir les termes suivant : Dependency Injection, Service, Autowiring, Container
