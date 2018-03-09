<?php
/**
 * Déclarations relatives à la base de données
 *
 * @plugin     Réservation suivi d&#039;événement
 * @copyright  2018
 * @author     Rainer Müller
 * @licence    GNU/GPL
 * @package    SPIP\Reservation_suivi_evenement\Pipelines
 */

if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}


/**
 * Déclaration des alias de tables et filtres automatiques de champs
 *
 * @pipeline declarer_tables_interfaces
 * @param array $interfaces
 *     Déclarations d'interface pour le compilateur
 * @return array
 *     Déclarations d'interface pour le compilateur
 */
function reservation_suivi_evenement_declarer_tables_interfaces($interfaces) {

	$interfaces['table_des_tables']['reservation_evenement_suivis'] = 'reservation_evenement_suivis';

	return $interfaces;
}


/**
 * Déclaration des objets éditoriaux
 *
 * @pipeline declarer_tables_objets_sql
 * @param array $tables
 *     Description des tables
 * @return array
 *     Description complétée des tables
 */
function reservation_suivi_evenement_declarer_tables_objets_sql($tables) {

	$tables['reservation_evenement_suivis'] = array(
		'type' => 'reservation_evenement_suivi',
		'principale' => 'oui',
		'table_objet_surnoms' => array('reservationevenementsuivi'), // table_objet('reservation_evenement_suivi') => 'reservation_evenement_suivis' 
		'field'=> array(
			'id_reservation_evenement_suivi' => 'bigint(21) NOT NULL',
			'id_article'         => 'bigint(21) NOT NULL DEFAULT 0',
			'nom'                => 'varchar(255) NOT NULL DEFAULT ""',
			'email'              => 'varchar(255) NOT NULL DEFAULT ""',
			'commentaire'        => 'text NOT NULL DEFAULT ""',
			'id_evenement'       => 'bigint(21) NOT NULL DEFAULT 0',
			'id_auteur'          => 'bigint(21) NOT NULL DEFAULT 0',
			'date'               => 'datetime NOT NULL DEFAULT "0000-00-00 00:00:00"',
			'statut'             => 'varchar(20)  DEFAULT "0" NOT NULL',
			'maj'                => 'TIMESTAMP'
		),
		'key' => array(
			'PRIMARY KEY'        => 'id_reservation_evenement_suivi',
			'KEY id_article'     => 'id_article',
			'KEY statut'         => 'statut',
		),
		'titre' => 'nom AS titre, "" AS lang',
		'date' => 'date',
		'champs_editables'  => array('nom', 'email', 'commentaire', 'id_rubrique', 'id_article'),
		'champs_versionnes' => array('nom', 'email', 'commentaire', 'id_evenement', 'id_auteur', 'id_rubrique', 'id_article'),
		'rechercher_champs' => array("nom" => 10, "email" => 8),
		'tables_jointures'  => array(),
		'statut_textes_instituer' => array(
			'prepa'    => 'texte_statut_en_cours_redaction',
			'prop'     => 'texte_statut_propose_evaluation',
			'publie'   => 'texte_statut_publie',
			'refuse'   => 'texte_statut_refuse',
			'poubelle' => 'texte_statut_poubelle',
		),
		'statut'=> array(
			array(
				'champ'     => 'statut',
				'publie'    => 'publie',
				'previsu'   => 'publie,prop,prepa',
				'post_date' => 'date',
				'exception' => array('statut','tout')
			)
		),
		'texte_changer_statut' => 'reservation_evenement_suivi:texte_changer_statut_reservation_evenement_suivi',


	);

	return $tables;
}
