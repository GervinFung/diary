import fs from 'fs';

const clearBuild = (dir) =>
    fs.readdirSync(dir).map((file) => {
        const path = `${dir}/${file}`;
        const shouldNotRemove =
            !fs.statSync(path).isDirectory() || file === 'storage';
        if (!shouldNotRemove) {
            fs.rm(path, { recursive: true }, (error) =>
                error
                    ? console.error(error)
                    : console.log(
                          `removed bundled/compiled files in ${file}, to be generated later`
                      )
            );
        }
    });

clearBuild('public');
