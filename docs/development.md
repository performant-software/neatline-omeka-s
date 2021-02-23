# Development
###### Development instructions for neatline-omeka-s

#### Install Apache
```
brew install httpd
```

#### Install MySQL (5.6)
```
brew install mysql@5.6
```

#### Install PHP (7.x)
```
brew install php
```

#### Install Omeka S
Download Omeka S 2.1.2, extract the contents of the zip file.

#### Configure Apache
In a text editor open `/usr/local/etc/httpd/httpd.conf` and make the following changes:

Document root:
```
DocumentRoot "/usr/local/var/www" -> DocumentRoot "/path/to/omeka-s"
<Directory "/usr/local/var/www"> -> <Directory "/path/to/omeka-s">
```

Inside the previously edited `<Directory "/path/to/omeka-s">`:
```
AllowOverride None ->️ AllowOverride All
```

Uncomment:
```
LoadModule rewrite_module lib/httpd/modules/mod_rewrite.so
```

Permissions:
```
User _www -> User <your-user-name>
Group _www -> Group staff
```

Restart Apache
```
brew services restart httpd
```

Navigate to `http://localhost:8080` to verify the installation was successful.

#### Create a symlink to Neatline plugin
```
ln -s /path/to/neatline-omeka-s /path/to/omeka-s/modules/Neatline
```
**Note:** This will need to be done each time Omeka S is upgraded.

#### Front end
See documentation in [neatline-3](https://github.com/performant-software/neatline-3) repo for getting the Neatline front end up and running.

#### Packaging
To package the module as a zip file, first see front-end instructions for deploying the SPA. Next, from the `/path/to/neatline-omeka-s` directory, run:

```
zip -r Neatline.zip .
```

Follow the Omeka-S instructions for [Installing a Module](https://omeka.org/s/docs/user-manual/modules/#installing-modules).