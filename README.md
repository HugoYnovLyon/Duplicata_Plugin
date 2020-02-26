# Duplicata Plugin
 Plugin pour GLPI de duplication de projet et de ses dépendances (tâches, ...).



## objectif

L'objectif est l'implémentation d'un bouton sur le formulaire "project.form" sur lequel nous pouvons voir et modifier tous les détails d'un projet.

De cette manière, un projet peut servir de "Template" ou "Gabarit". Il existe bien entendu des gabarits de projets, cependant, ces derniers ne prennent pas en compte les tâches récurrentes que l'on peut retrouver dans tous les projets.

Ce plugin permet de préparer des "projets types" ainsi que les tâches typiquement associées.





## Traitements

- Duplication des tâches du projet;
- Création d'un nouveau projet;
- attribution des tâches dupliquées + nouvelle date de création
- Toutes les autres données ( Priorité, États, ...) doivent-être conservées dans la mesure du possible.