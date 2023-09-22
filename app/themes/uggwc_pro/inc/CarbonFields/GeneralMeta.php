<?php

use Carbon_Fields\Container;

class GeneralMeta
{
	public function __construct ()
	{
		add_action('carbon_fields_register_fields', [$this, 'generalOptionsMeta']);
		add_action('carbon_fields_theme_options_container_saved', [$this, 'generate_authors_xml']); // генерация sitemap авторов
	}

	public function generalOptionsMeta ()
	{
		Container::make('theme_options', __('Options'))
			->add_tab(__('Global Options'), CommonMeta::generalMeta())
			->add_tab(__('Busines'), CommonMeta::businesMeta())
			->add_tab(__('Menu'), CommonMeta::menuMeta())
			->add_tab(__('MP'), CommonMeta::managerMeta())
			->add_tab(__('MO'), CommonMeta::clientMeta())
			->add_tab(__('MA'), CommonMeta::recruitMeta())
			->add_tab(__('SEO/DEV'), CommonMeta::devMeta())
			->add_tab(__('Bosses'), CommonMeta::bossMeta())
			->add_tab(__('FAQ'), CommonMeta::faqMeta())
			->add_tab(__('Accordion'), CommonMeta::accrdMeta())
			->add_tab(__('Review'), CommonMeta::reviewMeta())
			->add_tab(__('About/Impressum'), CommonMeta::aboutMeta())
			->add_tab(__('Why Us'), CommonMeta::whyMeta())
			->add_tab(__('How It Works'), CommonMeta::howMeta())
			->add_tab(__('Guaranties'), CommonMeta::guarantMeta())
			->add_tab(__('Taking Care'), CommonMeta::careMeta())
			->add_tab(__('Why Us (Authors)'), CommonMeta::whyAuthorMeta())
			->add_tab(__('Snippet'), CommonMeta::snippetMeta())
			->add_tab(__('Promo'), CommonMeta::promoMeta())
			->add_tab(__('Selectors'), CommonMeta::selectsMeta())
		;
		Container::make('theme_options', __('Authors'))
			->add_tab(__('Authors'), CommonMeta::authorMeta())
		;
		Container::make('theme_options', __('FAQ'))
			->add_tab(__('FAQ'), CommonMeta::faqAccrdMeta())
		;
	}

	public function generate_authors_xml ()
	{
		if (strpos($_REQUEST['page'], 'container_authors') !== false) {
			// Получите данные авторов из вашей базы данных или другого источника данных
			$authors = carbon_get_theme_option('cf_author');

			// Создайте объект SimpleXMLElement
			$xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?>
	<?xml-stylesheet type="text/xsl" href="//ug-gwc.cmp/main-sitemap.xsl"?>
	<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd http://www.google.com/schemas/sitemap-image/1.1 http://www.google.com/schemas/sitemap-image/1.1/sitemap-image.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
	</urlset>
');

			// Проходите по каждому автору и добавляйте данные в XML
			foreach ($authors as $author) {
				$url_element = $xml->addChild('url');
				$url_element->addChild('loc', 'http://ug-gwc.cmp/autoren/' . $author['cf_author_id']);
				$url_element->addChild('lastmod', date('Y-m-d\TH:i:s\Z'));
			}

			// Сохраните XML в файл authors.xml
			$xml->asXML($_SERVER['DOCUMENT_ROOT'] . '/authors.xml');
		}
	}
}

new GeneralMeta();