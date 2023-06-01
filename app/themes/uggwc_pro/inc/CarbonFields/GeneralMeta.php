<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class GeneralMeta
{
	public function __construct()
	{
		add_action('carbon_fields_register_fields', [$this, 'generalOptionsMeta']);
	}

	public function generalOptionsMeta()
	{
		Container::make('theme_options', __('Options'))
			->add_tab(__('Global Options'), CommonMeta::generalMeta())
			->add_tab(__('Busines'), CommonMeta::businesMeta())
			->add_tab(__('Menu'), CommonMeta::menuMeta())
			->add_tab(__('Selectors'), CommonMeta::selectsMeta())
			->add_tab(__('Managers'), CommonMeta::managerMeta())
			->add_tab(__('Client'), CommonMeta::clientMeta())
			->add_tab(__('Author'), CommonMeta::authorMeta())
			->add_tab(__('Marketing/DEV'), CommonMeta::devMeta())
			->add_tab(__('Recruitment'), CommonMeta::recruitMeta())
			->add_tab(__('Bosses'), CommonMeta::bossMeta())
			->add_tab(__('FAQ'), CommonMeta::faqMeta())
			->add_tab(__('Review'), CommonMeta::reviewMeta())
			->add_tab(__('About/Impressum'), CommonMeta::aboutMeta())
			->add_tab(__('Why Us'), CommonMeta::whyMeta())
			->add_tab(__('How It Works'), CommonMeta::howMeta())
			->add_tab(__('Guaranties'), CommonMeta::guarantMeta())
			->add_tab(__('Taking Care'), CommonMeta::careMeta())
			->add_tab(__('Why Us (Authors)'), CommonMeta::whyAuthorMeta())
			->add_tab(__('Snippet'), CommonMeta::snippetMeta())
			->add_tab(__('Promo'), CommonMeta::promoMeta());
	}
}

new GeneralMeta();