<?php
/**
 * Gestion du formulaire de d'édition de rs_evenement_suivi
 *
 * @plugin     Réservation suivi
 * @copyright  2018
 * @author     Rainer
 * @licence    GNU/GPL
 * @package    SPIP\Reservation_suivi\Formulaires
 */

if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}

include_spip('inc/actions');
include_spip('inc/editer');


/**
 * Identifier le formulaire en faisant abstraction des paramètres qui ne représentent pas l'objet edité
 *
 * @param int|string $id_rs_evenement_suivi
 *     Identifiant du rs_evenement_suivi. 'new' pour un nouveau rs_evenement_suivi.
 * @param int $id_article
 *     Identifiant de l'objet parent (si connu)
 * @param string $retour
 *     URL de redirection après le traitement
 * @param int $lier_trad
 *     Identifiant éventuel d'un rs_evenement_suivi source d'une traduction
 * @param string $config_fonc
 *     Nom de la fonction ajoutant des configurations particulières au formulaire
 * @param array $row
 *     Valeurs de la ligne SQL du rs_evenement_suivi, si connu
 * @param string $hidden
 *     Contenu HTML ajouté en même temps que les champs cachés du formulaire.
 * @return string
 *     Hash du formulaire
 */
function formulaires_editer_rs_evenement_suivi_identifier_dist($id_rs_evenement_suivi = 'new', $id_article = 0, $retour = '', $lier_trad = 0, $config_fonc = '', $row = array(), $hidden = '') {
	return serialize(array(intval($id_rs_evenement_suivi)));
}

/**
 * Chargement du formulaire d'édition de rs_evenement_suivi
 *
 * Déclarer les champs postés et y intégrer les valeurs par défaut
 *
 * @uses formulaires_editer_objet_charger()
 *
 * @param int|string $id_rs_evenement_suivi
 *     Identifiant du rs_evenement_suivi. 'new' pour un nouveau rs_evenement_suivi.
 * @param int $id_article
 *     Identifiant de l'objet parent (si connu)
 * @param string $retour
 *     URL de redirection après le traitement
 * @param int $lier_trad
 *     Identifiant éventuel d'un rs_evenement_suivi source d'une traduction
 * @param string $config_fonc
 *     Nom de la fonction ajoutant des configurations particulières au formulaire
 * @param array $row
 *     Valeurs de la ligne SQL du rs_evenement_suivi, si connu
 * @param string $hidden
 *     Contenu HTML ajouté en même temps que les champs cachés du formulaire.
 * @return array
 *     Environnement du formulaire
 */
function formulaires_editer_rs_evenement_suivi_charger_dist($id_rs_evenement_suivi = 'new', $id_article = 0, $retour = '', $lier_trad = 0, $config_fonc = '', $row = array(), $hidden = '') {
	$valeurs = formulaires_editer_objet_charger('rs_evenement_suivi', $id_rs_evenement_suivi, $id_article, $lier_trad, $retour, $config_fonc, $row, $hidden);
	if (!$valeurs['id_article']) {
		$valeurs['id_article'] = $id_article;
	}
	return $valeurs;
}

/**
 * Vérifications du formulaire d'édition de rs_evenement_suivi
 *
 * Vérifier les champs postés et signaler d'éventuelles erreurs
 *
 * @uses formulaires_editer_objet_verifier()
 *
 * @param int|string $id_rs_evenement_suivi
 *     Identifiant du rs_evenement_suivi. 'new' pour un nouveau rs_evenement_suivi.
 * @param int $id_article
 *     Identifiant de l'objet parent (si connu)
 * @param string $retour
 *     URL de redirection après le traitement
 * @param int $lier_trad
 *     Identifiant éventuel d'un rs_evenement_suivi source d'une traduction
 * @param string $config_fonc
 *     Nom de la fonction ajoutant des configurations particulières au formulaire
 * @param array $row
 *     Valeurs de la ligne SQL du rs_evenement_suivi, si connu
 * @param string $hidden
 *     Contenu HTML ajouté en même temps que les champs cachés du formulaire.
 * @return array
 *     Tableau des erreurs
 */
function formulaires_editer_rs_evenement_suivi_verifier_dist($id_rs_evenement_suivi = 'new', $id_article = 0, $retour = '', $lier_trad = 0, $config_fonc = '', $row = array(), $hidden = '') {
	$erreurs = array();

	$erreurs = formulaires_editer_objet_verifier('rs_evenement_suivi', $id_rs_evenement_suivi, array('nom', 'email', 'id_article'));

	return $erreurs;
}

/**
 * Traitement du formulaire d'édition de rs_evenement_suivi
 *
 * Traiter les champs postés
 *
 * @uses formulaires_editer_objet_traiter()
 *
 * @param int|string $id_rs_evenement_suivi
 *     Identifiant du rs_evenement_suivi. 'new' pour un nouveau rs_evenement_suivi.
 * @param int $id_article
 *     Identifiant de l'objet parent (si connu)
 * @param string $retour
 *     URL de redirection après le traitement
 * @param int $lier_trad
 *     Identifiant éventuel d'un rs_evenement_suivi source d'une traduction
 * @param string $config_fonc
 *     Nom de la fonction ajoutant des configurations particulières au formulaire
 * @param array $row
 *     Valeurs de la ligne SQL du rs_evenement_suivi, si connu
 * @param string $hidden
 *     Contenu HTML ajouté en même temps que les champs cachés du formulaire.
 * @return array
 *     Retours des traitements
 */
function formulaires_editer_rs_evenement_suivi_traiter_dist($id_rs_evenement_suivi = 'new', $id_article = 0, $retour = '', $lier_trad = 0, $config_fonc = '', $row = array(), $hidden = '') {
	$retours = formulaires_editer_objet_traiter('rs_evenement_suivi', $id_rs_evenement_suivi, $id_article, $lier_trad, $retour, $config_fonc, $row, $hidden);
	return $retours;
}
