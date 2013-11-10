HOST := $(shell hostname -s)

default: build
dev:     preview

build:
	npm install
	bower install
	grunt

preview:
	php -S localhost:8088