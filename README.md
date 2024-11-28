# Impact API client

[![Latest Stable Version](https://img.shields.io/packagist/v/whitelabeled/impact-api-client.svg)](https://packagist.org/packages/whitelabeled/impact-api-client)
[![Total Downloads](https://img.shields.io/packagist/dt/whitelabeled/impact-api-client.svg)](https://packagist.org/packages/whitelabeled/impact-api-client)
[![License](https://img.shields.io/packagist/l/whitelabeled/impact-api-client.svg)](https://packagist.org/packages/whitelabeled/impact-api-client)

Library to retrieve sales from the [Impact Partner API](https://integrations.impact.com/impact-publisher/reference/overview).
This API is intended for publishers who would like to automatically import transaction data ("Actions").

Usage:

```php

$client = new \Whitelabeled\ImpactApiClient\ImpactClient('AccountSID', 'AuthToken');

$transactions = $client->getTransactions(new DateTime('2024-11-01 00:00:00'), new DateTime('2024-12-01 00:00:00'));

var_dump($transactions);

/* Returns:

array(56) {
  [0]=>
  object(Whitelabeled\ImpactApiClient\Transaction)#6 (13) {
    ["id"]=>
    string(17) "12681.6152.114555"
    ["transactionDate"]=>
    object(DateTime)#7 (3) {
      ["date"]=>
      string(26) "2024-11-04 12:08:57.000000"
      ["timezone_type"]=>
      int(1)
      ["timezone"]=>
      string(6) "+01:00"
    }
    ["clickDate"]=>
    object(DateTime)#26 (3) {
      ["date"]=>
      string(26) "2024-10-22 17:10:33.000000"
      ["timezone_type"]=>
      int(1)
      ["timezone"]=>
      string(6) "+02:00"
    }
    ["program"]=>
    string(9) "Raisin NL"
    ["action"]=>
    string(12) "Registration"
    ["campaignId"]=>
    string(5) "12681"
    ["status"]=>
    string(7) "PENDING"
    ["commissionAmount"]=>
    float(0)
    ["subId1"]=>
    string(0) ""
    ["subId2"]=>
    string(0) ""
    ["subId3"]=>
    string(0) ""
    ["sharedId"]=>
    string(0) ""
    ["referringDomain"]=>
    string(12) "www.website.nl"
  }
  [1]=>
  object(Whitelabeled\ImpactApiClient\Transaction)#25 (13) {
    ["id"]=>
    string(17) "12681.6156.146847"
    ["transactionDate"]=>
    object(DateTime)#24 (3) {
      ["date"]=>
      string(26) "2024-11-08 13:47:35.000000"
      ["timezone_type"]=>
      int(1)
      ["timezone"]=>
      string(6) "+01:00"
    }
    ["clickDate"]=>
    object(DateTime)#21 (3) {
      ["date"]=>
      string(26) "2024-11-08 08:54:06.000000"
      ["timezone_type"]=>
      int(1)
      ["timezone"]=>
      string(6) "+01:00"
    }
    ["program"]=>
    string(9) "Raisin NL"
    ["action"]=>
    string(12) "Registration"
    ["campaignId"]=>
    string(5) "12681"
    ["status"]=>
    string(7) "PENDING"
    ["commissionAmount"]=>
    float(0)
    ["subId1"]=>
    string(0) ""
    ["subId2"]=>
    string(0) ""
    ["subId3"]=>
    string(0) ""
    ["sharedId"]=>
    string(0) ""
    ["referringDomain"]=>
    string(12) "www.website.nl"
  }
  [2]=>
  object(Whitelabeled\ImpactApiClient\Transaction)#14 (13) {
    ["id"]=>
    string(18) "12681.6156.1638448"
    ["transactionDate"]=>
    object(DateTime)#13 (3) {
      ["date"]=>
      string(26) "2024-11-09 08:49:08.000000"
      ["timezone_type"]=>
      int(1)
      ["timezone"]=>
      string(6) "+01:00"
    }
    ["clickDate"]=>
    object(DateTime)#12 (3) {
      ["date"]=>
      string(26) "2024-11-09 08:41:15.000000"
      ["timezone_type"]=>
      int(1)
      ["timezone"]=>
      string(6) "+01:00"
    }
    ["program"]=>
    string(9) "Raisin NL"
    ["action"]=>
    string(12) "Registration"
    ["campaignId"]=>
    string(5) "12681"
    ["status"]=>
    string(7) "PENDING"
    ["commissionAmount"]=>
    float(0)
    ["subId1"]=>
    string(15) "subid1_tracking"
    ["subId2"]=>
    string(0) ""
    ["subId3"]=>
    string(0) ""
    ["sharedId"]=>
    string(0) ""
    ["referringDomain"]=>
    string(12) "www.website.nl"
  }
  [3]=>
  object(Whitelabeled\ImpactApiClient\Transaction)#10 (13) {
    ["id"]=>
    string(16) "12681.6158.29866"
    ["transactionDate"]=>
    object(DateTime)#11 (3) {
      ["date"]=>
      string(26) "2024-11-10 10:13:34.000000"
      ["timezone_type"]=>
      int(1)
      ["timezone"]=>
      string(6) "+01:00"
    }
    ["clickDate"]=>
    object(DateTime)#31 (3) {
      ["date"]=>
      string(26) "2024-10-29 21:45:35.000000"
      ["timezone_type"]=>
      int(1)
      ["timezone"]=>
      string(6) "+01:00"
    }
    ["program"]=>
    string(9) "Raisin NL"
    ["action"]=>
    string(12) "Registration"
    ["campaignId"]=>
    string(5) "12681"
    ["status"]=>
    string(7) "PENDING"
    ["commissionAmount"]=>
    float(0)
    ["subId1"]=>
    string(0) ""
    ["subId2"]=>
    string(0) ""
    ["subId3"]=>
    string(0) ""
    ["sharedId"]=>
    string(0) ""
    ["referringDomain"]=>
    string(12) "www.website.nl"
  }
}
*/
```

## License

© Keuze.nl BV

MIT license, see [LICENSE.txt](LICENSE.txt) for details.