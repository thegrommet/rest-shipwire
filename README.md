rest-shipwire
=============

PHP Rest Server for Shipwire Integration
----------------------------------------------------

This provides a simple PHP-based REST service with dummy responses to aid in Shipwire integration development before the actual APIs are ready.

### Apache Virtual Host Setup

```ApacheConf
<VirtualHost *:80>
    DocumentRoot "/webroot/rest-shipwire"
    ServerName rest.site
    ServerAlias www.rest.site
</VirtualHost>
```

### Supported Resources

* /vendors
* /warehouses
* /rate
* /shipments
* /shipments/E{any_int}/packing-list
* /products

### Vendor GET example

http://www.rest.site/vendors/E1

```JSON
{
    "id": 10,
	"externalId": 1,
    "name": "Test Vendor 1",
    "status": "active",
    "description": "Vendor 1 description",
    "contactName": "Vendor 1 name",
    "contactEmail": "vendor1@thegrommet.com",
    "contactPhone": "123-456-7890",
    "contactFax": "234-567-8901",
    "address1": "123 Main St",
    "address2": "Apt. 1",
    "city": "Boulder",
    "region": "CO",
    "postalCode": "80304",
    "country": "US"
}
```

PHP Rest server from https://github.com/marcj/php-rest-service
