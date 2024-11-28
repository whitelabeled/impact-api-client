<?php

namespace Whitelabeled\ImpactApiClient;

use DateTime;

class Transaction
{
    public string $id;

    public DateTime $transactionDate;
    public ?DateTime $clickDate;

    /**
     * @var string
     */
    public ?string $program;
    public ?string $action;

    /**
     * @var
     */
    public ?string $campaignId;

    /**
     * @var string
     */
    public ?string $status;

    /**
     * @var double Effective commission for this sale
     */
    public float $commissionAmount;
    public ?string $subId1;
    public ?string $subId2;
    public ?string $subId3;
    public ?string $sharedId;
    public ?string $referringDomain;

    /**
     * Create a Transaction object from two JSON objects
     * @param array $transData Transaction data
     * @return Transaction
     */
    public static function createFromJson($transData)
    {
        $transaction = new Transaction();

        $transaction->id = (string)$transData['Id'];
        $transaction->campaignId = (string)$transData['CampaignId'];
        $transaction->program = (string)$transData['CampaignName'];
        $transaction->action = (string)$transData['ActionTrackerName'];
        $transaction->subId1 = (string)$transData['SubId1'];
        $transaction->subId2 = (string)$transData['SubId2'];
        $transaction->subId3 = (string)$transData['SubId3'];
        $transaction->sharedId = (string)$transData['SharedId'];
        $transaction->referringDomain = (string)$transData['ReferringDomain'];

        $transaction->transactionDate = self::parseDate($transData['EventDate']);
        $transaction->clickDate = self::parseDate($transData['ReferringDate']);

        $transaction->status = (string)$transData['State'];
        $transaction->commissionAmount = (double)$transData['Payout'];

        if ($transData['Payout'] == null) {
            $transaction->commissionAmount = (double)$transData['IntendedPayout'];
        }

        return $transaction;
    }

    /**
     * Parse a date
     * @param $date string Date/time string
     * @return DateTime|null
     */
    private static function parseDate($date)
    {
        if ($date == null) {
            return null;
        } else {
            return new DateTime($date);
        }
    }
}