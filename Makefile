all: install test

.PHONY: install test

install:
	npm install

test:
	node_modules/.bin/gulp --gulpfile docroot/sites/all/themes/neato/STARTER/Gulpfile.js
