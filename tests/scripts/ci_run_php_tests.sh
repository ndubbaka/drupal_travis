#!/bin/sh

DB_URL=mysql://$DB_USERNAME@127.0.0.1/$DATABASE

drush --root=../../docroot site-install testing --db-url=$DB_URL --site-name=my-site --yes
drush --root=../../docroot en --yes simpletest
drush --root=../../docroot runserver 127.0.0.1:8083 &
drush --root=../../docroot test-run --uri=http://127.0.0.1:8083
