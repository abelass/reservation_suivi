<?php
/**
 * Utilisation de l'action supprimer pour l'objet reservation_evenement_suivi
 *
 * @plugin     Réservation suivi d&#039;événement
 * @copyright  2018
 * @author     Rainer Müller
 * @licence    GNU/GPL
 * @package    SPIP\Reservation_suivi_evenement\Action
 */

if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}



/**
 * Action pour supprimer un·e reservation_evenement_suivi
 *
 * Vérifier l'autorisation avant d'appeler l'action.
 *
 * @example
 *     ```
 *     [(#AUTORISER{supprimer, reservation_evenement_suivi, #ID_RESERVATION_EVENEMENT_SUIVI}|oui)
 *         [(#BOUTON_ACTION{<:reservation_evenement_suivi:supprimer_reservation_evenement_suivi:>,
 *             #URL_ACTION_AUTEUR{supprimer_reservation_evenement_suivi, #ID_RESERVATION_EVENEMENT_SUIVI, #URL_ECRIRE{reservation_evenement_suivis}},
 *             danger, <:reservation_evenement_suivi:confirmer_supprimer_reservation_evenement_suivi:>})]
 *     ]
 *     ```
 *
 * @example
 *     ```
 *     [(#AUTORISER{supprimer, reservation_evenement_suivi, #ID_RESERVATION_EVENEMENT_SUIVI}|oui)
 *         [(#BOUTON_ACTION{
 *             [(#CHEMIN_IMAGE{reservation_evenement_suivi-del-24.png}|balise_img{<:reservation_evenement_suivi:supprimer_reservation_evenement_suivi:>}|concat{' ',#VAL{<:reservation_evenement_suivi:supprimer_reservation_evenement_suivi:>}|wrap{<b>}}|trim)],
 *             #URL_ACTION_AUTEUR{supprimer_reservation_evenement_suivi, #ID_RESERVATION_EVENEMENT_SUIVI, #URL_ECRIRE{reservation_evenement_suivis}},
 *             icone s24 horizontale danger reservation_evenement_suivi-del-24, <:reservation_evenement_suivi:confirmer_supprimer_reservation_evenement_suivi:>})]
 *     ]
 *     ```
 *
 * @example
 *     ```
 *     if (autoriser('supprimer', 'reservation_evenement_suivi', $id_reservation_evenement_suivi)) {
 *          $supprimer_reservation_evenement_suivi = charger_fonction('supprimer_reservation_evenement_suivi', 'action');
 *          $supprimer_reservation_evenement_suivi($id_reservation_evenement_suivi);
 *     }
 *     ```
 *
 * @param null|int $arg
 *     Identifiant à supprimer.
 *     En absence de id utilise l'argument de l'action sécurisée.
**/
function action_supprimer_reservation_evenement_suivi_dist($arg=null) {
	if (is_null($arg)){
		$securiser_action = charger_fonction('securiser_action', 'inc');
		$arg = $securiser_action();
	}
	$arg = intval($arg);

	// cas suppression
	if ($arg) {
		sql_delete('reservation_evenement_suivis',  'id_reservation_evenement_suivi=' . sql_quote($arg));
	}
	else {
		spip_log("action_supprimer_reservation_evenement_suivi_dist $arg pas compris");
	}
}
