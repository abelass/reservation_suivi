<?php
/**
 * Utilisations de pipelines par Réservation suivi d&#039;événement
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


/*
 * Un fichier de pipelines permet de regrouper
 * les fonctions de branchement de votre plugin
 * sur des pipelines existants.
 */


/**
 * Ajouter les objets sur les vues des parents directs
 *
 * @pipeline affiche_enfants
 * @param  array $flux Données du pipeline
 * @return array       Données du pipeline
**/
function reservation_suivi_evenement_affiche_enfants($flux) {
	if ($e = trouver_objet_exec($flux['args']['exec']) and $e['edition'] == false) {
		$id_objet = $flux['args']['id_objet'];

		if ($e['type'] == 'rubrique') {

			$flux['data'] .= recuperer_fond(
				'prive/objets/liste/reservation_evenement_suivis',
				array(
					'titre' => _T('reservation_evenement_suivi:titre_reservation_evenement_suivis_rubrique'),
					'id_rubrique' => $id_objet
				)
			);

			if (autoriser('creerreservationevenementsuividans', 'rubrique', $id_objet)) {
				include_spip('inc/presentation');
				$flux['data'] .= icone_verticale(
					_T('reservation_evenement_suivi:icone_creer_reservation_evenement_suivi'),
					generer_url_ecrire('reservation_evenement_suivi_edit', "id_rubrique=$id_objet"),
					'reservation_evenement_suivi-24.png',
					'new',
					'right'
				) . "<br class='nettoyeur' />";
			}

		}

		if ($e['type'] == 'article') {
			$flux['data'] .= recuperer_fond(
				'prive/objets/liste/reservation_evenement_suivis',
				array(
					'titre' => _T('reservation_evenement_suivi:titre_reservation_evenement_suivis'),
					'id_article' => $id_objet
				)
			);

			if (autoriser('creerreservationevenementsuividans', 'articles', $id_objet)) {
				include_spip('inc/presentation');
				$flux['data'] .= icone_verticale(
					_T('reservation_evenement_suivi:icone_creer_reservation_evenement_suivi'),
					generer_url_ecrire('reservation_evenement_suivi_edit', "id_article=$id_objet"),
					'reservation_evenement_suivi-24.png',
					'new',
					'right'
				) . "<br class='nettoyeur' />";
			}
		}
	}
	return $flux;
}


/**
 * Ajout de liste sur la vue d'un auteur
 *
 * @pipeline affiche_auteurs_interventions
 * @param  array $flux Données du pipeline
 * @return array       Données du pipeline
 */
function reservation_suivi_evenement_affiche_auteurs_interventions($flux) {
	if ($id_auteur = intval($flux['args']['id_auteur'])) {
		$flux['data'] .= recuperer_fond('prive/objets/liste/reservation_evenement_suivis', array(
			'id_auteur' => $id_auteur,
			'titre' => _T('reservation_evenement_suivi:info_reservation_evenement_suivis_auteur')
		), array('ajax' => true));
	}
	return $flux;
}

/**
 * Afficher le nombre d'éléments dans les parents
 *
 * @pipeline boite_infos
 * @param  array $flux Données du pipeline
 * @return array       Données du pipeline
**/
function reservation_suivi_evenement_boite_infos($flux) {
	if (isset($flux['args']['type']) and isset($flux['args']['id']) and $id = intval($flux['args']['id'])) {
		$texte = '';
		if ($flux['args']['type'] == 'article' and $nb = sql_countsel('reservation_evenement_suivis', array("statut='publie'", 'id_article=' . $id))) {
			$texte .= '<div>' . singulier_ou_pluriel($nb, 'reservation_evenement_suivi:info_1_reservation_evenement_suivi', 'reservation_evenement_suivi:info_nb_reservation_evenement_suivis') . "</div>\n";
		}
		if ($texte and $p = strpos($flux['data'], '<!--nb_elements-->')) {
			$flux['data'] = substr_replace($flux['data'], $texte, $p, 0);
		}
	}
	return $flux;
}


/**
 * Compter les enfants d'un objet
 *
 * @pipeline objets_compte_enfants
 * @param  array $flux Données du pipeline
 * @return array       Données du pipeline
**/
function reservation_suivi_evenement_objet_compte_enfants($flux) {
	if ($flux['args']['objet'] == 'article' and $id_article = intval($flux['args']['id_objet'])) {
		// juste les publiés ?
		if (array_key_exists('statut', $flux['args']) and ($flux['args']['statut'] == 'publie')) {
			$flux['data']['reservation_evenement_suivis'] = sql_countsel('reservation_evenement_suivis', 'id_article= ' . intval($id_article) . " AND (statut = 'publie')");
		} else {
			$flux['data']['reservation_evenement_suivis'] = sql_countsel('reservation_evenement_suivis', 'id_article= ' . intval($id_article) . " AND (statut <> 'poubelle')");
		}
	}

	return $flux;
}


/**
 * Optimiser la base de données
 *
 * Supprime les objets à la poubelle.
 *
 * @pipeline optimiser_base_disparus
 * @param  array $flux Données du pipeline
 * @return array       Données du pipeline
 */
function reservation_suivi_evenement_optimiser_base_disparus($flux) {

	sql_delete('reservation_evenement_suivis', "statut='poubelle' AND maj < " . $flux['args']['date']);

	return $flux;
}
