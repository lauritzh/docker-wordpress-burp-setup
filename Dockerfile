FROM wordpress:latest

# use precofigured wp-config with WP proxies set
COPY ./wp-config.php /var/www/html/wp-config.php


# Add our own Burp CA certificate to prevent failing validation, burp.pem/burp.der include certificate, run http://localhost:8081/wp-content/move_ca-bundle.php when setup is finished!
COPY ./ca-bundle.crt /tmp/ca-bundle.crt 

