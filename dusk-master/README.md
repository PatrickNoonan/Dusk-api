# Dusk

## Setup

Pull the repository: `git clone git@github.com:DeltaDefense/dusk.git project-name`

Enter the project directory: `cd project-name`

Remove vcs reference: `rm -rf .git`

Create environment file: `cp .env.example .env`

Install dependencies: `composer install`

Start containers: `/.run up`

## Docker

4 containers will be created by default: web (port 8000), worker, mysql (port 3306), redis (port 6379).  The default
local ports for each container can be changed in the docker-compose.local.yml file.  

## Core Documentation

[https://github.com/DeltaDefense/dusk-core/blob/master/README.md](https://github.com/DeltaDefense/dusk-core/blob/master/README.md)