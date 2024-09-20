# IPGeolocationAPI

Reliable and fast PHP IP GeoLocation API based on the [BanProxy](https://banproxy.com) free GeoIP API.

## Requirements
- PHP 8.1+

## Installation
1. Download this project
2. Register at [BanProxy](https://banproxy.com) and get a free API key.
3. Place the API key into the `config.php` file
4. See the `example.php` file for usage examples.


Example Response from BanProxy API:
```
{
   "as":"AS13335 Cloudflare, Inc.",
   "city":"South Brisbane",
   "country":"Australia",
   "countryCode":"AU",
   "hosting":true,
   "isp":"Cloudflare, Inc",
   "lat":-27.4766,
   "lon":153.0166,
   "mobile":false,
   "org":"APNIC and Cloudflare DNS Resolver project",
   "query":"1.1.1.1",
   "region":"QLD",
   "regionName":"Queensland",
   "status":"success",
   "timezone":"Australia/Brisbane",
   "zip":"4101",
   "proxy":"yes",
   "provider":"null"
}
```
