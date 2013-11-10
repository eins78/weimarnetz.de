# [weimarnetz.de](http://weimarnetz.de)

[![Build Status](https://travis-ci.org/eins78/weimarnetz.de.png?branch=master)](https://travis-ci.org/eins78/weimarnetz.de)

## Deploy

- dependencies (one-time):
    - install `nodejs` (includes `npm`)
    - `$ sudo npm install -g bower grunt`
    
- generate site
    - `$ make`
    - site will be in `/path/to/repo/public_html`

## PHP

- `$ make preview` runs local php server
- php includes starting with `_` are required for every page: `_head` and `_foot`
- all other includes are just content


## TODO

- /status: check ajax reloader…
- `.row`s und `.col-*`s mit partials machen
- include /statusTable in /status