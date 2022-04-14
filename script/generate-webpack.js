import fs from 'fs';

const getAllPaths = (dir) =>
    fs.readdirSync(dir).flatMap((file) => {
        const path = `${dir}/${file}`;
        if (fs.statSync(path).isDirectory()) {
            return getAllPaths(path);
        }
        const extension =
            path.includes('css') ||
            path.includes('js') ||
            path.includes('scss');
        return extension ? [path] : [];
    });

const mapResourceToPublic = (file, type) =>
    `${type}('${file}', '${file
        .replace('resources', 'public')
        .split('/')
        .filter((_, i, arr) => i !== arr.length - 1)
        .join('/')}')`;

fs.writeFile(
    'webpack.mix.js',
    `
      const { exec } = require('child_process');
      const mix = require('laravel-mix');

      mix.before(() => exec('node script/clear-compiled.js')).${getAllPaths(
          'resources'
      )
          .map((file) => {
              if (file.includes('scss')) {
                  return mapResourceToPublic(file, 'sass');
              }
              if (file.includes('css')) {
                  return mapResourceToPublic(file, 'postCss');
              }
              if (file.includes('js')) {
                  return mapResourceToPublic(file, 'js');
              }
          })
          .sort((a, b) => a.localeCompare(b))
          .join('.\n')}`,
    (err) =>
        err ? console.error(err) : console.log('webpack-mix.js generated')
);
