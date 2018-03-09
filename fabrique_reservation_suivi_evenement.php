<?php

/**
 *  Fichier généré par la Fabrique de plugin v6
 *   le 2018-03-09 10:18:59
 *
 *  Ce fichier de sauvegarde peut servir à recréer
 *  votre plugin avec le plugin «Fabrique» qui a servi à le créer.
 *
 *  Bien évidemment, les modifications apportées ultérieurement
 *  par vos soins dans le code de ce plugin généré
 *  NE SERONT PAS connues du plugin «Fabrique» et ne pourront pas
 *  être recréées par lui !
 *
 *  La «Fabrique» ne pourra que régénerer le code de base du plugin
 *  avec les informations dont il dispose.
 *
**/

if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}

$data = array (
  'fabrique' => 
  array (
    'version' => 6,
  ),
  'paquet' => 
  array (
    'prefixe' => 'reservation_suivi_evenement',
    'nom' => 'Réservation suivi d\'événement',
    'slogan' => 'Permet d\'être informé quand l\'inscription pour un type d\'événement est à nouveau disponible',
    'description' => 'Permet à l\'utilisateur de s\'inscrire pour être tenu au courant quand un événement passé est à nouveau ouvert à l\'inscription.',
    'logo' => 
    array (
      0 => '',
    ),
    'version' => '1.0.0',
    'auteur' => 'Rainer Müller',
    'auteur_lien' => '',
    'licence' => 'GNU/GPL',
    'categorie' => 'communication',
    'etat' => 'dev',
    'compatibilite' => '[3.0.0;3.2.*]',
    'documentation' => '',
    'administrations' => 'on',
    'schema' => '1.0.0',
    'formulaire_config' => 'on',
    'formulaire_config_titre' => 'Paramètres Reśervation suivi',
    'fichiers' => 
    array (
      0 => 'autorisations',
      1 => 'fonctions',
      2 => 'pipelines',
    ),
    'inserer' => 
    array (
      'paquet' => '',
      'administrations' => 
      array (
        'maj' => '',
        'desinstallation' => '',
        'fin' => '',
      ),
      'base' => 
      array (
        'tables' => 
        array (
          'fin' => '',
        ),
      ),
    ),
    'scripts' => 
    array (
      'pre_copie' => '',
      'post_creation' => '',
    ),
    'exemples' => 'on',
  ),
  'objets' => 
  array (
    0 => 
    array (
      'nom' => 'Suivis d\'événement',
      'nom_singulier' => 'Suivi d\'événement',
      'genre' => 'masculin',
      'logo' => 
      array (
        0 => '',
        32 => '',
        24 => '',
        16 => '',
        12 => '',
      ),
      'logo_variantes' => 'on',
      'table' => 'reservation_evenement_suivis',
      'cle_primaire' => 'id_reservation_evenement_suivi',
      'cle_primaire_sql' => 'bigint(21) NOT NULL',
      'table_type' => 'reservation_evenement_suivi',
      'champs' => 
      array (
        0 => 
        array (
          'nom' => 'Nom',
          'champ' => 'nom',
          'sql' => 'varchar(255) NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
            2 => 'obligatoire',
          ),
          'recherche' => '10',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
        1 => 
        array (
          'nom' => 'Email',
          'champ' => 'email',
          'sql' => 'varchar(255) NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
            2 => 'obligatoire',
          ),
          'recherche' => '8',
          'saisie' => 'email',
          'explication' => '',
          'saisie_options' => '',
        ),
        2 => 
        array (
          'nom' => 'Commentaire',
          'champ' => 'commentaire',
          'sql' => 'text NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '',
          'saisie' => '',
          'explication' => '',
          'saisie_options' => '',
        ),
        3 => 
        array (
          'nom' => 'ID événement',
          'champ' => 'id_evenement',
          'sql' => 'bigint(21) NOT NULL DEFAULT 0',
          'caracteristiques' => 
          array (
            0 => 'versionne',
          ),
          'recherche' => '',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
        4 => 
        array (
          'nom' => 'ID Auteur',
          'champ' => 'id_auteur',
          'sql' => 'bigint(21) NOT NULL DEFAULT 0',
          'caracteristiques' => 
          array (
            0 => 'versionne',
          ),
          'recherche' => '',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
      ),
      'champ_titre' => 'nom',
      'champ_date' => 'date',
      'statut' => 'on',
      'chaines' => 
      array (
        'titre_objets' => 'Réservation événement suivis',
        'titre_objet' => 'Réservation événement suivi',
        'info_aucun_objet' => 'Aucun réservation événement suivi',
        'info_1_objet' => 'Un réservation événement suivi',
        'info_nb_objets' => '@nb@ réservation événement suivis',
        'icone_creer_objet' => 'Créer un réservation événement suivi',
        'icone_modifier_objet' => 'Modifier ce réservation événement suivi',
        'titre_logo_objet' => 'Logo de ce réservation événement suivi',
        'titre_langue_objet' => 'Langue de ce réservation événement suivi',
        'texte_definir_comme_traduction_objet' => 'Ce réservation événement suivi est une traduction du réservation événement suivi numéro :',
        'titre_\\objets_lies_objet' => 'Liés à ce réservation événement suivi',
        'titre_objets_rubrique' => 'Réservation événement suivis de la rubrique',
        'info_objets_auteur' => 'Les réservation événement suivis de cet auteur',
        'retirer_lien_objet' => 'Retirer ce réservation événement suivi',
        'retirer_tous_liens_objets' => 'Retirer tous les réservation événement suivis',
        'ajouter_lien_objet' => 'Ajouter ce réservation événement suivi',
        'texte_ajouter_objet' => 'Ajouter un réservation événement suivi',
        'texte_creer_associer_objet' => 'Créer et associer un réservation événement suivi',
        'texte_changer_statut_objet' => 'Ce réservation événement suivi est :',
        'supprimer_objet' => 'Supprimer cet réservation événement suivi',
        'confirmer_supprimer_objet' => 'Confirmez-vous la suppression de cet réservation événement suivi ?',
      ),
      'rubriques' => 
      array (
        0 => 'id_rubrique',
        1 => 'vue_rubrique',
      ),
      'liaison_directe' => 'spip_articles',
      'table_liens' => '',
      'afficher_liens' => '',
      'roles' => '',
      'auteurs_liens' => '',
      'vue_auteurs_liens' => 'on',
      'fichiers' => 
      array (
        'echafaudages' => 
        array (
          0 => 'prive/squelettes/contenu/objets.html',
          1 => 'prive/squelettes/contenu/objet.html',
        ),
        'explicites' => 
        array (
          0 => 'action/supprimer_objet.php',
        ),
      ),
      'saisies' => 
      array (
        0 => 'objets',
      ),
      'autorisations' => 
      array (
        'objet_creer' => '',
        'objet_voir' => '',
        'objet_modifier' => '',
        'objet_supprimer' => '',
        'associerobjet' => '',
      ),
      'boutons' => 
      array (
        0 => 'menu_edition',
      ),
    ),
  ),
  'images' => 
  array (
    'paquet' => 
    array (
      'logo' => 
      array (
        0 => 
        array (
          'extension' => 'png',
          'contenu' => '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',
        ),
      ),
    ),
    'objets' => 
    array (
      0 => 
      array (
      ),
    ),
  ),
);
