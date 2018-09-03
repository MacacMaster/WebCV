<!-- Readme WebCV
By M-A Ramsay -->
# WebCV
## Pour Fred
### Installer le site web
    Juste à copier coller le dossier WEB.
    Il est possible que la page d'erreur 404 et que le formulaire de contact ne fonctionnent pas.
    Si c'est le cas, il y a probablement un conflit avec vos paramètres apache 
### Connection à ADMIN
    username : "FRED"
    password : "Je vais donner 100% pour ce travail"

### Base de données Oracle
    Base de donnée de l'école
        user: e1195771
        password : AAAaaa111

## Utilisation
### Changer la langue
#### Par GET request
    http://marcandreramsay.ca/index?lang=en
    http://marcandreramsay.ca/index?lang=fr
#### Par le bouton EN/FR
    Juste à appuyer sur le bouton en haut à gauche de la page.

### Accèder au CV
#### Par token
http://marcandreramsay.ca/token?tk=AAAAAAAAAA
    Pour Accèder au CV, il vous faut un code qui vous à été remis lors
    de la remise conventionnelle du CV par courriel.

**\*Attention : le token expire après une semaine!**

### Accéder à la page Admin
    Vous n'avez pas le droit d'y accéder.

## Technologies Utilisés
### Langages
    * Javascript
    * HTML
    * CSS
    * XML - Localisation
    * PHP - Server-side

### Librairies
#### Client
    JQuery, BootStrap, Materialize, Template Freelance
#### Serveur
    PHP MongoDB driver, PDO, bcrypt
