## Geohashing Coordinate Calculator

This Lumen implementation avails an API to calculate the coordinate offset based on string input, per the [xkcd Geohashing Algorithm](http://wiki.xkcd.com/geohashing/The_Algorithm). It only implements the hashing portion of the algorithm. Client devices are expected to retrieve the proper Dow Jones opening value and format the string with the date, as per [the spec](http://wiki.xkcd.com/geohashing/File:Coordinates.png). 

# Use
In routes.php an endpoint is exposed with the following format: 

	/geo/{sourceString}

The source string is supplied directly into the URL, and is sent in an HTTP GET request. The base URL will depend on your server configuration. 

Remember to follow Lumen's docs (below) so that your installation is good and secure. (Mainly setup in .env.)

If you need to see debugging info, do this: 

	/geo/{sourceString}?debug=1

This will show the source MD5 hashes. 

## Built On
[The Lumen framework](http://lumen.laravel.com/docs).

### License
This code is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
