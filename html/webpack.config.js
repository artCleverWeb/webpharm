const path = require('path');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const autoprefixer = require('autoprefixer');
const CopyPlugin = require("copy-webpack-plugin");
const webpack = require('webpack');
const fs = require('fs');

const pages = [
    'pages.html',
    'index.html',
    'index_employee-experienced.html',
    'articles.html',
    'articles-category.html',
    'articles-category-1.html',
    'articles-category-2.html',
    'articles-article.html',
    'articles-article-1.html',
    'journal.html',
    'events.html',
    'authorization.html',
    'registration.html',
    'user-choice.html',
    'cabinet.html',
    'cabinet-user-change.html',
    'cabinet-wallet.html',
    'search.html',
];

var plugins = [
    new MiniCssExtractPlugin({
        filename: 'css/[name].css' // .[contenthash]
    }),
    new CopyPlugin({
        patterns: [
            //{ from: './dev/fonts', to: 'fonts' },
            { from: './dev/images', to: 'images' },
            { from: './dev/upload', to: 'upload' },
            { from: './dev/favicon', to: 'favicon' },
            { from: './dev/loaded', to: 'loaded' },
            { from: './dev/pdfjs', to: 'pdfjs' },
        ],
    }),
    new webpack.ProvidePlugin({
        $: "jquery",
        jQuery: "jquery"
    })
];

/*fs.readdir('./dev/', (err, files) => {
    files.forEach(file => {
        if (/\.(html|hbs)$/.test(file)) {
            console.log(file);
            pages.push(file);
        }
    });

    console.log(pages)
});*/

pages.forEach((page, index) => {
    var pageHtmlWebpackPlugin = new HtmlWebpackPlugin({
        template: path.resolve(__dirname, `./dev/${page}`),
        filename: page,
        minify: false,
    });

    plugins.push(pageHtmlWebpackPlugin);

    // console.log(page);
});

var rules = [
    {
        test: /\.(css|scss)$/,
        use: [
            // process.env.NODE_ENV === 'production' ? MiniCssExtractPlugin.loader : 'style-loader',
            MiniCssExtractPlugin.loader,
            {
                loader: 'css-loader',
                options: {
                    url: false
                }
            },
            {
                loader: 'postcss-loader',
                options: {
                    postcssOptions: {
                        plugins: [
                            [
                                'autoprefixer', {
                                    overrideBrowserslist:  ['last 2 versions'],
                                },
                            ],
                        ],
                    },
                },
            },
            'sass-loader'
        ],
    },
    {
        test: /\.(js)$/,
        use: {
            loader: 'babel-loader',
            options: {
                presets: ['@babel/preset-env']
            }
        }
    },
    {
        test: /\.(hbs|html)/,
        loader: "handlebars-template-loader",
        options: {
            attributes: []
        },
    },
];

module.exports = {
    mode: process.env.NODE_ENV === 'production' ? 'production' : 'development',
    entry: ['./dev/js/main.js', './dev/scss/main.scss'],
    module: {
        rules: rules,
    },
    output: {
        path: path.resolve(__dirname, '../assets'),
        filename: 'js/[name].bundle.js', // .[contenthash]
    },
    plugins: plugins,
    devServer: {
        watchFiles: ['./dev/**/*'], // string [string] object [object]
        port: 3000,
        open: true,
        hot: true,
    },
    optimization: {
        runtimeChunk: 'single',
        splitChunks: {
            cacheGroups: {
                vendor: {
                    test: /[\\/]node_modules[\\/]/,
                    name: 'vendors',
                    chunks: 'all'
                }
            }
        }
    },
}

console.log(process.env.NODE_ENV === 'production' ? 'Production build' : 'Development start');