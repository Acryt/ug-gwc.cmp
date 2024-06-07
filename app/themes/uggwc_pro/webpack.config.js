const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const autoprefixer = require("autoprefixer");

module.exports = {
	mode: "production",
	// mode: "development",
	entry: {
		main: path.resolve(__dirname, "./src/main.js"),
		header: path.resolve(__dirname, "./src/header.js"),
		faq: path.resolve(__dirname, "./src/faq.js"),
		about: path.resolve(__dirname, "./src/scss/parts/section-about.scss"),
		process: path.resolve(__dirname, "./src/scss/parts/section-process.scss"),
		abauthor: path.resolve(__dirname, "./src/scss/parts/section-author-about.scss"),
		aauthor: path.resolve(__dirname, "./src/scss/parts/section-author-all.scss"),
		promo: path.resolve(__dirname, "./src/scss/parts/section-promo.scss"),
		price: path.resolve(__dirname, "./src/scss/parts/section-price.scss"),
		ptable: path.resolve(__dirname, "./src/scss/parts/section-price-table.scss"),
		pltable: path.resolve(__dirname, "./src/scss/parts/section-price-table-l.scss"),
		paccrd: path.resolve(__dirname, "./src/scss/parts/section-price-accrd.scss"),
		sw_authors: path.resolve(__dirname, "./src/scss/parts/swiper-authors.scss"),
		sw_review: path.resolve(__dirname, "./src/scss/parts/swiper-review.scss"),
		sw_review_alt: path.resolve(__dirname, "./src/scss/parts/swiper-review-alt.scss"),
		sw_photo: path.resolve(__dirname, "./src/scss/parts/swiper-photo.scss"),
		sw_sp: path.resolve(__dirname, "./src/scss/parts/swiper-same-posts.scss"),
		blog: path.resolve(__dirname, "./src/scss/parts/blog.scss"),
	},
	output: {
		path: path.resolve(__dirname, "./assets/"),
		filename: "[name].bundle.js",
	},
	// devtool: 'source-map',
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
					{
						loader: MiniCssExtractPlugin.loader,
						options: {
							
						}
					},
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
