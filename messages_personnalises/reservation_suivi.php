<?php
/**
 * Définitions pour la personnalisation du message pour le plugin
 * Message personnalisé https://github.com/abelass/message_personnalise.
 *
 * @plugin     Réservation suivi
 * @copyright  2018
 * @author     Rainer
 * @licence    GNU/GPL
 * @package    SPIP\Reservation_suivi\Mp_messages
 */

/**
 *
 * @param array $contexte
 *        	Variables du contexte.
 * @return array Définition.
 */
function messages_personnalises_reservation_suivi_dist($contexte) {
	return array(
		'nom' => _T('reservation_suivi:reservation_suivi_titre'),
		'declencheurs' => array(
			'qui' => array(
				'client' => _T('reservation:notifications_client_label'),
				'vendeur' => _T('reservation:notifications_vendeur_label')
			)
		),
	);
}
