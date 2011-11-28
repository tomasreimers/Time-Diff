## Purpose
This is a sole php function which allows one to turn the difference inbetween two timestamps (this is espically useful when trying to display to a user the difference between the time somethign was posted and now).

## Declaration
`timeBetween($start_date, $end_date, $precision, $shortForm)`

*(Returns a string)*

* $start_date (int) is the first time stamp
* $end_date (int) is the second tiemstamp (if none is provided it defaults to now)
* $precision (int) is the amount of units to show 
  * e.g. if the difference is *1 year 1 day 1 hour 1 minute 1 second*, a precision of 3 will return  *1 year 1 day 1 hour*
  * Default is 2
  * Max is 5
* $shortForm (bool) changes the return value to have shorter units 
  * e.g. if the difference is *1 year 1 day*, if shortform is set to true  *1y1d*
  * Default is false
  
## Examples
```
// returns difference between 123123 and 123123123 (precision 2 NOT shortform)
timeBetween(123123, 123123123);

// returns difference between 3 and 123123123 (precision 4 NOT shortform)
timeBetween(3, 123123123, 4);

// returns difference between 323222 and NOW (precision 2 NOT shortform)
timeBetween(323222);

// returns difference between 323222 and 3938883 (precision 2 shortform)
timeBetween(323222, 3938883, 2, true);
```