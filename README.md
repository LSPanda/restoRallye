#restoRallye

##Projet web 2014-2015

***

Réalisation d’un site web en groupe à l’aide d’un framework **PHP** dans le cadre du cours de Projet Web.

**Groupe :** [Luc Matagne](http://luc-matagne.be/Portfolio/) & [Simon Leyder](http://portfolio.simon-leyder.be/)

***

### Compiler le mockup depuis les sources

1. Cloner le repo
1. Se placer dans le répertoire `mockUp`
1. Lancer `npm install` pour avoir les dépendances
1. Lancer `grunt build` pour compiler le site

***

### Installer Laravel

1. Dans le *terminal*, lancer la commande `composer install`
2. Une fois l'installation complète, créer une base de donnée `restoRallye`
3. Allé modifié le nom de la machine `start.php`
4. Remplir la base de donnée `php artisan migrate --seed`	