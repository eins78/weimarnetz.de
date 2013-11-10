HOST := $(shell hostname -s)

default: build
dev:     preview

build:
	npm install
	bower install
	grunt

preview:
	cd public_html && php -S localhost:8088