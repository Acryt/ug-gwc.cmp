<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class PageMeta
{
	public function __construct()
	{
		add_action('carbon_fields_register_fields', [$this, 'pageMeta']);
		add_action('carbon_fields_register_fields', [$this, 'postMeta']);
	}

	public function pageMeta()
	{
		Container::make('post_meta', 'cf_page', 'Page Options')
			->set_context('carbon_fields_after_title')
			->where('post_type', '=', 'page')
			->add_tab(__('Switches'), CommonMeta::switchMeta())
			->add_tab(__('Meta'), CommonMeta::metaMeta())
			->add_tab(__('First Screen'), CommonMeta::firstMeta())
			->add_tab(__('FAQ'), CommonMeta::faqMeta())
			->add_tab(__('Content'), CommonMeta::contentMeta())
			->add_tab(__('SEO x2'), CommonMeta::seoMeta())
			->add_tab(__('Price'), CommonMeta::priceMeta())
			
		;
	}
	public function postMeta()
	{
		Container::make('post_meta', 'cf_post', 'Post Options')
			->set_context('carbon_fields_after_title')
			->where('post_type', '=', 'post')
			->add_tab(__('Switches'), CommonMeta::switchMeta())
			->add_tab(__('First Screen'), CommonMeta::firstMeta())
			->add_tab(__('FAQ'), CommonMeta::faqMeta())
			->add_tab(__('Content'), CommonMeta::contentMeta())
			->add_tab(__('SEO x2'), CommonMeta::seoMeta())
		;
	}
}

new PageMeta();