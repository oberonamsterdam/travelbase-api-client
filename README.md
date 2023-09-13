Travelbase Management API v2 - Client library
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
---
# Usage

To use this client you need to provide the API key and endpoint when initiating the client class.

```php
$client = new \Oberon\TravelbaseClient\ApiClient("https://example.com", "APIKEY");
```
---

# Example calls

### Queries

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
$bookings = $client->getUpdatedBookings($yourPartnerId, new \DateTime('2022-01-01'));
```

Retrieve a single company:
```php
/** @var \Oberon\TravelbaseClient\Model\Company $company */
$company = $client->getCompany($yourCompanyId);
```

Retrieve a single activity:
```php
/** @var \Oberon\TravelbaseClient\Model\Activity $activity */
$activity = $client->getActivity($yourActivityId);
```

Retrieve a single ticket:
```php
/** @var \Oberon\TravelbaseClient\Model\Ticket $ticket */
$ticket = $client->getTicket($yourTicketId);
```

Retrieve all tickets:
```php
$cursor = null;
$hasMoreTickets = true;
/** @var \Oberon\TravelbaseClient\Model\Ticket[] $tickets */
$tickets = [];
while ($hasMoreTickets) {
    $ticketConnection =  $client->getAllTickets($yourPartnerId, 10, $cursor);
    $tickets = array_merge($tickets, $ticketConnection->getNodes());
    $cursor = $ticketConnection->getPageInfo()->getEndCursor();
    $hasMoreTickets = $ticketConnection->getPageInfo()->isHasNextPage();
}
```


---
### Mutations

Create or replace allotments through models or array:
```php
//Send as a model
$allotment = new \Oberon\TravelbaseClient\Model\Allotment();
$allotment->setAmount(1); // required
$allotment->setDate(new \DateTime('2022-01-02')); // required
$allotmentCollection[] = $allotment;

//send as array
$allotmentCollection[] = [
    'amount' => 1, // required
    'date' => '2022-01-02', // required
];

$client->createOrReplaceAllotments($yourRentalUnitId, $allotmentCollection);
```


Create or replace trip pricings through models or array:
```php
//Send as a model
$tripPricing = new \Oberon\TravelbaseClient\Model\TripPricing();
$tripPricing->setDuration(1);
$tripPricing->setDate(new \DateTime('2022-01-01'));
$tripPricing->setPrice(100.50); // required
$tripPricing->setExtraPersonPrice(10); // required
$tripPricing->setMinimumStayPrice(40); // required
$tripPricingCollection[] = $tripPricing;

//send as array
$tripPricingCollection[] = [
    'duration' => 1, // required
    'date' => '2022-01-02', // required
    'price' => 105.00, // required
    'extraPersonPrice' => 10, // required
    'minimumStayPrice' => 40, // required
];

$client->createOrReplaceTripPricings($yourRentalUnitId, $tripPricingCollection);
```

Delete trip pricings:
```php
// To delete all trip pricings for a specific rentalunit, only supply the first parameter. 
// To delete all trips for a specific datetime supply first and second parameter.
// To delete all trips for a specific duration supply first and third parameter
// To delete a specific trip pricing supply all paramters

$client->deleteTrips($yourRentalUnitId, new \DateTime(), 1);
```

Complete pending booking
```php
// To delete all trip pricings for a specific rentalunit, only supply the first parameter. 
// To delete all trips for a specific datetime supply first and second parameter.
// To delete all trips for a specific duration supply first and third parameter
// To delete a specific trip pricing supply all paramters

$client->completePendingBooking($yourBookingId, true);
```

Create or replace activity timeslots through models or array:

```php
// Send as a model
$timeslot = new \Oberon\TravelbaseClient\Model\TimeslotInput(
    $yourRateGroupId, // required
    new \DateTime('2022-01-01 10:00'), // required
    new \DateTime('2022-01-01 12:00'), // required
    'id1' // required
);
$timeslot->setAllotment(1); // optional

$timeslotCollection[] = $timeslot;

// send as array
$timeslotCollection[] = [
    'rateGroupId' => $yourRateGroupId,  // required
    'startDateTime' => '2022-01-02 14:00', // required
    'endDateTime' => '2022-01-02 16:00', // required
    'externalId' => 'id1', // required
    'allotment' => 1, // optional
];

$client->createOrReplaceActivityTimeslots($yourActivityId, $timeslotCollection);
```
