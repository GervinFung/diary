### Clone

```sh
git clone git@github.com:GervinFung/diary.git
```

## Setup

### To install npm dependencies && composer dependencies

```sh
yarn
```

_It will automatically create sym-link for images after installing dependencies_

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

_Don't bother writing to webpack-mix.js, it will auto generate based on the files in resources folder_

_Also, run `yarn start` again whenever you add new files to resources_

## Misc

### To read changes

Read `CHANGE_LOG.md`
