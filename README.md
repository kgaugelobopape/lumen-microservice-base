# Lumen Microservice Base

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://img.shields.io/packagist/v/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://img.shields.io/packagist/l/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax.

### Run docker
1. Clone the repo and ``cd`` in to it.
2. Make sure you have docker installed
3. Run ``docker-compose up -d --build``
4. Default DB connection is ``sqlite``, make changes to the ``.env`` file for your app.

### Run traditionally
1. ``cd`` into src folder of cloned repo
2. Run ``php -S localhost:8000 -t public``
3. Switch to browser of your choice and go to ``http://localhost:8000``  

### Kubernetes
First, login to docker hub ``docker login`` and follow the steps.

Secondly, build the image and push to docker registry
``docker build -t registry-url/project-path .`` and
``docker push registry-url/project-path``

In kube folder, I have added 2 files, 
1. To register the service ``service.yml``, please update service name
2. To deploy service container ``deployment.yml``, please update registry and image name.

### License

The Lumen framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
