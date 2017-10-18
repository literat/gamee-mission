# Gamee Mission

Implementation of test case for [Gamee App](https://www.gameeapp.com/).

You should create two API endpoits - one for storing a gamescore, second for providing top 10 players in particular game (game ID is specified in request parameters).

Client (JavaScript) creates a xhr request on this api endpoint and uses jsonrpc schema (http://www.jsonrpc.org/specification).

Request payload is carrying game ID (int), user ID (int) and game score (int),

PHP application receives this request, stores gameplay data into the game leaderboard and returns a success response.

It doesn't matter whether the application runs on php fpm, some php server or anything different

Technical requirements:
* Use nette/di
* Storing leaderboards into suitable Redis (screw data persistency) structure

Input data validation:
* It is required of you to validate input data
* Again, use jsonrpc in validation (and other) error responses

Bonus points:
* It would be cool for use to just clone a git repo, write `docker-compose up`
* It would be even more cool for the players to have the same ranking as other people with the same score :P

## Instalation

Run `composer install` after cloning this project.

## Development

### API

Read `postman_collection.json` for more information.

* `/scores` - Endpoint for data storing.
* `/games` - Endpoint for data fetching.

### Servers

#### Local

Require installed docker engine and docker-compose [release notes](https://docs.docker.com/release-notes/)

**Url**
* `localhost:8080`

**Composer scripts**

* `composer drun` run local dev server
* `composer drb` rebuild local dev server
* `composer dkill` kill local dev server
* `composer drm` remove local dev server
* `composer dps` list instances on local dev server
