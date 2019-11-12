# Minimal Docker-Wordpress-Burp Setup

This is a minimal Docker setup to intercept Wordpress backchannel traffic.
Intercepting backchannel traffic, plugin behavior and communication can be analyzed.

## Prerequisites 

1. Install **docker** + **docker-compose**

## Installation

1. Setup Intercepting Proxy (e.g. Burp) to listen on port 8082 (Loopback only)
2. Run `./convert_burp_cert.sh` **Note: Proxy must be up and running**
3. Append your `burp.pem` to `ca-bundle.crt`
4. Run `docker-compose up`
5. Visit http://localhost:8081/wp-content/move_ca-bundle.php **OR** get interactive shell to Docker and copy `/tmp/ca-bundle.crt` to `/var/www/html/wp-includes/certificates/ca-bundle.crt` by hand.
6. Done! :) You should be able to observe HTTP and HTTPS traffic when browsing through Wordpress backend located at http://localhost:8081/wp-admin/, e.g. check for site health: http://localhost:8081/wp-admin/site-health.php

## Resulting Setup

```

  __________________  :8082                          
 |                  | <=======================================================>
 | Intercept. Proxy |                                               ||       ||
 |                  |                      _________________        ||       ||       ____________
 |                  |                    |                  |       ||       ||      |            |
 |  Docker Host     |              :8081 |    WordPress     | <=======   ⚡  =====>   |    API     |
 |                  | <================> | Docker Container |                        |            |
 |__________________|                    |__________________|                        |____________|

``` 

## Contents

1. `Dockerfile`
    * It extends *wordpress:latest* and overwrites *wp-config.php* + prepares *ca-bundled.crt*

2. `docker-compose.yml`
    * Sets environment proxy variables
    * Copies `move_ca-bundle.php` to Docker

3. `wp-config.php`
    * Sets Wordpress proxy variables


4. `convert_burp_cert.sh`

    ```Bash
#!/bin/sh

# CONVERT BURP CERTIFICATE TO PEM
# ..the following script expects burp proxy to listen on localhost:8082!

PROXY_HOST=localhost:8082

curl --proxy $PROXY_HOST http://burp/cert --output burp.der
openssl x509 -inform der -in burp.der -out burp.pem
cat burp.pem 
    ```

5. `move_ca-bundle.php`

    ```PHP
<?php 
passthru("mv /tmp/ca-bundle.crt /var/www/html/wp-includes/certificates/ca-bundle.crt");
phpinfo();
    ```