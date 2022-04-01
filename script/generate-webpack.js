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

fs.writeFile(
    'webpack.mix.js',
    `require('laravel-mix').${getAllPaths('resources')
        .map((file) => {
            if (file.includes('scss')) {
                return `sass('${file}', 'public/scss')`;
            }
            if (file.includes('css')) {
                return `postCss('${file}', 'public/css')`;
            }
            if (file.includes('js')) {
                return `js('${file}', 'public/js')`;
            }
        })
        .sort((a, b) => a.localeCompare(b))
        .join('.\n')}`,
    (err) => {
        if (err) {
            console.error(err);
        }
    }
);
