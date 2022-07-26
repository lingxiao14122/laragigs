## Setup

## Append Hosts File
C:/Windows/System32/drivers/etc/Hosts

```
127.0.0.1	localhost
127.0.0.1	PROJECT_NAME.test
```
## Edit Virtual Hosts File
C:/xampp/apache/conf/extra/httpd-vhosts.conf
```
<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs"
    ServerName localhost
</VirtualHost>

<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/laragigs/public"
    ServerName laragigs.test
 </VirtualHost>
 ```
Create database "laragigs" and migrate