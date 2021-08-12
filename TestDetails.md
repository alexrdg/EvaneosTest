# Refactoring Kata Test

## Principe mis en place
Pour cette refacto je suis parti sur un principe de Placeholder qui pourraient, avec une base de données être gérés par les PO directement depuis un éventuel back-office.

### Pourquoi ?
De ce qui est dit dans le brief, cette classe est relativement utilisée, incompréhensible et beaucoup modifiée. Néanmoins le PO doit pouvoir demander de nouveaux placeholders à l'équipe sans que le processus soit chronophage.

### Comment ça marche maintenant ?
Le code, fonctionne comme si les placeholders étaient des entités en base, la seule chose à rajouter pour créer un nouveau placeholder dans le code est dans la méthode `getQuoteValueFromPlaceholder` du fichier `QuoteRepository.php`.

Pour que cela fonctionne il faudra après l'ajout en base de données d'un Placeholder, ajouter un nouveau cas dans le switch de la méthode `getQuoteValueFromPlaceholder` et ajouter une constante dans le fichier de l'entité `Placeholder.php`.

### Améliorations éventuelles ?
Le fonctionnement de la feature repose sur les placeholders. Le principal souci ici, c'est que l'exécution du code repose sur un `findAll()` qui pourrait être gourmand en ressources et bloquer l'application.  
J'ai quand même décidé d'utiliser une méthode de ce type car dans la logique actuelle il ne devrait pas y avoir en base plus de 10-15 placeholder différents.

### Avec plus de temps ?
Avec plus de temps il aurait été nécessaire de :
- Faire des tests unitaires sur les nouvelles méthodes.
- Typer plus proprement les entités afin de ne pas se retrouver avec des return mixed.

Merci à vous ! 