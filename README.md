# database_manager

## 1. Présentation

Database Manager est une application web locale permettant de gérer et de consulter plusieurs bases de données SQLite depuis une interface unique.

L'application est développée en PHP natif procédural, avec une architecture MMVC (Model, View, Controller).

Elle fonctionne sous Linux avec Apache2.

L'objectif est de proposer une interface simple et légère permettant d'importer, de gérer et d'explorer des bases de données SQLite sans modifier leur contenu.

## 2. Technologies

- PHP 8.4+
- SQLite
- PDO SQLite
- HTML5
- CSS3
- JavaScript
- Bootstrap 5
- Apache2

## 3. Objectifs

- Importer des bases de données SQLite.
- Ajouter des bases de données existantes.
- Afficher les bases enregistrées.
- Consulter le contenu des bases.
- Explorer les tables et les vues.
- Afficher les données d'une table.
- Filtrer les données selon une colonne.
- Trier et paginer les résultats.
- Supprimer des bases de données.
- Centraliser la gestion des bases depuis une page d'accueil.

## 4. Fonctionnalités

### 4.1. Accueil

L'accueil constitue le point central de l'application.

Il permet de :

- Afficher le nombre total de bases enregistrées.
- Afficher la liste des bases disponibles.
- Afficher le nom de chaque base.
- Accéder à une base en cliquant sur son nom.
- Importer une nouvelle base SQLite.
- Ajouter une base existante.
- Supprimer une base enregistrée.
- Supprimer définitivement une base avec confirmation.

### 4.2. Exploration d'une base

Chaque base dispose d'une page dédiée.

Cette page permet de :

- Afficher le nom de la base sélectionnée.
- Afficher la liste des tables et des vues.
- Sélectionner une table à consulter.
- Accéder aux informations générales de la base.

### 4.3. Consultation des données

La consultation permet de sélectionner une table et de choisir le mode d'affichage.

Deux modes sont disponibles :

**1. Affichage complet**

- Afficher toutes les données d'une table.
- Consulter les résultats sous forme de tableau HTML.

**2. Filtrage des données**

- Sélectionner une colonne.
- Saisir une valeur à rechercher.
- Afficher les enregistrements correspondant au filtre.

Les résultats disposent également des fonctionnalités suivantes :

- Pagination.
- Tri des colonnes.
- Affichage des données.
- Gestion des résultats vides.

Toutes les opérations de consultation sont effectuées en lecture seule.

## 5. Contraintes

- SQLite uniquement.
- Application locale.
- PHP natif procédural, sans classes.
- Architecture MMVC.
- Interface claire (Light UI).
- Consultation des bases en lecture seule.
- Aucun éditeur SQL.
- Aucune modification des données.
- Aucune création ou modification de tables.
- Importation et suppression des fichiers uniquement via les fonctionnalités prévues.
- Stockage des bases dans des répertoires individuels.
- Protection des fichiers internes contre les accès HTTP directs.

## 6. Architecture du projet

```text
DatabaseManager/
│
├── app/
│   ├── controllers/
│   │   ├── HomeController.php
│   │   ├── DatabaseController.php
│   │   └── ImportController.php
│   │
│   ├── models/
│   │   ├── DatabaseModel.php
│   │   └── TableModel.php
│   │
│   └── views/
│       ├── home.php
│       │
│       ├── database/
│       │   ├── index.php
│       │   └── table.php
│       │
│       └── errors/
│           ├── 404.php
│           └── 500.php
│
├── config/
│   ├── .htaccess
│   ├── application.db
│   ├── application.sql
│   ├── config.php
│   └── database.php
│
├── core/
│   ├── .htaccess
│   ├── bootstrap.php
│   ├── helpers.php
│   ├── router.php
│
├── includes/
│   ├── header.php
│   ├── footer.php
│   └── sidebar.php
│
├── public/
│   ├── index.php
│   ├── .htaccess
│   │
│   └── assets/
│       ├── css/
│       │   ├── style.css
│       │   ├── bootstrap.css
│       │   └── database.css
│       │
│       ├── js/
│       │   ├── app.js
│       │   └── database.js
│       │
│       └── images/
│           └── logo.png
│
├── storage/
│   ├── databases/
│   │   ├── ecommerce/
│   │   │   ├── ecommerce.db
│   │   │   └── ecommerce.sql
│   │   │
│   │   ├── blog/
│   │   │   ├── blog.db
│   │   │   └── blog.sql
│   │   │
│   │   └── inventory/
│   │       ├── inventory.db
│   │       └── inventory.sql
│   │
│   ├── uploads/
│   │   └── temporary/
│   │
│   └── logs/
│       ├── error.log
│       └── success.log
│
├── tests/
│   ├── models/
│
└── README.md
```

## 7. Rôle des dossiers

| Dossier | Rôle |
|---|---|
| app/controllers | Gestion des requêtes HTTP et coordination des traitements |
| app/models | Accès aux bases SQLite et récupération des données |
| app/views | Interfaces HTML/PHP |
| config | Configuration et base SQLite interne |
| core | Initialisation, routage, fonctions communes et sécurité |
| includes | Éléments d'interface partagés |
| public | Point d'entrée de l'application et ressources publiques |
| storage/databases | Stockage des bases SQLite importées |
| storage/uploads | Stockage temporaire des fichiers importés |
| storage/logs | Journaux de l'application |
| tests/models | Tests des modèles |

## 8. Organisation et stockage des bases de données

### 8.1. Répertoire principal

Toutes les bases de données gérées par l'application sont stockées dans :

`storage/databases/`

Chaque base possède son propre répertoire, dont le nom correspond exactement au nom de la base de données.

### 8.2. Organisation des fichiers

Chaque répertoire contient obligatoirement deux fichiers :

- `nom.db` : fichier de base de données SQLite utilisé pour la consultation.
- `nom.sql` : script SQL correspondant à la base de données.

Le nom du répertoire, le nom du fichier SQLite et le nom du script SQL doivent être identiques. Seule l'extension change.

### 8.3. Exemple d'organisation

```text
storage/
└── databases/
    │
    ├── ecommerce/
    │   ├── ecommerce.db
    │   └── ecommerce.sql
    │
    ├── blog/
    │   ├── blog.db
    │   └── blog.sql
    │
    └── inventory/
        ├── inventory.db
        └── inventory.sql
```

Autre exemple pour une base appelée `clients` :

```text
storage/databases/clients/
├── clients.db
└── clients.sql
```

### 8.4. Règles de stockage

1. Chaque base possède son propre répertoire.
2. Le répertoire porte le nom de la base.
3. Le fichier SQLite porte le même nom que le répertoire, avec l'extension `.db`.
4. Le script SQL porte le même nom que le répertoire, avec l'extension `.sql`.
5. Chaque répertoire contient uniquement les fichiers associés à sa base.
6. Les bases sont enregistrées dans la base interne `config/application.db`.
7. Le fichier `.db` constitue la source de vérité pour la consultation.
8. Le fichier `.sql` constitue le script exporté correspondant à la base.

### 8.5. Base interne de l'application

La base `config/application.db` est réservée au fonctionnement interne de Database Manager.

Elle contient les informations nécessaires à la gestion des bases enregistrées :

- Identifiant de la base.
- Nom de la base.
- Nom du répertoire associé.
- Date d'enregistrement.

Elle ne contient pas les données des bases externes.

Le fichier `config/application.sql` contient le script SQL permettant de créer la structure de cette base interne.

### 8.6. Importation d'une base

Lorsqu'une base SQLite est importée :

1. Le fichier est réceptionné dans `storage/uploads/temporary/`.
2. Le fichier est validé pour vérifier qu'il s'agit bien d'une base SQLite exploitable.
3. Le nom de la base est déterminé et validé.
4. Un répertoire portant ce nom est créé dans `storage/databases/`.
5. Le fichier SQLite est placé dans ce répertoire et renommé selon le nom du répertoire.
6. Le script SQL correspondant est généré.
7. Une référence à la base est enregistrée dans `config/application.db`.
8. Les fichiers temporaires sont supprimés.

Exemple après importation :

```text
storage/databases/
└── ecommerce/
    ├── ecommerce.db
    └── ecommerce.sql
```

### 8.7. Suppression d'une base

Lorsqu'une base est supprimée définitivement :

1. Une confirmation est demandée à l'utilisateur.
2. Le répertoire associé est identifié et validé.
3. Les fichiers de la base sont supprimés.
4. Le répertoire de la base est supprimé.
5. La référence correspondante est supprimée de `config/application.db`.

La suppression doit être effectuée uniquement dans les répertoires autorisés.

## 9. Sécurité

L'application doit respecter les règles suivantes :

### 9.1. Accès aux bases SQLite

- Ouvrir les bases externes en mode SQLite lecture seule.
- Activer `PRAGMA query_only = ON`.
- Ne jamais effectuer d'opérations de modification sur les bases explorées.

### 9.2. Protection des fichiers

- Vérifier et sécuriser les chemins des fichiers.
- Empêcher les accès hors de `storage/databases/`.
- Valider les fichiers SQLite importés.
- Vérifier les noms des bases et des répertoires.
- Empêcher l'écrasement accidentel d'une base existante.
- Ne jamais exposer directement les dossiers internes depuis Apache.

### 9.3. Protection des requêtes

- Échapper les données affichées en HTML.
- Utiliser des requêtes préparées lorsque nécessaire.
- Valider les noms de tables et de colonnes avant de les utiliser dans les requêtes.
- Protéger les formulaires d'importation et de suppression contre les attaques CSRF.

### 9.4. Configuration serveur

- Utiliser `public/` comme racine documentaire Apache.
- Bloquer les accès HTTP directs aux dossiers `config/`, `core/` et `storage/`.
- Exécuter l'application localement sur `127.0.0.1`.

## 10. Ordre de développement

Le développement sera réalisé progressivement selon les étapes suivantes :

1. Initialisation du projet et configuration PHP.
2. Mise en place de l'architecture MMVC.
3. Configuration d'Apache2 et du point d'entrée.
4. Création de la base interne SQLite.
5. Développement de la gestion des bases enregistrées.
6. Développement de l'importation des bases SQLite.
7. Développement de la suppression des bases.
8. Développement de la page d'accueil.
9. Développement de l'explorateur de bases.
10. Développement de la consultation des tables.
11. Ajout des filtres, du tri et de la pagination.
12. Intégration du design.
13. Tests, sécurité et corrections.
14. Documentation et finalisation.

## 11. Critères de validation

L'application sera considérée comme fonctionnelle lorsqu'elle permettra de :

- Importer une base SQLite.
- Ajouter une base existante.
- Créer un répertoire individuel pour chaque base.
- Générer les deux fichiers `.db` et `.sql` avec le même nom que leur répertoire.
- Enregistrer les références des bases dans la base interne.
- Afficher le nombre de bases enregistrées.
- Lister les bases disponibles.
- Ouvrir une base depuis l'accueil.
- Explorer ses tables et ses vues.
- Consulter les données d'une table.
- Filtrer les données selon une colonne.
- Trier et paginer les résultats.
- Supprimer une base avec confirmation.
- Supprimer correctement le répertoire, ses fichiers et la référence associée.
- Garantir qu'aucune donnée des bases explorées ne puisse être modifiée depuis l'application.

---

**Fin du cahier des charges.**