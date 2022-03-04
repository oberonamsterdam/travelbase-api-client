---
## Version 1.1

---
- Added locale option to queries
- Changed inner workings of getAllBookings and getUpdatedBookings
  - PartnerBookingResponse and corresponding classes to PartnerRelay
  - Separated updatedBookings call as this is not using a relay
- Added company result in partner object 
- Added company call 
- Added activity call 
- Added ticket call 
- Added relay function for tickets from partner 
- Added call for bulk operation for ticket timeslots
- Added complete pending booking call
- Merged query and mutation file as these files were getting more intertwined with each other and it would cause problems with the localization
- Changed all static calls of querybuilder so we do not have to past the locale to every query.
- Updated README.md
- Made library compatible with PHP 8+
