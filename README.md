# Réservation suivi d&#039;événement
-Permet d'être informé quand l'inscription pour un type d'événement est à nouveau disponible

## Plugin nécessaires

### Envoi de mise à jour
- [Newsletters](https://contrib.spip.net/Newsletters)
- [Mailsubscribers](https://contrib.spip.net/Mailsubscribers)
- [Mailshot](https://contrib.spip.net/Mailshot)

### Les commentaires

- Plugin forum du core (forum privé)


## Mise en oeuvre
Un formulaire `#RESERVATION_SUIVI{objet, id_objet}` avec les champs:

- Nom (session si logué)
- Email (session si logué)
- Checkbox "tenir au courant"
- Message

### Objet reservations_suivis
Objet

### Envoi de mises à jour
Si "tenir au courant" sélectionné.

#### Inscription mailingliste avec satut
statut : "reservaton_suivi"
identifiant : "reservation_suivi_objet_id_objet_lang"
Titre : "Reservatioin suivi: Titre de l'objet (lang)"
Vérifie s'il existe déjà une mailingliste pour l'objet en question -> tenir en compte la langue, sinon la créer.

### Créer un info lettre Reservatioin suivi: Titre de l'objet (lang)
Vérifier comment est la meilleurre manièr de procéder
Idée une infolettre est crée pour chaque objet
Un objet reservation_suivis table de lien lie les objets à lier(rubrique, article ou événement) à une infolettre






