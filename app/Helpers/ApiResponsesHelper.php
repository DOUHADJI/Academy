<?php

namespace App\Helpers;

class ApiResponsesHelper {

    public static function successCreationMessage(string $modelName)
    {
        return [
            "title" => "Création réussie",
            "content" =>  $modelName . " a été créé avec succès."
        ];
    }

    public static function successUpdateMessage(string $modelName)
    {
        return [
            "title" => "Mise à jour réussie",
            "content" =>  $modelName . " a été mis à jour avec succès."
        ];
    }

    public static function successDeleteMessage(string $modelName)
    {
        return [
            "title" => "Suppression réussie",
            "content" =>  $modelName . " a été supprimé avec succès."
        ];
    }

    public static function successRetrieveMessage(string $modelName)
    {
        return [
            "title" => "Récupération réussie",
            "content" =>  $modelName . " a été récupéré avec succès."
        ];
    }

    public static function notFoundMessage(string $modelName)
    {
        return [
            "title" => "Non trouvé",
            "content" =>  $modelName . " n'a pas été trouvé."
        ];
    }

    public static function errorMessage(string $modelName, string $action = 'traiter')
    {
        return [
            "title" => "Erreur",
            "content" => "Une erreur s'est produite lors de la tentative de " . $action . " le " . $modelName . "."
        ];
    }

    public static function validationErrorMessage(array $errors)
    {
        return [
            "title" => "Erreurs de validation",
            "content" => "Les données fournies sont invalides.",
            "errors" => $errors
        ];
    }

    public static function unauthorizedMessage()
    {
        return [
            "title" => "Accès non autorisé",
            "content" => "Vous n'êtes pas autorisé à accéder à cette ressource."
        ];
    }

    public static function forbiddenMessage()
    {
        return [
            "title" => "Accès interdit",
            "content" => "Vous n'avez pas la permission d'accéder à cette ressource."
        ];
    }

    public static function serverErrorMessage()
    {
        return [
            "title" => "Erreur du serveur",
            "content" => "Une erreur interne du serveur s'est produite. Veuillez réessayer plus tard."
        ];
    }

    public static function conflictMessage(string $modelName)
    {
        return [
            "title" => "Un conflit est survenu.",
            "content" =>  $modelName . " existe déjà."
        ];
    }

    public static function badRequestMessage(string $details = 'La requête est invalide.')
    {
        return [
            "title" => "Mauvaise requête",
            "content" => $details
        ];
    }
}
