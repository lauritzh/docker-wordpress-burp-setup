<?php
	passthru("mv /tmp/ca-bundle.crt /var/www/html/wp-includes/certificates/ca-bundle.crt");
	phpinfo();