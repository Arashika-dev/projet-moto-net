# projet-moto-net
BDD
dbname=moto-net
password="jFZAWI!1Q*B4LKx["

Compte admin du site: ldweb@php.com 
mdp : lucas

Tous les autres comptes ont le mdp "test".

Pour commencer, je pense que le projet de base était trop 'gourmand', c'est pourquoi j'ai pu simplifier des fonctionnalités ou voir mis de côté pour ne pas rester bloquer. 
C'est pourquoi tu pourras trouver l'onglet "Annonces" vide par exemple. Ou alors les marques et modèles qui sont passés a la trappe.

## Se tromper de route

J'ai d'abord voulu commencer par l'édition des articles, en voulant donner la possibilité de choisir la marque, la catégorie puis le modèle de la moto.
Ce nétait cependant pas la bonne approche, nécessitant trop de pages rebond en usant uniquement de php, ce qui me ralentissait dans ma progression. J'ai donc décider de mettre de cotés ces fonctionnalités dans le dossier "useless", au cas où j'en aurai besoin. 
Car on y retrouve tout un process permettant d'ajouter un modèle à la BDD en définissant chaque paramètre.

## Register & login

Je décide donc de m'orienter vers la création d'utilisateurs ainsi que leur authentifications. 

J'ai donc créer la classe Register intégrant une méthode permettant d'échanger avec la BDD et traitant des cas d'erreurs possibles.
J'y ai aussi intégrer la classe Email que j'avais utilisé lors du cours permettant ainsi la validation de l'email utilisée.
C'est a ce moment que j'ai décider de créer la classe Errors qui contient les constantes d'erreurs ainsi que la méthode permettant de les interpréter, je trouvais ça plus simple d'avoir les deux au même endroit.

Pour finir cette étape, j'ai fait la page de login, en y repensant la création d'une classe aurait été plus "propre" ou alors en ajoutant des méthodes a Register.
Une fois authentifié, je crée un 'userInfos' dans $_SESSION, permettant à l'utilisateur d'accéder a des pages nécessitant d'etre authentifié, j'intègre un niveau supérieur avec le 'is_admin' ajoutant ainsi des accès supplémentaires aux comptes administrateurs.

D'ailleurs, un utilisateur qui s'inscrit est automatiquement connecté, je trouvais ça plus commode.

## Profile & File

Viens ensuite le moment de créer la page de profile. Je voulais qu'un utilisateur puisse modifier toutes ses infos. Cependant je me suis heurter a quelques problématiques.
J'aurais voulu pouvoir faire en sorte que l'on détecte ce qui était modifié dans le formulaire et ce qui ne l'était pas. Impossible pour moi de trouver une solution comme celle-ci. J'ai donc choisi un 'chemin dérivé': donner la possibilité de soumettre une par une chaque données, en les séparants dans des form distincts.
Pour tout ça j'utilise la classe Profile, où j'ai décidé que le constructeur se baserai sur l'id stockée dans $_SESSION pour construire le profil.

Ensuite, il fallait les méthodes permettant de gérer chaque élements du profil, indépendamment.
C'est a ce moment que je créer la classe File, voulant gérer les vérifs des fichiers plus la génération des noms et l'upload sans surcharger Profile. En me disant que je pourrais avoir besoin d'uploader des fichiers ailleurs que sur le profil. 
File ne s'occupe que de l'upload en 'physique' et me retourne le nom du fichier que j'utilise dans Profile pour pouvoir l'enregistrer dans la BDD.
En relisant je me dis que j'aurais pu créer une constante de classe pour le filePath comme je l'ai fait plus tard dans d'autres classes.

Pour revenir a Profile, lorsque un utilisateur 'classique' consulte sa page il n'a accès qu'a ce formulaire. Un administrateur lui, verra apparaitre une section "Derniers articles", que je gère grâce au 'is_admin' contenu dans $_SESSION et la fonction isAdmin().


## Article

La classe Article permets d'uploader et recuperer un article, peut être aurait-il été plus malin de séparer l'uplaod et la récup en deux enfants de Article .. 

