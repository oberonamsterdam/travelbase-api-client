TOR GraphQL Client
=======================

This is a client library to communicate with the TOR application. You can use our Client to manage your assets in TOR.

Usage of this API is limited to registered users only. If you would like to use TOR, please visit [travelbase.nl](https://travelbase.nl).


---
# Installation

Run the following command to install the package using composer:

```
$ composer require oberonamsterdam/tor-graphql-client
```

# Usage

To use this Client you need to define the API Key and endpoint as an .env variable or supply it when initiating the client class.
```
TOR_GRAPHQL_ENDPOINT="https://travelbase.nl/api/management/v2/graphql"
TOR_GRAPHQL_APIKEY="MY_SECRET_APIKEY"
```

```
$client = new \TOR\GraphQL\TorClient("https://travelbase.nl/api/management/v2/graphql", "MY_SECRET_APIKEY")
```

# Example calls
Retrieve a collection of all partners:
```php
$client = new \TOR\GraphQL\TorClient();
/** @var \TOR\GraphQL\Model\Partner[] $partners */
$partners = $client->getPartners();
```
  
Retrieve a single partner:
```php
$client = new \TOR\GraphQL\TorClient();
/** @var \TOR\GraphQL\Model\Partner $partner */
$partners = $client->getPartner($partnerId);
```

Retrieve a single accommodation:
```php
$client = new \TOR\GraphQL\TorClient();
/** @var \TOR\GraphQL\Model\Accommodation $accommodation */
$accommodation = $client->getAccommodation($accommodationId);
```

Retrieve a single rentalUnit:
```php
$client = new \TOR\GraphQL\TorClient();
/** @var \TOR\GraphQL\Model\RentalUnit $rentalUnit */
$rentalUnit = $client->getRentalUnit($rentalUnitId);
```

Retrieve all bookings:
```php
$client = new \TOR\GraphQL\TorClient();
/** @var \TOR\GraphQL\Model\RentalUnit $rentalUnit */
$cursor = null;
$hasMoreBookings = true;
/** @var \TOR\GraphQL\Model\Booking[] $bookings */
$bookings = [];
while ($hasMoreBookings) {
    $bookingRelay =  $client->getAllBookings($partnerId, 10, $cursor);
    $bookings = array_merge($bookings, $bookingRelay->getNodes());
    $cursor = $bookingRelay->getPageInfo()->getEndCursor();
    $hasMoreBookings = $bookingRelay->getPageInfo()->isHasNextPage();
}
```

Retrieve recently updated bookings:
```php
$client = new \TOR\GraphQL\TorClient();
$cursor = null;
$hasMoreBookings = true;
/** @var \TOR\GraphQL\Model\Booking[] $bookings */
$bookings = [];
while ($hasMoreBookings) {
    $bookingRelay =  $client->getRecentlyUpdatedBookings($partnerId, 10, $cursor);
    $bookings = array_merge($bookings, $bookingRelay->getNodes());
    $cursor = $bookingRelay->getPageInfo()->getEndCursor();
    $hasMoreBookings = $bookingRelay->getPageInfo()->isHasNextPage();
}
```

Retrieve upcoming bookings:
```php
$client = new \TOR\GraphQL\TorClient();
$cursor = true;
$hasMoreBookings = true;
/** @var \TOR\GraphQL\Model\Booking[] $bookings */
$bookings = [];
while ($hasMoreBookings) {
    $bookingRelay =  $client->getUpcomingBookings($partnerId, 10, $cursor);
    $bookings = array_merge($bookings, $bookingRelay->getNodes());
    $cursor = $bookingRelay->getPageInfo()->getEndCursor();
    $hasMoreBookings = $bookingRelay->getPageInfo()->isHasNextPage();
}
```

Create or replace allotments:
```php
$allotment = new \TOR\GraphQL\Model\Allotment();
$allotment->setAmount(1);
$allotment->setDate(new \DateTime());
$allotmentCollection = new \TOR\GraphQL\Model\AllotmentCollection();
$allotmentCollection->addAllotment($allotment);

$client = new \TOR\GraphQL\TorClient();
$client->createOrReplaceAllotments($rentalUnitId, $allotmentCollection);
```


Create or replace trippricings:
```php
$tripPricing = new \TOR\GraphQL\Model\TripPricing();
$tripPricing->setDuration(1);
$tripPricing->setDate(new \DateTime());
$tripPricing->setPrice(100.50);
$tripPricingCollection = new \TOR\GraphQL\Model\TripPricingCollection();
$tripPricingCollection->addTripPricing($tripPricing);

$client = new \TOR\GraphQL\TorClient();
$client->createOrReplaceTripPricings($rentalUnitId, $tripPricingCollection);
```

Delete trips:
```php
$client = new \TOR\GraphQL\TorClient();
//To delete all trip pricings for a specific rentalunit, only supply the first parameter. 
//To delete all trips for a specific datetime supply first and second parameter.
//To delete all trips for a specific duration supply first and third parameter
//To delete a specific trip pricing supply all paramters
$client->deleteTrips($rentalUnitId, new DateTime(), 1);
```

