module.exports = {
    //...
    module: {
        loaders: [
            { test: /\.tpl$/, loader: "underscore-template-loader" }
        ]
    },
};