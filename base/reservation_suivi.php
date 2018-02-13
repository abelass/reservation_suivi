<?php
/**
 * Déclarations relatives à la base de données
 *
 * @plugin     Réservation suivi
 * @copyright  2018
 * @author     Rainer
 * @licence    GNU/GPL
 * @package    SPIP\Reservation_suivi\Pipelines
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
function reservation_suivi_declarer_tables_interfaces($interfaces) {

	$interfaces['table_des_tables']['rs_evenement_suivi'] = 'rs_evenement_suivi';

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
function reservation_suivi_declarer_tables_objets_sql($tables) {

	$tables['rs_evenement_suivi'] = array(
		'type' => 'rs_evenement_suivi',
		'principale' => 'oui',
		'table_objet_surnoms' => array('rsevenementsuivi', 'rs_evenement_suivi'), // table_objet('rs_evenement_suivi') => 'rs_evenement_suivi' 
		'field'=> array(
			'id_rs_evenement_suivi' => 'bigint(21) NOT NULL',
			'id_article'         => 'bigint(21) NOT NULL DEFAULT 0',
			'nom'                => 'varchar(255) NOT NULL DEFAULT ""',
			'email'              => 'varchar(255) NOT NULL DEFAULT ""',
			'commentaire'        => 'text NOT NULL DEFAULT ""',
			'id_evenement'       => 'bigint(21) NOT NULL DEFAULT 0',
			'id_auteur'          => 'bigint(21) NOT NULL DEFAULT 0',
			'date'               => 'datetime NOT NULL DEFAULT "0000-00-00 00:00:00"',
			'lang'               => 'VARCHAR(10) NOT NULL DEFAULT ""',
			'langue_choisie'     => 'VARCHAR(3) DEFAULT "non"',
			'maj'                => 'TIMESTAMP'
		),
		'key' => array(
			'PRIMARY KEY'        => 'id_rs_evenement_suivi',
			'KEY id_article'     => 'id_article',
			'KEY lang'           => 'lang',
		),
		'titre' => 'nom AS titre, lang AS lang',
		'date' => 'date',
		'champs_editables'  => array('nom', 'email', 'commentaire', 'id_rubrique', 'id_article'),
		'champs_versionnes' => array('nom', 'email', 'commentaire', 'id_evenement', 'id_auteur', 'id_rubrique', 'id_article'),
		'rechercher_champs' => array("nom" => 10, "email" => 8),
		'tables_jointures'  => array(),


	);

	return $tables;
}
