const path = require('path');
const fs = require('fs');
const TerserPlugin = require('terser-webpack-plugin');

const getDirectories = source =>
    fs.readdirSync(source, { withFileTypes: true })
        .filter(dirent => dirent.isDirectory())
        .map(dirent => dirent.name);

// Set blocks containing dir
const baseDir = path.resolve(__dirname, 'blocks');
const directories = getDirectories(baseDir);

// Set path to index.js
const entry = directories.reduce((entries, dir) => {
    const fullPath = path.join(baseDir, dir);
    entries[dir] = `${fullPath}/assets/js/index.js`;
    return entries;
}, {});

module.exports = (env, argv) => {
    const isProduction = argv.mode === 'production';

    return {
        mode: isProduction ? 'production' : 'development',
        entry: entry,
        output: {
            filename: isProduction ? '[name]/dist/bundle.js' : '[name]/dist/bundle.js',
            path: baseDir
        },
        module: {
            rules: [
                {
                    test: /\.js$/,
                    exclude: /node_modules/,
                    use: {
                        loader: 'babel-loader',
                        options: {
                            presets: ['@babel/preset-env']
                        }
                    }
                },
                {
                    test: /\.scss$/,
                    use: [
                        'style-loader',
                        'css-loader',
                        'sass-loader'
                    ]
                }
            ]
        },
        plugins: [
        ],
        optimization: {
            minimize: isProduction,
            minimizer: [new TerserPlugin({
                terserOptions: {
                    compress: {
                        drop_console: true // Removes console.logs from prod
                    }
                }
            })],
        },
        watch: !isProduction,
    };
};
