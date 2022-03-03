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
// the 3 locale options are nl (dutch), de (german), en (english)

$translationNL = new \Oberon\TravelbaseClient\Model\TimeslotTranslation();
$translationNL->setLocale(\Oberon\TravelbaseClient\Model\TimeslotTranslation::LOCALE_NL);
$translationNL->setLabel('Test NL');

$translationDE = new \Oberon\TravelbaseClient\Model\TimeslotTranslation();
$translationDE->setLocale(\Oberon\TravelbaseClient\Model\TimeslotTranslation::LOCALE_DE);
$translationDE->setLabel('Test DE');

$translationEN = new \Oberon\TravelbaseClient\Model\TimeslotTranslation();
$translationEN->setLocale(\Oberon\TravelbaseClient\Model\TimeslotTranslation::LOCALE_EN);
$translationEN->setLabel('Test EN');

$timeslot = new \Oberon\TravelbaseClient\Model\TimeslotInput();
$timeslot->setRateGroupId($yourRateGroupId);
$timeslot->setStartDateTime(new \DateTime('2022-01-01'));
$timeslot->setEndDateTime(new \DateTime('2022-01-02'));
$timeslot->setAllotment(1); // optional
$timeslot->setExternalId('1'); // optional
$timeslot->addTranslation($translationNL);
$timeslot->addTranslation($translationDE);
$timeslot->addTranslation($translationEN);
$timeslotCollection[] = $timeslot;

// send as array
$timeslotCollection[] = [
    'rateGroupId' => '1', 
    'startDateTime' => '2022-01-02',
    'endDateTime' => '2022-01-03',
    'allotment' => 1, // optional
    'externalId' => '1', // optional
    'translations' => [
        [
            'locale' => 'nl',
            'label' => 'Test NL',
        ],
        [
            'locale' => 'de',
            'label' => 'Test DE',
        ],
        [
            'locale' => 'en',
            'label' => 'Test EN',
        ],
    ],
];

$clearStartDate = new \DateTime('2022-01-01'); // Start of date range to clear timeslots 
$clearEndDate = new \DateTime('2022-01-03');  // End of date range to clear timeslots, inclusive.

$client->bulkSetActivityTimeslots($yourActivityId, $clearStartDate, $clearEndDate, $timeslotCollection);
```
