<?php
/**
 * Utilisations de pipelines par Réservation suivi
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
function reservation_suivi_affiche_enfants($flux) {
	if ($e = trouver_objet_exec($flux['args']['exec']) and $e['edition'] == false) {
		$id_objet = $flux['args']['id_objet'];

		if ($e['type'] == 'rubrique') {

			$flux['data'] .= recuperer_fond(
				'prive/objets/liste/rs_evenement_suivi',
				array(
					'titre' => _T('rs_evenement_suivi:titre_rs_evenement_suivi_rubrique'),
					'id_rubrique' => $id_objet
				)
			);

			if (autoriser('creerrsevenementsuividans', 'rubrique', $id_objet)) {
				include_spip('inc/presentation');
				$flux['data'] .= icone_verticale(
					_T('rs_evenement_suivi:icone_creer_rs_evenement_suivi'),
					generer_url_ecrire('rs_evenement_suivi_edit', "id_rubrique=$id_objet"),
					'rs_evenement_suivi-24.png',
					'new',
					'right'
				) . "<br class='nettoyeur' />";
			}

		}

		if ($e['type'] == 'article') {
			$flux['data'] .= recuperer_fond(
				'prive/objets/liste/rs_evenement_suivi',
				array(
					'titre' => _T('rs_evenement_suivi:titre_rs_evenement_suivi'),
					'id_article' => $id_objet
				)
			);

			if (autoriser('creerrsevenementsuividans', 'articles', $id_objet)) {
				include_spip('inc/presentation');
				$flux['data'] .= icone_verticale(
					_T('rs_evenement_suivi:icone_creer_rs_evenement_suivi'),
					generer_url_ecrire('rs_evenement_suivi_edit', "id_article=$id_objet"),
					'rs_evenement_suivi-24.png',
					'new',
					'right'
				) . "<br class='nettoyeur' />";
			}
		}
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
function reservation_suivi_boite_infos($flux) {
	if (isset($flux['args']['type']) and isset($flux['args']['id']) and $id = intval($flux['args']['id'])) {
		$texte = '';
		if ($flux['args']['type'] == 'article' and $nb = sql_countsel('rs_evenement_suivi', array('id_article=' . $id))) {
			$texte .= '<div>' . singulier_ou_pluriel($nb, 'rs_evenement_suivi:info_1_rs_evenement_suivi', 'rs_evenement_suivi:info_nb_rs_evenement_suivi') . "</div>\n";
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
function reservation_suivi_objet_compte_enfants($flux) {
	if ($flux['args']['objet'] == 'article' and $id_article = intval($flux['args']['id_objet'])) {
		$flux['data']['rs_evenement_suivi'] = sql_countsel('rs_evenement_suivi', 'id_article= ' . intval($id_article));
	}

	return $flux;
}
