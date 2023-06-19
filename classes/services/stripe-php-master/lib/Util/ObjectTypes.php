<?php

namespace Stripe\Util;

class ObjectTypes
{
    /**
     * @var array Mapping from object types to resource classes
     */
    const mapping = [
        \Stripe\Account::OBJECT_NAME => \Stripe\Account::class,
        \Stripe\AccountLink::OBJECT_NAME => \Stripe\AccountLink::class,
        \Stripe\AlipayAccount::OBJECT_NAME => \Stripe\AlipayAccount::class,
        \Stripe\ApplePayDomain::OBJECT_NAME => \Stripe\ApplePayDomain::class,
        \Stripe\ApplicationFee::OBJECT_NAME => \Stripe\ApplicationFee::class,
        \Stripe\ApplicationFeeRefund::OBJECT_NAME => \Stripe\ApplicationFeeRefund::class,
        \Stripe\Balance::OBJECT_NAME => \Stripe\Balance::class,
        \Stripe\BalanceTransaction::OBJECT_NAME => \Stripe\BalanceTransaction::class,
        \Stripe\BankAccount::OBJECT_NAME => \Stripe\BankAccount::class,
        \Stripe\BillingPortal\Session::OBJECT_NAME => \Stripe\BillingPortal\Session::class,
        \Stripe\BitcoinReceiver::OBJECT_NAME => \Stripe\BitcoinReceiver::class,
        \Stripe\BitcoinTransaction::OBJECT_NAME => \Stripe\BitcoinTransaction::class,
        \Stripe\Capability::OBJECT_NAME => \Stripe\Capability::class,
        \Stripe\Card::OBJECT_NAME => \Stripe\Card::class,
        \Stripe\Charge::OBJECT_NAME => \Stripe\Charge::class,
        \Stripe\Checkout\Session::OBJECT_NAME => \Stripe\Checkout\Session::class,
        \Stripe\Collection::OBJECT_NAME => \Stripe\Collection::class,
        \Stripe\CountrySpec::OBJECT_NAME => \Stripe\CountrySpec::class,
        \Stripe\Coupon::OBJECT_NAME => \Stripe\Coupon::class,
        \Stripe\CreditNote::OBJECT_NAME => \Stripe\CreditNote::class,
        \Stripe\CreditNoteLineItem::OBJECT_NAME => \Stripe\CreditNoteLineItem::class,
        \Stripe\Customer::OBJECT_NAME => \Stripe\Customer::class,
        \Stripe\CustomerBalanceTransaction::OBJECT_NAME => \Stripe\CustomerBalanceTransaction::class,
        \Stripe\Discount::OBJECT_NAME => \Stripe\Discount::class,
        \Stripe\Dispute::OBJECT_NAME => \Stripe\Dispute::class,
        \Stripe\EphemeralKey::OBJECT_NAME => \Stripe\EphemeralKey::class,
        \Stripe\Event::OBJECT_NAME => \Stripe\Event::class,
        \Stripe\ExchangeRate::OBJECT_NAME => \Stripe\ExchangeRate::class,
        \Stripe\File::OBJECT_NAME => \Stripe\File::class,
        \Stripe\File::OBJECT_NAME_ALT => \Stripe\File::class,
        \Stripe\FileLink::OBJECT_NAME => \Stripe\FileLink::class,
        \Stripe\Invoice::OBJECT_NAME => \Stripe\Invoice::class,
        \Stripe\InvoiceItem::OBJECT_NAME => \Stripe\InvoiceItem::class,
        \Stripe\InvoiceLineItem::OBJECT_NAME => \Stripe\InvoiceLineItem::class,
        \Stripe\Issuing\Authorization::OBJECT_NAME => \Stripe\Issuing\Authorization::class,
        \Stripe\Issuing\Card::OBJECT_NAME => \Stripe\Issuing\Card::class,
        \Stripe\Issuing\CardDetails::OBJECT_NAME => \Stripe\Issuing\CardDetails::class,
        \Stripe\Issuing\Cardholder::OBJECT_NAME => \Stripe\Issuing\Cardholder::class,
        \Stripe\Issuing\Dispute::OBJECT_NAME => \Stripe\Issuing\Dispute::class,
        \Stripe\Issuing\Transaction::OBJECT_NAME => \Stripe\Issuing\Transaction::class,
        \Stripe\LineItem::OBJECT_NAME => \Stripe\LineItem::class,
        \Stripe\LoginLink::OBJECT_NAME => \Stripe\LoginLink::class,
        \Stripe\Mandate::OBJECT_NAME => \Stripe\Mandate::class,
        \Stripe\Order::OBJECT_NAME => \Stripe\Order::class,
        \Stripe\OrderItem::OBJECT_NAME => \Stripe\OrderItem::class,
        \Stripe\OrderReturn::OBJECT_NAME => \Stripe\OrderReturn::class,
        \Stripe\PaymentIntent::OBJECT_NAME => \Stripe\PaymentIntent::class,
        \Stripe\PaymentMethod::OBJECT_NAME => \Stripe\PaymentMethod::class,
        \Stripe\Payout::OBJECT_NAME => \Stripe\Payout::class,
        \Stripe\Person::OBJECT_NAME => \Stripe\Person::class,
        \Stripe\Plan::OBJECT_NAME => \Stripe\Plan::class,
        \Stripe\Price::OBJECT_NAME => \Stripe\Price::class,
        \Stripe\Product::OBJECT_NAME => \Stripe\Product::class,
        \Stripe\Radar\EarlyFraudWarning::OBJECT_NAME => \Stripe\Radar\EarlyFraudWarning::class,
        \Stripe\Radar\ValueList::OBJECT_NAME => \Stripe\Radar\ValueList::class,
        \Stripe\Radar\ValueListItem::OBJECT_NAME => \Stripe\Radar\ValueListItem::class,
        \Stripe\Recipient::OBJECT_NAME => \Stripe\Recipient::class,
        \Stripe\RecipientTransfer::OBJECT_NAME => \Stripe\RecipientTransfer::class,
        \Stripe\Refund::OBJECT_NAME => \Stripe\Refund::class,
        \Stripe\Reporting\ReportRun::OBJECT_NAME => \Stripe\Reporting\ReportRun::class,
        \Stripe\Reporting\ReportType::OBJECT_NAME => \Stripe\Reporting\ReportType::class,
        \Stripe\Review::OBJECT_NAME => \Stripe\Review::class,
        \Stripe\SetupIntent::OBJECT_NAME => \Stripe\SetupIntent::class,
        \Stripe\Sigma\ScheduledQueryRun::OBJECT_NAME => \Stripe\Sigma\ScheduledQueryRun::class,
        \Stripe\SKU::OBJECT_NAME => \Stripe\SKU::class,
        \Stripe\Source::OBJECT_NAME => \Stripe\Source::class,
        \Stripe\SourceTransaction::OBJECT_NAME => \Stripe\SourceTransaction::class,
        \Stripe\Subscription::OBJECT_NAME => \Stripe\Subscription::class,
        \Stripe\SubscriptionItem::OBJECT_NAME => \Stripe\SubscriptionItem::class,
        \Stripe\SubscriptionSchedule::OBJECT_NAME => \Stripe\SubscriptionSchedule::class,
        \Stripe\TaxId::OBJECT_NAME => \Stripe\TaxId::class,
        \Stripe\TaxRate::OBJECT_NAME => \Stripe\TaxRate::class,
        \Stripe\Terminal\ConnectionToken::OBJECT_NAME => \Stripe\Terminal\ConnectionToken::class,
        \Stripe\Terminal\Location::OBJECT_NAME => \Stripe\Terminal\Location::class,
        \Stripe\Terminal\Reader::OBJECT_NAME => \Stripe\Terminal\Reader::class,
        \Stripe\ThreeDSecure::OBJECT_NAME => \Stripe\ThreeDSecure::class,
        \Stripe\Token::OBJECT_NAME => \Stripe\Token::class,
        \Stripe\Topup::OBJECT_NAME => \Stripe\Topup::class,
        \Stripe\Transfer::OBJECT_NAME => \Stripe\Transfer::class,
        \Stripe\TransferReversal::OBJECT_NAME => \Stripe\TransferReversal::class,
        \Stripe\UsageRecord::OBJECT_NAME => \Stripe\UsageRecord::class,
        \Stripe\UsageRecordSummary::OBJECT_NAME => \Stripe\UsageRecordSummary::class,
        \Stripe\WebhookEndpoint::OBJECT_NAME => \Stripe\WebhookEndpoint::class,
    ];
}
