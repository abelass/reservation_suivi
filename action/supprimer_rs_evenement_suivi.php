<?php
/**
 * Utilisation de l'action supprimer pour l'objet rs_evenement_suivi
 *
 * @plugin     Réservation suivi
 * @copyright  2018
 * @author     Rainer
 * @licence    GNU/GPL
 * @package    SPIP\Reservation_suivi\Action
 */

if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}



/**
 * Action pour supprimer un·e rs_evenement_suivi
 *
 * Vérifier l'autorisation avant d'appeler l'action.
 *
 * @example
 *     ```
 *     [(#AUTORISER{supprimer, rs_evenement_suivi, #ID_RS_EVENEMENT_SUIVI}|oui)
 *         [(#BOUTON_ACTION{<:rs_evenement_suivi:supprimer_rs_evenement_suivi:>,
 *             #URL_ACTION_AUTEUR{supprimer_rs_evenement_suivi, #ID_RS_EVENEMENT_SUIVI, #URL_ECRIRE{rs_evenement_suivi}},
 *             danger, <:rs_evenement_suivi:confirmer_supprimer_rs_evenement_suivi:>})]
 *     ]
 *     ```
 *
 * @example
 *     ```
 *     [(#AUTORISER{supprimer, rs_evenement_suivi, #ID_RS_EVENEMENT_SUIVI}|oui)
 *         [(#BOUTON_ACTION{
 *             [(#CHEMIN_IMAGE{rs_evenement_suivi-del-24.png}|balise_img{<:rs_evenement_suivi:supprimer_rs_evenement_suivi:>}|concat{' ',#VAL{<:rs_evenement_suivi:supprimer_rs_evenement_suivi:>}|wrap{<b>}}|trim)],
 *             #URL_ACTION_AUTEUR{supprimer_rs_evenement_suivi, #ID_RS_EVENEMENT_SUIVI, #URL_ECRIRE{rs_evenement_suivi}},
 *             icone s24 horizontale danger rs_evenement_suivi-del-24, <:rs_evenement_suivi:confirmer_supprimer_rs_evenement_suivi:>})]
 *     ]
 *     ```
 *
 * @example
 *     ```
 *     if (autoriser('supprimer', 'rs_evenement_suivi', $id_rs_evenement_suivi)) {
 *          $supprimer_rs_evenement_suivi = charger_fonction('supprimer_rs_evenement_suivi', 'action');
 *          $supprimer_rs_evenement_suivi($id_rs_evenement_suivi);
 *     }
 *     ```
 *
 * @param null|int $arg
 *     Identifiant à supprimer.
 *     En absence de id utilise l'argument de l'action sécurisée.
**/
function action_supprimer_rs_evenement_suivi_dist($arg=null) {
	if (is_null($arg)){
		$securiser_action = charger_fonction('securiser_action', 'inc');
		$arg = $securiser_action();
	}
	$arg = intval($arg);

	// cas suppression
	if ($arg) {
		sql_delete('rs_evenement_suivi',  'id_rs_evenement_suivi=' . sql_quote($arg));
	}
	else {
		spip_log("action_supprimer_rs_evenement_suivi_dist $arg pas compris");
	}
}
