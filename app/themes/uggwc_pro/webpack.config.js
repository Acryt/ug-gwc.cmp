const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const autoprefixer = require("autoprefixer");

module.exports = {
	mode: "production",
	entry: {
		main: path.resolve(__dirname, "./src/main.js"),
	},
	output: {
		path: path.resolve(__dirname, "./assets/"),
		filename: "[name].bundle.js",
	},
	module: {
		rules: [
			{
				test: /\.(?:js|mjs|cjs)$/,
				exclude: /node_modules/,
				use: {
					loader: "babel-loader",
					options: {
						presets: [["@babel/preset-env", { targets: "defaults" }]],
					},
				},
			},
		],
		rules: [
			{
				test: /\.(sa|sc|c)ss$/,
				use: [
					MiniCssExtractPlugin.loader,
					{
						loader: "css-loader",
						options: {
							modules: false,
						}
					},
					{
						loader: "postcss-loader",
						options: {
							postcssOptions: {
								plugins: [
									[
										"autoprefixer",
										{
											// Options
										},
									],
								],
							},
						},
					},
					{
						loader: "sass-loader",
						options: {
							// Prefer `dart-sass`
							implementation: require("sass"),
							//   sassOptions: {
							// 	fiber: require('fibers'),
							//  },
						},
					},
				],
			},
		],
	},
	devServer: {
		static: {
			directory: path.join(__dirname, "/"),
		},
		hot: true,
	},
	plugins: [
		new MiniCssExtractPlugin({
			filename: "[name].bundle.css",
		}),
	],
};
