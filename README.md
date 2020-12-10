Travelbase Management API - Client library
=======================

This is a client library to communicate with the Travelbase Management API. You can use the client to manage your 
assets in Travelbase.

Usage of the Travelbase Management API is limited to registered users only. If you would like to use Travelbase, please 
visit [travelbase.nl](https://www.travelbase.nl).


---
# Installation

Run the following command to install the package using composer:

```
$ composer require oberonamsterdam/travelbase-api-client
```

# Usage

To use this client you need to provide the API key and endpoint when initiating the client class.

```php
$client = new \Oberon\TravelbaseClient\ApiClient("https://example.com", "APIKEY");
```

# Example calls
Retrieve a collection of all partners:
```php
/** @var \Oberon\TravelbaseClient\Model\Partner[] $partners */
$partners = $client->getPartners();
```
  
Retrieve a single partner:
```php
/** @var \Oberon\TravelbaseClient\Model\Partner $partner */
$partners = $client->getPartner($yourPartnerId);
```

Retrieve a single accommodation:
```php
/** @var \Oberon\TravelbaseClient\Model\Accommodation $accommodation */
$accommodation = $client->getAccommodation($yourAccommodationId);
```

Retrieve a single rentalUnit:
```php
/** @var \Oberon\TravelbaseClient\Model\RentalUnit $rentalUnit */
$rentalUnit = $client->getRentalUnit($yourRentalUnitId);
```

Retrieve all bookings:
```php
/** @var \Oberon\TravelbaseClient\Model\RentalUnit $rentalUnit */
$cursor = null;
$hasMoreBookings = true;
/** @var \Oberon\TravelbaseClient\Model\Booking[] $bookings */
$bookings = [];
while ($hasMoreBookings) {
    $bookingConnection =  $client->getAllBookings($yourPartnerId, 10, $cursor);
    $bookings = array_merge($bookings, $bookingConnection->getNodes());
    $cursor = $bookingConnection->getPageInfo()->getEndCursor();
    $hasMoreBookings = $bookingConnection->getPageInfo()->isHasNextPage();
}
```

Retrieve a single booking:
```php
/** @var \Oberon\TravelbaseClient\Model\Booking $booking */
$booking = $client->getBooking($yourBookingId);
```

Retrieve the first 100 updated bookings after a specific date:
```php
/** @var \Oberon\TravelbaseClient\Model\Booking[] $bookings */
$bookings = $client->getUpdatedBookings($yourPartnerId, new \DateTIme('2020-01-01'));
```

Create or replace allotments through models or array:
```php
//Send as a model
$allotment = new \Oberon\TravelbaseClient\Model\Allotment();
$allotment->setAmount(1);
$allotment->setDate(new \DateTime('2022-01-02'));
$allotmentCollection[] = $allotment;

//send as array
$allotmentCollection[] = [
    'amount' => 1,
    'date' => '2022-01-02',
];

$client->createOrReplaceAllotments($yourRentalUnitId, $allotmentCollection);
```


Create or replace trip pricings through models or array:
```php
//Send as a model
$tripPricing = new \Oberon\TravelbaseClient\Model\TripPricing();
$tripPricing->setDuration(1);
$tripPricing->setDate(new \DateTime('2022-01-01'));
$tripPricing->setPrice(100.50);
$tripPricing->setExtraPersonPrice(10);
$tripPricing->setMinimumStayPrice(40);
$tripPricingCollection[] = $tripPricing;

//send as array
$tripPricingCollection[] = [
    'duration' => 1,
    'date' => '2022-01-02',
    'price' => 105.00,
    'extraPersonPrice' => 10,
    'minimumStayPrice' => 40,
];

$client->createOrReplaceTripPricings($yourRentalUnitId, $tripPricingCollection);
```

Delete trip pricings:
```php
$client = new \Oberon\TravelbaseClient\ApiClient("https://example.com", "APIKEY");
//To delete all trip pricings for a specific rentalunit, only supply the first parameter. 
//To delete all trips for a specific datetime supply first and second parameter.
//To delete all trips for a specific duration supply first and third parameter
//To delete a specific trip pricing supply all paramters

$client->deleteTrips($yourRentalUnitId, new \DateTime(), 1);
```

