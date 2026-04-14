# WF3 - Évaluation 4 — Application VTC (MVC PHP)

Application web de gestion d'une flotte VTC, développée en PHP avec une architecture **MVC maison** (sans framework). Elle permet de gérer des conducteurs, des véhicules, et leurs associations.

---

## Prérequis

- PHP 7.2 ou supérieur
- MySQL 5.7 ou supérieur
- Un serveur local type **MAMP**, **WAMP**, **XAMPP** ou equivalent
- Composer

---

## Installation

### 1. Cloner ou décompresser le projet

Placez le dossier du projet dans le répertoire web de votre serveur local (ex: `htdocs/` pour MAMP).

```
htdocs/
└── WF3-evaluation-4/
```

### 2. Installer les dépendances Composer

```bash
cd WF3-evaluation-4
composer install
```

### 3. Importer la base de données

Dans **phpMyAdmin** (ou via la CLI MySQL) :

1. Créer une base de données nommée `vtc_lauremarietorre`
2. Importer le fichier `DATABASE_VTC_LMTORRE.sql`

```bash
mysql -u root -p vtc_lauremarietorre < DATABASE_VTC_LMTORRE.sql
```

### 4. Configurer la connexion à la base de données

Ouvrir `config/config.php` et adapter les constantes selon votre environnement :

```php
const DB_HOST = 'localhost';
const DB_PORT = '8889';        // 3306 par défaut, 8889 pour MAMP
const DB_NAME = 'vtc_lauremarietorre';
const DB_USER = 'root';
const DB_PWD  = 'root';

const BASE_URL = "http://localhost:8888/WF3-evaluation-4/";
```

---

## Structure du projet

```
WF3-evaluation-4/
├── config/
│   ├── config.php          # Constantes globales (BDD, URL de base)
│   ├── Db.php              # Classe de connexion et requêtes PDO
│   ├── aliases.php         # Alias de classes
│   └── helpers.php         # Fonctions utilitaires (view, url, redirectTo...)
├── src/
│   ├── controller/
│   │   ├── ConducteursController.php
│   │   ├── VehiculesController.php
│   │   ├── AssociationsController.php
│   │   └── PagesController.php
│   └── model/
│       ├── Conducteur.php
│       ├── Vehicule.php
│       └── Association.php
├── public/
│   └── views/
│       ├── conducteurs/    # add, edit, liste, delete
│       ├── vehicules/      # add, edit, liste, delete
│       ├── associations/   # add, edit, liste, delete
│       └── template.php    # Layout principal
├── index.php               # Point d'entrée de l'application
├── routes.php              # Déclaration de toutes les routes
├── composer.json
└── DATABASE_VTC_LMTORRE.sql
```

---

## Base de données

Trois tables sont utilisées :

| Table | Champs |
|---|---|
| `conducteur` | id, prenom, nom |
| `vehicule` | id, marque, modele, couleur, immatriculation |
| `association_vehicule_conducteur` | id, id_vehicule, id_conducteur |

---

## Routes disponibles

### Conducteurs
| Méthode | URL | Action |
|---|---|---|
| GET | `/liste-conducteurs` | Liste tous les conducteurs |
| GET | `/ajout-conducteur` | Formulaire d'ajout |
| POST | `/ajout-conducteur` | Enregistrer un conducteur |
| GET | `/liste-conducteurs/{id}` | Détail d'un conducteur |
| GET | `/liste-conducteurs/{id}/edit` | Formulaire de modification |
| POST | `/liste-conducteurs/{id}/edit` | Mettre à jour un conducteur |
| GET | `/liste-conducteurs/{id}/delete` | Supprimer un conducteur |

### Véhicules
| Méthode | URL | Action |
|---|---|---|
| GET | `/liste-vehicules` | Liste tous les véhicules |
| GET | `/ajout-vehicule` | Formulaire d'ajout |
| POST | `/ajout-vehicule` | Enregistrer un véhicule |
| GET | `/liste-vehicules/{id}` | Détail d'un véhicule |
| GET | `/liste-vehicules/{id}/edit` | Formulaire de modification |
| POST | `/liste-vehicules/{id}/edit` | Mettre à jour un véhicule |
| GET | `/liste-vehicules/{id}/delete` | Supprimer un véhicule |

### Associations
| Méthode | URL | Action |
|---|---|---|
| GET | `/liste-associations` | Liste toutes les associations |
| GET | `/ajout-association` | Formulaire d'ajout |
| POST | `/ajout-association` | Enregistrer une association |
| GET | `/liste-associations/{id}` | Détail d'une association |
| GET | `/liste-associations/{id}/edit` | Formulaire de modification |
| POST | `/liste-associations/{id}/edit` | Mettre à jour une association |
| GET | `/liste-associations/{id}/delete` | Supprimer une association |

---

## Corrections apportées

Ce projet contenait plusieurs bugs dans les méthodes `update()` qui ont été corrigés :

### Modèles (`Conducteur.php`, `Vehicule.php`, `Association.php`)
- `update()` était déclarée `static` alors qu'elle utilise `$this` → mot-clé `static` retiré
- `$this->id` remplacé par `$this->getId()` pour respecter l'encapsulation

### Controllers (`ConducteursController.php`, `VehiculesController.php`, `AssociationsController.php`)
- Les setters étaient appelés sans l'objet (`setNom(...)` au lieu de `$conducteur->setNom(...)`)
- Champ `mail` inexistant supprimé dans `ConducteursController`, remplacé par `prenom`
- `setId()` inutile retiré dans `VehiculesController::update()` (l'id est déjà récupéré via `findOne($id)`)
- URLs de redirection corrigées (`liste-conducteur` → `liste-conducteurs`, etc.)

---

## Architecture MVC

L'application suit le patron **Modèle - Vue - Contrôleur** :

- **Modèle** : chaque classe dans `src/model/` gère les interactions avec la base de données via la classe `Db`. Elle expose les méthodes `findAll()`, `findOne()`, `save()`, `update()` et `delete()`.
- **Vue** : les fichiers PHP dans `public/views/` affichent les données. Elles sont appelées via la fonction helper `view('dossier.fichier', $data)`.
- **Contrôleur** : les classes dans `src/controller/` reçoivent les requêtes HTTP via le routeur, manipulent les modèles, et appellent les vues correspondantes.
