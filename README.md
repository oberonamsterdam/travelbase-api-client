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

To use this Client you need to provide the API Key and endpoint when initiating the client class.

```php
$client = new \Oberon\TorClient\ApiClient("https://example.com", "APIKEY");
```

# Example calls
Retrieve a collection of all partners:
```php
$client = new \Oberon\TorClient\ApiClient("https://example.com", "APIKEY");
/** @var \Oberon\TorClient\Model\Partner[] $partners */
$partners = $client->getPartners();
```
  
Retrieve a single partner:
```php
$client = new \Oberon\TorClient\ApiClient("https://example.com", "APIKEY");
/** @var \Oberon\TorClient\Model\Partner $partner */
$partners = $client->getPartner($partnerId);
```

Retrieve a single accommodation:
```php
$client = new \Oberon\TorClient\ApiClient("https://example.com", "APIKEY");
/** @var \Oberon\TorClient\Model\Accommodation $accommodation */
$accommodation = $client->getAccommodation($accommodationId);
```

Retrieve a single rentalUnit:
```php
$client = new \Oberon\TorClient\ApiClient();
/** @var \Oberon\TorClient\Model\RentalUnit $rentalUnit */
$rentalUnit = $client->getRentalUnit($rentalUnitId);
```

Retrieve all bookings:
```php
$client = new \Oberon\TorClient\ApiClient("https://example.com", "APIKEY");
/** @var \Oberon\TorClient\Model\RentalUnit $rentalUnit */
$cursor = null;
$hasMoreBookings = true;
/** @var \Oberon\TorClient\Model\Booking[] $bookings */
$bookings = [];
while ($hasMoreBookings) {
    $bookingConnection =  $client->getAllBookings($partnerId, 10, $cursor);
    $bookings = array_merge($bookings, $bookingConnection->getNodes());
    $cursor = $bookingConnection->getPageInfo()->getEndCursor();
    $hasMoreBookings = $bookingConnection->getPageInfo()->isHasNextPage();
}
```

Retrieve recently updated bookings:
```php
$client = new \Oberon\TorClient\ApiClient("https://example.com", "APIKEY");
$cursor = null;
$hasMoreBookings = true;
/** @var \Oberon\TorClient\Model\Booking[] $bookings */
$bookings = [];
while ($hasMoreBookings) {
    $bookingConnection =  $client->getRecentlyUpdatedBookings($partnerId, 10, $cursor);
    $bookings = array_merge($bookings, $bookingConnection->getNodes());
    $cursor = $bookingConnection->getPageInfo()->getEndCursor();
    $hasMoreBookings = $bookingConnection->getPageInfo()->isHasNextPage();
}
```

Retrieve upcoming bookings:
```php
$client = new \Oberon\TorClient\ApiClient("https://example.com", "APIKEY");
$cursor = true;
$hasMoreBookings = true;
/** @var \Oberon\TorClient\Model\Booking[] $bookings */
$bookings = [];
while ($hasMoreBookings) {
    $bookingConnection =  $client->getUpcomingBookings($partnerId, 10, $cursor);
    $bookings = array_merge($bookings, $bookingConnection->getNodes());
    $cursor = $bookingConnection->getPageInfo()->getEndCursor();
    $hasMoreBookings = $bookingConnection->getPageInfo()->isHasNextPage();
}
```

Create or replace allotments:
```php
$allotment = new \Oberon\TorClient\Model\Allotment();
$allotment->setAmount(1);
$allotment->setDate(new \DateTime());
$allotmentCollection = new \Oberon\TorClient\Model\AllotmentCollection();
$allotmentCollection->addAllotment($allotment);

$client = new \Oberon\TorClient\ApiClient("https://example.com", "APIKEY");
$client->createOrReplaceAllotments($rentalUnitId, $allotmentCollection);
```


Create or replace trippricings:
```php
$tripPricing = new \Oberon\TorClient\Model\TripPricing();
$tripPricing->setDuration(1);
$tripPricing->setDate(new \DateTime());
$tripPricing->setPrice(100.50);
$tripPricingCollection = new \Oberon\TorClient\Model\TripPricingCollection();
$tripPricingCollection->addTripPricing($tripPricing);

$client = new \Oberon\TorClient\ApiClient("https://example.com", "APIKEY");
$client->createOrReplaceTripPricings($rentalUnitId, $tripPricingCollection);
```

Delete trips:
```php
$client = new \Oberon\TorClient\ApiClient("https://example.com", "APIKEY");
//To delete all trip pricings for a specific rentalunit, only supply the first parameter. 
//To delete all trips for a specific datetime supply first and second parameter.
//To delete all trips for a specific duration supply first and third parameter
//To delete a specific trip pricing supply all paramters
$client->deleteTrips($rentalUnitId, new \DateTime(), 1);
```

