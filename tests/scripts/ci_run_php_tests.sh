#!/bin/sh

DB_URL=mysql://$DB_USERNAME@127.0.0.1/$DATABASE

cd ../../docroot

drush site-install testing --db-url=$DB_URL --site-name=my-site --yes
drush en --yes simpletest
drush runserver 127.0.0.1:8083 &
drush test-run Filter --uri=http://127.0.0.1:8083
