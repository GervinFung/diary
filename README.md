### Clone

```sh
git clone git@github.com:GervinFung/diary.git
```

## Setup

### Yarn installation

_Assuming you have npm installed locally, if not, please refer to this [guide](https://docs.npmjs.com/downloading-and-installing-node-js-and-npm)_

```sh
npm i -g yarn
```

### Environment variables

_Kindly create your own env file, name it as `.env` according to `.env.example`, because the configuration for everyone might not be the same, causing unnecessary noises in git diff and during code review_

### To install npm dependencies && composer dependencies

```sh
yarn
```

_It will automatically create sym-link for images after installing all dependencies_

### To run watcher and serve php

```sh
yarn start
```

_It will automatically run watch and artisan:serve_

### To reset tables and repopulate

```sh
yarn migrate-refresh-seed
```

### To format or before committing changes

```sh
yarn format
```

### To generate webpack-mix.js

```sh
yarn generate-webpack
```

_It will automatically clear all of the previously compiled files and genereated new one on the fly_

_So, don't bother writing to webpack-mix.js_

## Misc

### To read changes

Read `CHANGE_LOG.md`
