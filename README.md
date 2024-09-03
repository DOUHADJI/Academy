# GLab - Application de Gestion des Laboratoires

GLab est une application puissante et intuitive de gestion des laboratoires conçue pour simplifier et automatiser les processus de gestion des laboratoires médicaux. Elle est construite en utilisant Laravel pour le backend et React pour le frontend, avec Tailwind CSS pour le style.

## Table des Matières

1. [Fonctionnalités](#fonctionnalités)
2. [Technologies Utilisées](#technologies-utilisées)
3. [Installation](#installation)
4. [Configuration](#configuration)
5. [Utilisation](#utilisation)
6. [Licence](#licence)

## Fonctionnalités

- Gestion des modules et des permissions
- Gestion des départements du laboratoire
- Composants personnalisés pour les formulaires et les modals
- Notifications de succès et d'erreur
- Thème rouge avec des accents verts pour correspondre à la charte graphique de GLab Group
- Utilisation de React Router DOM pour la navigation

## Technologies Utilisées

- **Backend :** Laravel
- **Frontend :** React, React Router DOM
- **Style :** Tailwind CSS, Next UI
- **Icônes :** react-icons
- **Notifications :** react-toastify

## Installation

Pour installer l'application, suivez ces étapes :

### Prérequis

- PHP
- Composer
- Node.js
- NPM ou Yarn

### Étapes

1. Clonez le dépôt :
    ```bash
    git clone https://github.com/Glab-Group-Tg/Glab.git
    cd GLab
    ```

2. Installez les dépendances du backend :
    ```bash
    composer install
    ```

3. Installez les dépendances du frontend :
    ```bash
    npm install
    ```

4. Configurez votre environnement :
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

5. Compilez les assets :
    ```bash
    npm run dev
    ```

6. Démarrez le serveur Laravel :
    ```bash
    php artisan serve
    ```

## Configuration

Assurez-vous de configurer correctement votre fichier `.env` avec les informations de votre base de données et autres configurations nécessaires.

## Utilisation

- Accédez à l'application via `http://localhost:8000`.
- Connectez-vous avec vos identifiants.
- Naviguez à travers les différents modules pour gérer les départements, les analyses, et bien plus encore.


## Licence

Ce projet est sous licence MIT. Voir le fichier [LICENSE](LICENSE) pour plus de détails.

---

Cette structure fournit une vue d'ensemble complète et est facile à naviguer. N'hésitez pas à ajuster les sections et les informations selon les spécificités de votre projet GLab.
