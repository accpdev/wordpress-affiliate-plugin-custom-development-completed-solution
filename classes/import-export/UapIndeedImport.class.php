<?php
if (class_exists('IndeedImport') && !class_exists('UapIndeedImport')):

class UapIndeedImport extends IndeedImport{

	/*
	 * @param string ($entity_name)
	 * @param string ($entity_opt)
	 * @param object ($xml_object)
	 * @return none
	 */
	protected function do_import_custom_table($entity_name, $entity_opt, &$xml_object){
		global $wpdb;
		$table = $wpdb->prefix . $entity_name;

		if (!$xml_object->$entity_name->Count()){
			return;
		}

		switch ($entity_name){
			case 'uap_affiliates':
				foreach ($xml_object->$entity_name->children() as $meta_key=>$object){
					$array = (array)$object;
					if ( count( $array ) === 0 || !isset( $array['id'] ) || !isset( $array['uid'] ) || !isset( $array['rank_id'] ) || !isset( $array['start_data'] ) || !isset( $array['status'] ) ){
						continue;
					}
					$insert_string = $wpdb->prepare("VALUES( %s, %s, %s, %s, %s )",
				 $this->esc_sql( $array['id'] ),
				 $this->esc_sql( $array['uid'] ),
				 $this->esc_sql( $array['rank_id'] ),
				 $this->esc_sql( $array['start_data'] ),
				 $this->esc_sql( $array['status'] )
					);
					$this->do_basic_insert($table, $insert_string);
				}
				break;
			case 'uap_banners':
				foreach ($xml_object->$entity_name->children() as $meta_key=>$object){
					$array = (array)$object;
					if ( count( $array ) === 0 || !isset( $array['name'] ) || !isset( $array['description'] ) || !isset( $array['url'] ) || !isset( $array['image'] ) || !isset( $array['status'] ) || !isset( $array['DATE'] ) ){
						continue;
					}
					$insert_string = "VALUES(null,
											'" . $this->esc_sql( $array['name'] ) . "',
											'" . $this->esc_sql( $array['description'] ) . "',
											'" . $this->esc_sql( $array['url'] ). "',
											'" . $this->esc_sql( $array['image'] ) . "',
											'" . $this->esc_sql( $array['status'] ) . "',
											'" . $this->esc_sql( $array['DATE'] ) . "'
					)";
					$this->do_basic_insert($table, $insert_string);
				}
				break;
			case 'uap_notifications':
				foreach ($xml_object->$entity_name->children() as $meta_key=>$object){
					$array = (array)$object;
					if ( count( $array ) === 0 || !isset( $array['type'] ) || !isset( $array['rank_id'] ) || !isset( $array['subject'] )
					|| !isset( $array['message'] ) || !isset( $array['pushover_message'] ) || !isset( $array['pushover_status'] ) || !isset( $array['status'] ) ){
						continue;
					}
					$insert_string = "VALUES(null,
											'" . $this->esc_sql( $array['type'] ) . "',
											'" . $this->esc_sql( $array['rank_id'] ) . "',
											'" . $this->esc_sql( $array['subject'] ) . "',
											'" . $this->esc_sql( $array['message'] ) . "',
											'" . $this->esc_sql( $array['pushover_message'] ) . "',
											'" . $this->esc_sql( $array['pushover_status'] ) . "',
											'" . $this->esc_sql( $array['status'] ) . "'
					)";
					$this->do_basic_insert($table, $insert_string);
				}
				break;
			case 'uap_ranks':
				foreach ($xml_object->$entity_name->children() as $meta_key=>$object){
					$array = (array)$object;
					if ( count( $array ) === 0 || !isset( $array['slug'] ) || !isset( $array['label'] ) || !isset( $array['amount_type'] )
					|| !isset( $array['amount_value'] ) || !isset( $array['bonus'] ) || !isset( $array['pay_per_click'] ) || !isset( $array['cpm_commission'] ) || !isset( $array['sign_up_amount_value'] ) || !isset( $array['lifetime_amount_type'] ) || !isset( $array['lifetime_amount_value'] ) || !isset( $array['reccuring_amount_type'] ) || !isset( $array['mlm_amount_type'] ) || !isset( $array['mlm_amount_value'] ) || !isset( $array['achieve'] ) || !isset( $array['settings'] ) || !isset( $array['rank_order'] )  || !isset( $array['status'] ) ){
						break;
					}
					$insert_string = "VALUES(null,
											'" . $this->esc_sql( $array['slug'] ) . "',
											'" . $this->esc_sql( $array['label'] ) . "',
											'" . $this->esc_sql( $array['amount_type'] ) . "',
											'" . $this->esc_sql( $array['amount_value'] ) . "',
											'" . $this->esc_sql( $array['bonus'] ) . "',
											'" . $this->esc_sql( $array['pay_per_click'] ) . "',
											'" . $this->esc_sql( $array['cpm_commission'] ) . "',
											'" . $this->esc_sql( $array['sign_up_amount_value'] ) . "',
											'" . $this->esc_sql( $array['lifetime_amount_type'] ) . "',
											'" . $this->esc_sql( $array['lifetime_amount_value'] ) . "',
											'" . $this->esc_sql( $array['reccuring_amount_type'] ) . "',
											'" . $this->esc_sql( $array['reccuring_amount_value'] ) . "',
											'" . $this->esc_sql( $array['mlm_amount_type'] ) . "',
											'" . $this->esc_sql( $array['mlm_amount_value'] ) . "',
											'" . $this->esc_sql( $array['achieve'] ) . "',
											'" . $this->esc_sql( $array['settings'] ) . "',
											'" . $this->esc_sql( $array['rank_order'] ) . "',
											'" . $this->esc_sql( $array['status'] ) . "'
					)";
					$this->do_basic_insert($table, $insert_string);
				}
				break;
			case 'uap_offers':
				foreach ($xml_object->$entity_name->children() as $meta_key=>$object){
					$array = (array)$object;
					if ( count( $array ) === 0 || !isset( $array['name'] )  || !isset( $array['start_date'] ) || !isset( $array['end_date'] ) 
					|| !isset( $array['amount_type'] ) || !isset( $array['amount_value'] ) || !isset( $array['settings'] ) || !isset( $array['status'] ) ){
						continue;
					}
					$insert_string = "VALUES(null,
											'" . $this->esc_sql( $array['name'] ) . "',
											'" . $this->esc_sql( $array['start_date'] ) . "',
											'" . $this->esc_sql( $array['end_date'] ) . "',
											'" . $this->esc_sql( $array['amount_type'] ) . "',
											'" . $this->esc_sql( $array['amount_value'] ) . "',
											'" . $this->esc_sql( $array['settings'] ) . "',
											'" . $this->esc_sql( $array['status'] ) . "'
					)";
					$this->do_basic_insert($table, $insert_string);
				}
				break;
			case 'uap_offers_affiliates_reference':
				foreach ($xml_object->$entity_name->children() as $meta_key=>$object){
					$array = (array)$object;
					if ( count( $array ) === 0  || !isset( $array['offer_id'] ) || !isset( $array['affiliate_id'] )
					|| !isset( $array['source'] ) || !isset( $array['products'] ) ){
						continue;
					}
					$insert_string = "VALUES(null,
											'" . $this->esc_sql( $array['offer_id'] ) . "',
											'" . $this->esc_sql( $array['affiliate_id'] ) . "',
											'" . $this->esc_sql( $array['source'] ) . "',
											'" . $this->esc_sql( $array['products'] ) . "'
					)";
					$this->do_basic_insert($table, $insert_string);
				}
				break;
			case 'uap_mlm_relations':
				foreach ($xml_object->$entity_name->children() as $meta_key=>$object){
					$array = (array)$object;
					if ( count( $array ) === 0 || !isset( $array['affiliate_id'] ) || !isset( $array['parent_affiliate_id'] ) ){
						continue;
					}
					$insert_string = "VALUES(null,
											'" . $this->esc_sql( $array['affiliate_id'] ) . "',
											'" . $this->esc_sql( $array['parent_affiliate_id'] ) . "'
					)";
					$this->do_basic_insert($table, $insert_string);
				}
				break;
			case 'uap_ranks_history':
				foreach ($xml_object->$entity_name->children() as $meta_key=>$object){
					$array = (array)$object;
					if ( count( $array ) === 0  || !isset( $array['affiliate_id'] ) || !isset( $array['prev_rank_id'] )
					|| !isset( $array['rank_id'] ) || !isset( $array['add_date'] ) ){
						continue;
					}
					$insert_string = "VALUES(null,
											'" . $this->esc_sql( $array['affiliate_id'] ) . "',
											'" . $this->esc_sql( $array['prev_rank_id'] ) . "',
											'" . $this->esc_sql( $array['rank_id'] ) . "',
											'" . $this->esc_sql( $array['add_date'] ) . "'
					)";
					$this->do_basic_insert($table, $insert_string);
				}
				break;
			case 'uap_landing_commissions':
				foreach ($xml_object->$entity_name->children() as $meta_key=>$object){
					$array = (array)$object;
					if ( count( $array ) === 0 || !isset( $array['affiliate_id'] ) || !isset( $array['prev_rank_id'] ) || !isset( $array['rank_id'] ) || !isset( $array['add_date'] ) ){
						continue;
					}
					$insert_string = "VALUES(null,
											'" . $this->esc_sql( $array['affiliate_id'] ) . "',
											'" . $this->esc_sql( $array['prev_rank_id'] ) . "',
											'" . $this->esc_sql( $array['rank_id'] ) . "',
											'" . $this->esc_sql( $array['add_date'] ) . "'
					)";
					$this->do_basic_insert($table, $insert_string);
				}
				break;
			case 'uap_coupons_code_affiliates':
				foreach ($xml_object->$entity_name->children() as $meta_key=>$object){
					$array = (array)$object;
					if ( count( $array ) === 0 || !isset( $array['code'] ) || !isset( $array['affiliate_id'] ) || !isset( $array['type'] ) || !isset( $array['settings'] ) || !isset( $array['status'] ) ){
						continue;
					}
					$insert_string = "VALUES(null,
											'" . $this->esc_sql( $array['code'] ) . "',
											'" . $this->esc_sql( $array['affiliate_id'] ) . "',
											'" . $this->esc_sql( $array['type'] ) . "',
											'" . $this->esc_sql( $array['settings'] ) . "',
											'" . $this->esc_sql( $array['status'] ) . "'
					)";
					$this->do_basic_insert($table, $insert_string);
				}
				break;
			case 'uap_reports':
				foreach ($xml_object->$entity_name->children() as $meta_key=>$object){
					$array = (array)$object;
					if ( count( $array ) === 0 || !isset( $array['affiliate_id'] ) || !isset( $array['email'] ) || !isset( $array['period'] )  || !isset( $array['last_sent'] ) ){
						continue;
					}
					$insert_string = "VALUES( '" . $this->esc_sql($array['affiliate_id'] ) . "',
											'" . $this->esc_sql( $array['email'] ) . "',
											'" . $this->esc_sql( $array['period'] ) . "',
											'" . $this->esc_sql( $array['last_sent'] ) . "'
					)";
					$this->do_basic_insert($table, $insert_string);
				}
				break;
			case 'uap_ref_links':
				foreach ($xml_object->$entity_name->children() as $meta_key=>$object){
					$array = (array)$object;
					if ( count( $array ) === 0 || !isset( $array['affiliate_id'] ) || !isset( $array['url'] ) || !isset( $array['status'] ) ){
						continue;
					}
					$insert_string = "VALUES(null,
											'" . $this->esc_sql( $array['affiliate_id'] ) . "',
											'" . $this->esc_sql( $array['url'] ) . "',
											'" . $this->esc_sql( $array['status'] ) . "'
					)";
					$this->do_basic_insert($table, $insert_string);
				}
				break;
		}
	}


	/*
	 * @param string (table name)
	 * @param string (insert values)
	 * @return none
	 */
	private function do_basic_insert($table='', $insert_values=''){
		global $wpdb;
		$query = "INSERT IGNORE INTO $table $insert_values;";
		$wpdb->query( $query );
	}

	public function esc_sql( $value='' )
	{
			return sanitize_text_field( addslashes($value) );
	}

}

endif;
