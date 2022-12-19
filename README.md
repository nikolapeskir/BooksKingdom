# BooksKingdom
###the best books you can find

###Prerequisites
* bash
* docker
* makefile
* modify host file

###App Install

* Add the new value in your host file
`
127.0.0.1 local.bookskingdom.io
`
* open Bash console in the root app directory `/` and type `make install`
* wait until backend & frontend fully booted
* test out the app on http://local.bookskingdom.io:8082/
---
###TO-DO Improvements
####Backend
* Create an endpoint for multiple-delete
* Create an endpoint for multiple-update
* Create an endpoint for user account update
* Create tag system (Model,Controller,Routes,Policies)
* Improve speed (Caching,Laravel Octane,Optimize queries)
####Frontend
* Improve app messages & errors alerts
* Sort & Filter by book Owner
---

###Commands
* All commands can be found in:
* /Makefile
* /backend/laradock/Makefile
* /frontend/Makefile