
<div class="uap-wrapper uap-payment-form-settings-wrapper">
	<div class="uap-page-title">Ultimate Affiliate Pro - <span class="second-text"><?php esc_html_e('Payment Form', 'uap');?></span></div>
	<form method="post" action="<?php echo $data['submit_link'];?>">

		<input type="hidden" name="uap_admin_payment_nonce" value="<?php echo wp_create_nonce( 'uap_admin_payment_nonce' );?>" />

		<div class="row">
				<?php
					$checked_paypal = '';
					$checked_bt = '';
					$checked_stripe = '';
					$checked_stripe_v2 = '';
					$checked_stripe_v3 = '';

					if (!empty($data['affiliate_pay']) && !empty($data['affiliate_pay']['payment_gateway_data']) && !empty($data['affiliate_pay']['payment_gateway_data']['type'])){
						switch ($data['affiliate_pay']['payment_gateway_data']['type']){
							case 'paypal':
								$checked_paypal = 'checked';
								break;
							case 'stripe':
								$checked_stripe = 'checked';
								break;
							case 'stripe_v2':
								$checked_stripe_v2 = 'checked';
								break;
							case 'stripe_v3':
								$checked_stripe_v3 = 'checked';
								break;
							case 'bank_transfer':
							default:
								$checked_bt = 'checked';
								break;
						}
					} else {
						$checked_bt = 'checked';
					}
				?>
				<div class="col-xs-4">
					<div class="payment-box">
						<h3><?php esc_html_e('Pay With', 'uap');?></h3>
						<p><?php esc_html_e('Choose one of the Payment Gateway Option. "Bank Transfer" is an offline alternative payment.', 'uap');?></p>
						<?php if (!empty($data['paypal'])):?>
						<div class="uap-list-affiliates-name-label">
							<input type="radio" value="paypal" name="paywith" onClick="uapPaymentFormPaymentStatus(this.value);" <?php echo $checked_paypal;?> /> <?php esc_html_e('PayPal', 'uap');?>
						</div>
						<?php endif;?>
						<div  class="uap-list-affiliates-name-label">
							<input type="radio" value="bank_transfer" name="paywith" onClick="uapPaymentFormPaymentStatus(this.value);" <?php echo $checked_bt;?> /> <?php esc_html_e('Bank Transfer', 'uap');?>
						</div>
						<?php if (!empty($data['stripe'])):?>
						<div class="uap-list-affiliates-name-label">
							<input type="radio" value="stripe" name="paywith" onClick="uapPaymentFormPaymentStatus(this.value);" <?php echo $checked_stripe;?> /> <?php esc_html_e('Stripe', 'uap');?>
						</div>
						<?php endif;?>
						<?php if (!empty($data['stripe_v2'])):?>
						<div class="uap-list-affiliates-name-label" >
							<input type="radio" value="stripe_v2" name="paywith" onClick="uapPaymentFormPaymentStatus(this.value);" <?php echo $checked_stripe_v2;?> /> <?php esc_html_e('Stripe V2', 'uap');?>
						</div>
						<?php endif;?>
						<?php if (!empty($data['stripe_v3'])):?>
						<div class="uap-list-affiliates-name-label">
							<input type="radio" value="stripe_v3" name="paywith" onClick="uapPaymentFormPaymentStatus(this.value);" <?php echo $checked_stripe_v3;?> /> <?php esc_html_e('Stripe V3', 'uap');?>
						</div>
						<?php endif;?>
					</div>
				</div>

				<div class="col-xs-4">
					<?php $display = ($checked_bt) ? 'uap-display-block' : 'uap-display-none';?>
					<div class="payment-box <?php echo $display;?>" id="payment_status_div">
						<h3><?php esc_html_e('Payment Status', 'uap');?></h3>
						<p><?php esc_html_e('As "Bank Transfer" payment option you can set for now the a temporary Payment status.', 'uap');?></p>
						<div  class="uap-list-affiliates-name-label">
							<input type="radio" value="1" name="payment_status" /> <?php esc_html_e('Pending', 'uap');?>
						</div>
						<div class="uap-list-affiliates-name-label">
							<input type="radio" value="2" name="payment_status" checked/> <?php esc_html_e('Complete', 'uap');?>
						</div>
					</div>
				</div>
			</div>
			<div class="uap-buttons-wrapper">
				<input type="submit" value="<?php esc_html_e('Submit', 'uap');?>" name="do_payment" class="button button-primary button-large" />
				<button class="button button-primary button-large uap-js-location-reload" data-url="<?php echo $data['return_url'];?>" ><?php esc_html_e('Cancel', 'uap');?></button>
			</div>
		<?php if (!empty($data['affiliate_pay'])) : ?>
		<table class="wp-list-table widefat fixed tags">
						<thead>
							<tr>
								<th><?php esc_html_e('Username', 'uap');?></th>
								<th><?php esc_html_e('Name', 'uap');?></th>
								<th><?php esc_html_e('Payment Type', 'uap');?></th>
								<th><?php esc_html_e('Payment Details', 'uap');?></th>
								<th><?php esc_html_e('Rank', 'uap');?></th>
								<th><?php esc_html_e('E-mail', 'uap');?></th>
								<th><?php esc_html_e('Amount', 'uap');?></th>
							</tr>
						</thead>
				<tbody class="ui-sortable uap-alternate">
				<tr>
					<td><?php echo $data['affiliate_pay']['username'];?></td>
					<td><?php echo $data['affiliate_pay']['name'];?></td>
					<td><?php
						if (!empty($data['affiliate_pay']['payment_gateway_data']) && !empty($data['affiliate_pay']['payment_gateway_data']['type'])){
							$temp_key = $data['affiliate_pay']['payment_gateway_data']['type'];
							switch ($temp_key):
								case 'paypal':
									$payment_class = ($data['affiliate_pay']['payment_gateway_data']['is_active']) ? 'uap-payment-type-active-paypal' : '';
									?>
									<span class="uap-admin-aff-payment-type <?php echo $payment_class;?>">PayPal</span>
									<?php
									break;
								case 'bt':
									$payment_class = ($data['affiliate_pay']['payment_gateway_data']['is_active']) ? 'uap-payment-type-active-bt' : '';
									?>
									<span class="uap-admin-aff-payment-type <?php echo $payment_class;?>"><?php esc_html_e('Bank Transfer', 'uap');?></span>
									<?php
									break;
								case 'stripe':
									$payment_class = '';
									if ($data['affiliate_pay']['payment_gateway_data']['is_active'] && !empty($data['affiliate_pay']['payment_gateway_data']['settings']) && !empty($data['affiliate_pay']['payment_gateway_data']['settings']['uap_affiliate_stripe_name'])
										&& !empty($data['affiliate_pay']['payment_gateway_data']['settings']['uap_affiliate_stripe_card_number']) && !empty($data['affiliate_pay']['payment_gateway_data']['settings']['uap_affiliate_stripe_expiration_month'])
										&& !empty($data['affiliate_pay']['payment_gateway_data']['settings']['uap_affiliate_stripe_expiration_year']) ) //&& !empty($data['affiliate_pay']['payment_gateway_data']['settings']['uap_affiliate_stripe_cvc'])
									{
										$payment_class = 'uap-payment-type-active-stripe';
									}
									?>
									<span class="uap-admin-aff-payment-type <?php echo $payment_class;?>">Stripe</span>
									<?php
									break;
								case 'stripe_v2':
									$payment_class = '';
									if ($data['affiliate_pay']['payment_gateway_data']['is_active']){
										$payment_class = 'uap-payment-type-active-stripe_v2';
									}
									?>
									<span class="uap-admin-aff-payment-type <?php echo $payment_class;?>">Stripe V2</span>
									<?php
									break;
								case 'stripe_v3':
										$payment_class = '';
										if ($data['affiliate_pay']['payment_gateway_data']['is_active']){
											$payment_class = 'uap-payment-type-active-stripe_v3';
										}
										?>
										<span class="uap-admin-aff-payment-type <?php echo $payment_class;?>">Stripe V3</span>
										<?php
										break;
							endswitch;
						} else {
							echo '-';
						}
					?></td>
					<td><?php
						echo uap_return_payment_details_for_admin_table($data['affiliate_pay']['payment_gateway_data']);
					?></td>
					<td><?php echo $data['affiliate_pay']['rank'];?></td>
					<td><?php echo $data['affiliate_pay']['email'];?>
					<input type="hidden" value="<?php echo $data['affiliate_pay']['email'];?>" name="email" /></td>
					<td><strong><?php echo $data['affiliate_pay']['amount'] . $data['currency'];?></strong>

				<input type="hidden" value="<?php echo $data['affiliate_pay']['amount'];?>" name="amount" />
			<input type="hidden" value="<?php echo $data['currency'];?>" name="currency" />
			<input type="hidden" value="<?php echo $data['affiliate_pay']['referrals_in'];?>" name="referrals_in" />
			<input type="hidden" value="<?php echo $data['affiliate_pay']['affiliate_id'];?>" name="affiliate_id" />
					</td>
				</tr>

				</tbody>
				<tfoot>
					<tr>
						<th><?php esc_html_e('Username', 'uap');?></th>
						<th><?php esc_html_e('Name', 'uap');?></th>
						<th><?php esc_html_e('Payment Type', 'uap');?></th>
						<th><?php esc_html_e('Payment Details', 'uap');?></th>
						<th><?php esc_html_e('Rank', 'uap');?></th>
						<th><?php esc_html_e('E-mail', 'uap');?></th>
						<th><?php esc_html_e('Amount', 'uap');?></th>
					</tr>
				</tfoot>
				</table>


		<?php elseif (!empty($data['multiple_affiliates'])) :?>
			<table class="wp-list-table widefat fixed tags">
						<thead>
							<tr>
								<th><?php esc_html_e('Username', 'uap');?></th>
								<th><?php esc_html_e('Name', 'uap');?></th>
								<th><?php esc_html_e('Payment Type', 'uap');?></th>
								<th><?php esc_html_e('Payment Details', 'uap');?></th>
								<th><?php esc_html_e('Rank', 'uap');?></th>
								<th><?php esc_html_e('E-mail', 'uap');?></th>
								<th><?php esc_html_e('Amount', 'uap');?></th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th><?php esc_html_e('Username', 'uap');?></th>
								<th><?php esc_html_e('Name', 'uap');?></th>
								<th><?php esc_html_e('Payment Type', 'uap');?></th>
								<th><?php esc_html_e('Payment Details', 'uap');?></th>
								<th><?php esc_html_e('Rank', 'uap');?></th>
								<th><?php esc_html_e('E-mail', 'uap');?></th>
								<th><?php esc_html_e('Amount', 'uap');?></th>
							</tr>
						</tfoot>
				<tbody class="ui-sortable uap-alternate">
			<?php foreach ($data['multiple_affiliates'] as $id => $array): ?>
				<?php $affiliates[] = $id;?>
				<tr>
					<td><?php echo $array['username'];?></td>
					<td><?php echo $array['name'];?></td>
					<td><?php
						if (!empty($array['payment_gateway_data']) && !empty($array['payment_gateway_data']['type'])){
							$temp_key = $array['payment_gateway_data']['type'];
							switch ($temp_key):
								case 'paypal':
									$payment_class = ($array['payment_gateway_data']['is_active']) ? 'uap-payment-type-active-paypal' : '';
									?>
									<span class="uap-admin-aff-payment-type <?php echo $payment_class;?>">PayPal</span>
									<?php
									break;
								case 'bt':
									$payment_class = ($array['payment_gateway_data']['is_active']) ? 'uap-payment-type-active-bt' : '';
									?>
									<span class="uap-admin-aff-payment-type <?php echo $payment_class;?>"><?php esc_html_e('Bank Transfer', 'uap');?></span>
									<?php
									break;
								case 'stripe':
									$payment_class = '';
									if ($array['payment_gateway_data']['is_active'] && !empty($array['payment_gateway_data']['settings']) && !empty($array['payment_gateway_data']['settings']['uap_affiliate_stripe_name'])
										&& !empty($array['payment_gateway_data']['settings']['uap_affiliate_stripe_card_number']) && !empty($array['payment_gateway_data']['settings']['uap_affiliate_stripe_expiration_month'])
										&& !empty($array['payment_gateway_data']['settings']['uap_affiliate_stripe_expiration_year']) ) //&& !empty($array['payment_gateway_data']['settings']['uap_affiliate_stripe_cvc'])
									{
										$payment_class = 'uap-payment-type-active-stripe';
									}
									?>
									<span class="uap-admin-aff-payment-type <?php echo $payment_class;?>">Stripe</span>
									<?php
									break;
							endswitch;
						} else {
							echo '-';
						}
					?></td>
					<td><?php
						echo uap_return_payment_details_for_admin_table($array['payment_gateway_data']);
					?></td>
					<td><?php echo $array['rank'];?></td>
					<td><?php echo $array['email'];?></td>
					<td><strong><?php echo uap_format_price_and_currency($data['currency'], $array['amount']);?></strong>

				<input type="hidden" value="<?php echo $array['referrals'];?>" name="referrals[<?php echo $id;?>]" />
				<input type="hidden" value="<?php echo $array['amount'];?>" name="amount[<?php echo $id;?>]" />
				<input type="hidden" value="<?php echo $data['currency'];?>" name="currency[<?php echo $id;?>]" />
					</td>
				</tr>
			<?php endforeach;?>

						</tbody>
				</table>
			<?php $affiliates = implode(',', $affiliates)?>
			<input type="hidden" value="<?php echo $affiliates;?>" name="affiliates" />
		<?php endif;?>

	</form>
</div>
