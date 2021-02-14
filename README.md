# PHP-Example :+1:

Simple site internet avec Backend sous PHP et Frontend.

---

# Backend

## Application

Object          | Service       | Controller
------------    | ------------- | -------------
Database        | X             | X 
User            | UserService   | ListUser , DeleteUser
Session         | instance      | X

## Base de donnée

Fichier         | Table     
------------    | -------------
user.sql        | user         

## Bibliothéque SqlGateOrm

Example d'un simple code php pour la création d'un ORM maison.

Object          | Service       
------------    | ------------- 
OrmQuery        | Implémente tout les requêtes sql          
OrmClass        | Implémente tout les fonctions principales

## TO DO

- [X] Gestion des images utilisateur

---

# Frontend

## Pages

Page            | Fonction
------------    | ------------- 
Index.php       | Page principale du site web
Login.php       | Menu de connexion utilisateur, retour index.php
Logout.php      | Déconnexion utilisateur, retour index.php
SignIn.php      | Inscription utilisateur.
Profile.php     | Modification des informations utilisateur.

## Javascript

Script          | Fonction
------------    | ------------- 
AlertBox        | Gestion des boites d'alerte utilisateur

## PHP-include

Include         | Fonction
------------    | ------------- 
NavigationBar   | Bar de navigation du site web

## TO DO 

- [X] Page d'incription utilisateur.
- [X] Menu Principale.
- [X] Page profile utilisateur.

---

-- <cite>Marcheix François-Xavier</cite>