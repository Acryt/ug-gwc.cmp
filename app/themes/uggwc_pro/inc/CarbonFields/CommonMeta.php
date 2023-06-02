<?php

use Carbon_Fields\Field;

/**
 * Summary of CommonMeta
 */

// Вытягиваем массив кастомный

// function test()
// {
// 	$crbar = carbon_get_theme_option('cf_manager');
// 	$names = array();
// 	foreach ($crbar as $key => $value) {
// 		$names[$key] = $value['cf_manager_name'];
// 	}
// 	return $names;
// }


class CommonMeta
{
	public static function generalMeta(): array
	{
		return [
			Field::make('text', 'cf_phone', __('Телефон'))
				->help_text('Указывается глобально для всего сайта')
				->set_width(50),
			Field::make('text', 'cf_whatsapp', __('WhatsApp'))
				->help_text('Указывается глобально для всего сайта')
				->set_width(50),
			Field::make('text', 'cf_mail', __('Почта'))
				->help_text('Указывается глобально для всего сайта')
				->set_width(50),
			Field::make('text', 'cf_address', __('Адрес')),
			Field::make('text', 'cf_work', __('Режим работы')),
			Field::make('text', 'cf_copy', __('Копирайт')),
			Field::make('separator', 'cf_links', __('Социальные сети')),
			Field::make('text', 'cf_facebook', __('Facebook'))
				->set_width(30),
			Field::make('text', 'cf_skype', __('Skype'))
				->set_width(30),
			Field::make('text', 'cf_linkedin', __('LinkedIn'))
				->set_width(30),
			Field::make('text', 'cf_twitter', __('Twitter'))
				->set_width(30),
			Field::make('text', 'cf_instagram', __('Instagram'))
				->set_width(30),
			Field::make("header_scripts", "cf_header_script", __('Head Meta')),
			Field::make("footer_scripts", "cf_footer_script", __('Footer Meta')),
		];
	}
	public static function businesMeta(): array
	{
		return [
			Field::make('text', 'cf_busines_title', __('Заголовок')),
			Field::make('text', 'cf_busines_subtitle', __('Подзаголовок')),
			Field::make('rich_text', 'cf_busines', __('Данные компании'))
				->help_text('Указывается глобально для всего сайта')
				->set_width(50),
		];
	}
	public static function menuMeta(): array
	{
		return [
			Field::make('textarea', 'cf_menu_leis', __('Меню Leistungen')),
			Field::make('textarea', 'cf_menu_lect', __('Меню Lectorat')),
			Field::make('textarea', 'cf_menu_disz', __('Меню "Disziplinen"')),
			Field::make('textarea', 'cf_menu_beis', __('Меню "Beispiele"')),
		];
	}
	public static function selectsMeta(): array
	{
		return [
			Field::make('text', 'cf_select_type_placeholder', __('Плейсхолдер типы работ')),
			Field::make('complex', 'cf_select_type', __('Типы работ (для форм)'))
				->set_layout('tabbed-horizontal')
				->add_fields(
					array(
						Field::make('text', 'cf_select_type_item', __('Пункт'))
					)
				),
			Field::make('text', 'cf_select_specialization_placeholder', __('Плейсхолдер дисциплин/специальностей')),
			Field::make('complex', 'cf_select_specialization', __('Дисциплины (для форм)'))
				->set_layout('tabbed-horizontal')
				->add_fields(
					array(
						Field::make('text', 'cf_select_specialization_item', __('Пункт'))
					)
				),
			Field::make('text', 'cf_select_quote_placeholder', __('Плейсхолдер цитатник')),
			Field::make('complex', 'cf_select_quote', __('Тип цитат (для форм)'))
				->set_layout('tabbed-horizontal')
				->add_fields(
					array(
						Field::make('text', 'cf_select_quote_item', __('Пункт'))
					)
				),
			Field::make('text', 'cf_select_quality_placeholder', __('Плейсхолдер качество работы')),
			Field::make('complex', 'cf_select_quality', __('Качество (для форм)'))
				->set_layout('tabbed-horizontal')
				->add_fields(
					array(
						Field::make('text', 'cf_select_quality_item', __('Пункт'))
					)
				),
			Field::make('text', 'cf_select_calltime_placeholder', __('Плейсхолдер Время связи')),
			Field::make('complex', 'cf_select_calltime', __('Время связи (для форм)'))
				->set_layout('tabbed-horizontal')
				->add_fields(
					array(
						Field::make('text', 'cf_select_calltime_item', __('Пункт'))
					)
				),
			Field::make('complex', 'cf_select_competition', __('Список всех компетенции авторов'))
				->set_layout('tabbed-horizontal')
				->add_fields(
					array(
						Field::make('text', 'cf_select_competition_value', __('Value'))
							->set_required(true),
						Field::make('text', 'cf_select_competition_id', __('ID'))
							->set_required(true),
					)
				),
		];
	}
	public static function managerMeta(): array
	{
		return [
			Field::make('text', 'cf_manager_title', __('Заголовок')),
			Field::make('text', 'cf_manager_subtitle', __('Подзаголовок')),
			Field::make('complex', 'cf_manager', __('Массив менеджеров'))
				->set_layout('tabbed-horizontal')
				->add_fields(
					array(
						Field::make('image', 'cf_manager_photo', __('Фото'))
							->set_value_type('url')
							->set_width(10),
						Field::make('text', 'cf_manager_name', __('Имя'))
							->set_width(30),
						Field::make('text', 'cf_manager_spec', __('Должность'))
							->set_width(20),
						Field::make('text', 'cf_manager_time', __('Режим работы'))
							->set_width(30),
						Field::make('text', 'cf_manager_day', __('Дни работы'))
							->set_width(30),
						Field::make('separator', 'cf_manager_links', __('Контакты')),
						Field::make('text', 'cf_manager_mail', __('eMail'))
							->set_width(30),
						Field::make('text', 'cf_manager_phone', __('Phone'))
							->set_width(30),
						Field::make('text', 'cf_manager_whatsapp', __('WhatsApp'))
							->set_width(30),
						Field::make('text', 'cf_manager_facebook', __('Facebook'))
							->set_width(30),
						Field::make('text', 'cf_manager_skype', __('Skype'))
							->set_width(30),
					)
				),
		];
	}
	public static function clientMeta(): array
	{
		return [
			Field::make('text', 'cf_client_title', __('Заголовок')),
			Field::make('text', 'cf_client_subtitle', __('Подзаголовок')),
			Field::make('complex', 'cf_client', __('Массив по работе с клиентами'))
				->set_layout('tabbed-horizontal')
				->add_fields(
					array(
						Field::make('image', 'cf_client_photo', __('Фото'))
							->set_value_type('url')
							->set_width(10),
						Field::make('text', 'cf_client_name', __('Имя'))
							->set_width(30),
						Field::make('text', 'cf_client_spec', __('Должность'))
							->set_width(20),
						Field::make('text', 'cf_client_time', __('Time'))
							->set_width(30),
						Field::make('text', 'cf_client_day', __('Days'))
							->set_width(30),
						Field::make('text', 'cf_client_work', __('Режим работы'))
							->set_width(30),
						Field::make('separator', 'cf_client_links', __('Контакты')),
						Field::make('text', 'cf_client_mail', __('eMail'))
							->set_width(30),
						Field::make('text', 'cf_client_phone', __('Phone'))
							->set_width(30),
						Field::make('text', 'cf_client_whatsapp', __('WhatsApp'))
							->set_width(30),
						Field::make('text', 'cf_client_facebook', __('Facebook'))
							->set_width(30),
						Field::make('text', 'cf_client_skype', __('Skype'))
							->set_width(30),
					)
				),
		];
	}
	public static function authorMeta(): array
	{
		return [
			Field::make('text', 'cf_author_title', __('Заголовок')),
			Field::make('text', 'cf_author_subtitle', __('Подзаголовок')),
			Field::make('complex', 'cf_author', __('Массив авторов'))
				->set_layout('tabbed-horizontal')
				->add_fields(
					array(
						Field::make('image', 'cf_author_photo', __('Фото'))
							->set_value_type('url')
							->set_width(5),
						Field::make('text', 'cf_author_name', __('Имя'))
							->set_width(10),
						Field::make('text', 'cf_author_rating', __('Рейтинг автора'))
							->set_help_text('0 - 50')
							->set_width(10)
							->set_required(true)
							->set_attribute('type', 'number')
							->set_attribute('min', '0')
							->set_attribute('max', '50'),
						Field::make('text', 'cf_author_review', __('Колличество отзывов'))
							->set_help_text('0 - *****')
							->set_width(10)
							->set_required(true)
							->set_attribute('type', 'number')
							->set_attribute('min', '0'),
						Field::make('text', 'cf_author_orders', __('Заказы автора'))
							->set_help_text('0 - *****')
							->set_width(10)
							->set_required(true)
							->set_attribute('type', 'number')
							->set_attribute('min', '0'),
						Field::make('text', 'cf_author_percent', __('Процент выполненных работ'))
							->set_help_text('0 - 100')
							->set_width(10)
							->set_required(true)
							->set_attribute('type', 'number')
							->set_attribute('min', '0')
							->set_attribute('max', '100'),
						Field::make('radio', 'cf_author_quality', __('Качество'))
							->set_options(
								array(
									'Bachelor' => __('Bachelor'),
									'Doctor' => __('Doctor'),
									'Master' => __('Master'),
								)
							),
						Field::make('multiselect', 'cf_author_competition', __('Selected Options'))
							->set_options(Helpers::get_competition_options()),
					)
				),
		];
	}
	public static function devMeta(): array
	{
		return [
			Field::make('text', 'cf_dev_title', __('Заголовок')),
			Field::make('text', 'cf_dev_subtitle', __('Подзаголовок')),
			Field::make('complex', 'cf_dev', __('Массив маркетинга и разработки'))
				->set_layout('tabbed-horizontal')
				->add_fields(
					array(
						Field::make('image', 'cf_dev_photo', __('Фото'))
							->set_value_type('url')
							->set_width(10),
						Field::make('text', 'cf_dev_name', __('Имя'))
							->set_width(30),
						Field::make('text', 'cf_dev_spec', __('Должность'))
							->set_width(20),
						Field::make('text', 'cf_dev_time', __('Time'))
							->set_width(30),
						Field::make('text', 'cf_dev_day', __('Days'))
							->set_width(30),
						Field::make('text', 'cf_dev_work', __('Режим работы'))
							->set_width(30),
						Field::make('separator', 'cf_dev_links', __('Контакты')),
						Field::make('text', 'cf_dev_mail', __('eMail'))
							->set_width(30),
						Field::make('text', 'cf_dev_phone', __('Phone'))
							->set_width(30),
						Field::make('text', 'cf_dev_whatsapp', __('WhatsApp'))
							->set_width(30),
						Field::make('text', 'cf_dev_facebook', __('Facebook'))
							->set_width(30),
						Field::make('text', 'cf_dev_skype', __('Skype'))
							->set_width(30),
					)
				),
		];
	}
	public static function recruitMeta(): array
	{
		return [
			Field::make('text', 'cf_recruit_title', __('Заголовок')),
			Field::make('text', 'cf_recruit_subtitle', __('Подзаголовок')),
			Field::make('complex', 'cf_recruit', __('Рекрутмент'))
				->set_layout('tabbed-horizontal')
				->add_fields(
					array(
						Field::make('image', 'cf_recruit_photo', __('Фото'))
							->set_value_type('url')
							->set_width(10),
						Field::make('text', 'cf_recruit_name', __('Имя'))
							->set_width(30),
						Field::make('text', 'cf_recruit_spec', __('Должность'))
							->set_width(20),
						Field::make('text', 'cf_recruit_time', __('Time'))
							->set_width(30),
						Field::make('text', 'cf_recruit_day', __('Days'))
							->set_width(30),
						Field::make('text', 'cf_recruit_work', __('Режим работы'))
							->set_width(30),
						Field::make('separator', 'cf_recruit_links', __('Контакты')),
						Field::make('text', 'cf_recruit_mail', __('eMail'))
							->set_width(30),
						Field::make('text', 'cf_recruit_phone', __('Phone'))
							->set_width(30),
						Field::make('text', 'cf_recruit_whatsapp', __('WhatsApp'))
							->set_width(30),
						Field::make('text', 'cf_recruit_facebook', __('Facebook'))
							->set_width(30),
						Field::make('text', 'cf_recruit_skype', __('Skype'))
							->set_width(30),
					)
				),
		];
	}
	public static function bossMeta(): array
	{
		return [
			Field::make('text', 'cf_boss_title', __('Заголовок')),
			Field::make('text', 'cf_boss_subtitle', __('Подзаголовок')),
			Field::make('complex', 'cf_boss', __('Начальство'))
				->set_layout('tabbed-horizontal')
				->add_fields(
					array(
						Field::make('image', 'cf_boss_photo', __('Фото'))
							->set_value_type('url')
							->set_width(10),
						Field::make('text', 'cf_boss_name', __('Имя'))
							->set_width(30),
						Field::make('text', 'cf_boss_spec', __('Должность'))
							->set_width(20),
						Field::make('text', 'cf_boss_time', __('Time'))
							->set_width(30),
						Field::make('text', 'cf_boss_day', __('Days'))
							->set_width(30),
						Field::make('text', 'cf_boss_work', __('Режим работы'))
							->set_width(30),
						Field::make('separator', 'cf_boss_links', __('Контакты')),
						Field::make('text', 'cf_boss_mail', __('eMail'))
							->set_width(30),
						Field::make('text', 'cf_boss_phone', __('Phone'))
							->set_width(30),
						Field::make('text', 'cf_boss_whatsapp', __('WhatsApp'))
							->set_width(30),
						Field::make('text', 'cf_boss_facebook', __('Facebook'))
							->set_width(30),
						Field::make('text', 'cf_boss_skype', __('Skype'))
							->set_width(30),
					)
				),
		];
	}
	public static function switchMeta(): array
	{
		return [
			Field::make('checkbox', 'cf_faq_global', __('Скрыть глобального FAQ на странице')),
		];
	}
	public static function faqMeta(): array
	{
		return [
			Field::make('text', 'cf_faq_title', __('Заголовок')),
			Field::make('text', 'cf_faq_subtitle', __('Подзаголовок')),
			Field::make('complex', 'cf_faq', __('FAQ'))
				->set_layout('tabbed-horizontal')
				->add_fields(
					array(
						Field::make('textarea', 'cf_faq_quest', __('Вопрос'))
							->set_width(40),
						Field::make('rich_text', 'cf_faq_answer', __('Ответ'))
							->set_width(40),
					)
				)
		];
	}
	public static function aboutMeta(): array
	{
		return [
			Field::make('text', 'cf_about_title', __('Заголовок')),
			Field::make('text', 'cf_about_subtitle', __('Подзаголовок')),
			Field::make('rich_text', 'cf_about_text', __('Текст в Комментарий')),
			Field::make('image', 'cf_about_photo', __('Фото'))
				->set_value_type('url')
				->set_width(10),
			Field::make('text', 'cf_about_name', __('ФИО')),
			Field::make('text', 'cf_about_spec', __('Должность')),
		];
	}
	public static function careMeta(): array
	{
		return [
			Field::make('text', 'cf_care_title', __('Заголовок (забота о клиентах)')),
			Field::make('text', 'cf_care_subtitle', __('Подзаголовок')),
			Field::make('text', 'cf_care_text', __('Описание в блочке')),
			Field::make('text', 'cf_care_desc', __('Текст под картинкой')),
		];
	}
	public static function whyMeta(): array
	{
		return [
			Field::make('text', 'cf_why_title', __('Заголовок')),
			Field::make('text', 'cf_why_subtitle', __('Подзаголовок')),
			Field::make('text', 'cf_why_subtitle1', __('Заговок №1'))
				->set_width(30),
			Field::make('text', 'cf_why_subtext1', __('Текст №1'))
				->set_width(70),
			Field::make('text', 'cf_why_subtitle2', __('Заговок №2'))
				->set_width(30),
			Field::make('text', 'cf_why_subtext2', __('Текст №2'))
				->set_width(70),
			Field::make('text', 'cf_why_subtitle3', __('Заговок №3'))
				->set_width(30),
			Field::make('text', 'cf_why_subtext3', __('Текст №3'))
				->set_width(70),
			Field::make('text', 'cf_why_subtitle4', __('Заговок №4'))
				->set_width(30),
			Field::make('text', 'cf_why_subtext4', __('Текст №4'))
				->set_width(70),
			Field::make('text', 'cf_why_subtitle5', __('Заговок №5'))
				->set_width(30),
			Field::make('text', 'cf_why_subtext5', __('Текст №5'))
				->set_width(70),
			Field::make('text', 'cf_why_subtitle6', __('Заговок №6'))
				->set_width(30),
			Field::make('text', 'cf_why_subtext6', __('Текст №6'))
				->set_width(70),
			Field::make('text', 'cf_why_subtitle7', __('Заговок №7'))
				->set_width(30),
			Field::make('text', 'cf_why_subtext7', __('Текст №7'))
				->set_width(70),
			Field::make('text', 'cf_why_subtitle8', __('Заговок №8'))
				->set_width(30),
			Field::make('text', 'cf_why_subtext8', __('Текст №8'))
				->set_width(70),
		];
	}
	public static function whyAuthorMeta(): array
	{
		return [
			Field::make('text', 'cf_why_author_title', __('Заголовок')),
			Field::make('text', 'cf_why_author_subtitle', __('Подзаголовок')),
			Field::make('text', 'cf_why_author_subtitle1', __('Заговок №1'))
				->set_width(30),
			Field::make('text', 'cf_why_author_subtext1', __('Текст №1'))
				->set_width(70),
			Field::make('text', 'cf_why_author_subtitle2', __('Заговок №2'))
				->set_width(30),
			Field::make('text', 'cf_why_author_subtext2', __('Текст №2'))
				->set_width(70),
			Field::make('text', 'cf_why_author_subtitle3', __('Заговок №3'))
				->set_width(30),
			Field::make('text', 'cf_why_author_subtext3', __('Текст №3'))
				->set_width(70),
			Field::make('text', 'cf_why_author_subtitle4', __('Заговок №4'))
				->set_width(30),
			Field::make('text', 'cf_why_author_subtext4', __('Текст №4'))
				->set_width(70),
			Field::make('text', 'cf_why_author_subtitle5', __('Заговок №5'))
				->set_width(30),
			Field::make('text', 'cf_why_author_subtext5', __('Текст №5'))
				->set_width(70),
			Field::make('text', 'cf_why_author_subtitle6', __('Заговок №6'))
				->set_width(30),
			Field::make('text', 'cf_why_author_subtext6', __('Текст №6'))
				->set_width(70),
			Field::make('text', 'cf_why_author_subtitle7', __('Заговок №7'))
				->set_width(30),
			Field::make('text', 'cf_why_author_subtext7', __('Текст №7'))
				->set_width(70),
			Field::make('text', 'cf_why_author_subtitle8', __('Заговок №8'))
				->set_width(30),
			Field::make('text', 'cf_why_author_subtext8', __('Текст №8'))
				->set_width(70),
		];
	}
	public static function howMeta(): array
	{
		return [
			Field::make('text', 'cf_how_title', __('Заголовок')),
			Field::make('text', 'cf_how_subtitle', __('Подзаголовок')),
			Field::make('text', 'cf_how_subtitle1', __('Заговок №1'))
				->set_width(30),
			Field::make('text', 'cf_how_subtext1', __('Текст №1'))
				->set_width(70),
			Field::make('text', 'cf_how_subtitle2', __('Заговок №2'))
				->set_width(30),
			Field::make('text', 'cf_how_subtext2', __('Текст №2'))
				->set_width(70),
			Field::make('text', 'cf_how_subtitle3', __('Заговок №3'))
				->set_width(30),
			Field::make('text', 'cf_how_subtext3', __('Текст №3'))
				->set_width(70),
			Field::make('text', 'cf_how_subtitle4', __('Заговок №4'))
				->set_width(30),
			Field::make('text', 'cf_how_subtext4', __('Текст №4'))
				->set_width(70),
		];
	}
	public static function snippetMeta(): array
	{
		return [
			Field::make('text', 'cf_snippet_title', __('Заголовок')),
			Field::make('text', 'cf_snippet_subtitle', __('Подзаголовок')),
			Field::make('text', 'cf_snippet_text', __('Текст')),
		];
	}
	public static function guarantMeta(): array
	{
		return [
			Field::make('text', 'cf_guarant_title', __('Заголовок')),
			Field::make('text', 'cf_guarant_subtitle', __('Подзаголовок')),
			Field::make('text', 'cf_guarant_subtitle1', __('Заговок №1'))
				->set_width(20),
			Field::make('textarea', 'cf_guarant_subtext1', __('Текст №1'))
				->set_width(30),
			Field::make('textarea', 'cf_guarant_annotation1', __('Аннотация №1'))
				->set_width(40),
			Field::make('text', 'cf_guarant_subtitle2', __('Заговок №2'))
				->set_width(20),
			Field::make('textarea', 'cf_guarant_subtext2', __('Текст №2'))
				->set_width(30),
			Field::make('textarea', 'cf_guarant_annotation2', __('Аннотация №2'))
				->set_width(40),
			Field::make('text', 'cf_guarant_subtitle3', __('Заговок №3'))
				->set_width(20),
			Field::make('textarea', 'cf_guarant_subtext3', __('Текст №3'))
				->set_width(30),
			Field::make('textarea', 'cf_guarant_annotation3', __('Аннотация №3'))
				->set_width(40),
			Field::make('text', 'cf_guarant_subtitle4', __('Заговок №4'))
				->set_width(20),
			Field::make('textarea', 'cf_guarant_subtext4', __('Текст №4'))
				->set_width(30),
			Field::make('textarea', 'cf_guarant_annotation4', __('Аннотация №4'))
				->set_width(40),
			Field::make('text', 'cf_guarant_subtitle5', __('Заговок №5'))
				->set_width(20),
			Field::make('textarea', 'cf_guarant_subtext5', __('Текст №5'))
				->set_width(30),
			Field::make('textarea', 'cf_guarant_annotation5', __('Аннотация №5'))
				->set_width(40),
			Field::make('text', 'cf_guarant_subtitle6', __('Заговок №6'))
				->set_width(20),
			Field::make('textarea', 'cf_guarant_subtext6', __('Текст №6'))
				->set_width(30),
			Field::make('textarea', 'cf_guarant_annotation6', __('Аннотация №6'))
				->set_width(40),
		];
	}
	public static function firstMeta(): array
	{
		return [
			Field::make('text', 'cf_first_title', __('Заголовок раздела')),
			Field::make('textarea', 'cf_first_desc', __('Описание раздела')),
		];
	}
	public static function contentMeta(): array
	{
		return [
			Field::make('text', 'cf_content_title', __('Заголовок Контента')),
			Field::make('textarea', 'cf_content_subtitle', __('Подзаголовок Контента')),
			Field::make('complex', 'cf_content', __('Повторитель контента'))
				->set_layout('tabbed-horizontal')
				->set_max(5)
				->add_fields(
					array(
						Field::make('rich_text', 'cf_content_content', __('Блок')),
					)
				)
		];
	}
	public static function reviewMeta(): array
	{
		return [
			Field::make('text', 'cf_review_title', __('Заголовок для малого блока')),
			Field::make('text', 'cf_review_subtitle', __('Подзаголовок')),
			Field::make('separator', 'cf_ri', __('Отзывы с текстом')),
			Field::make('text', 'cf_review_txt_title', __('Заголовок перед текстовыми ревью')),
			Field::make('text', 'cf_review_txt_subtitle', __('Подзаголовок')),
			Field::make('complex', 'cf_review', __('Отзывы'))
				->set_layout('tabbed-horizontal')
				->add_fields(
					array(
						Field::make('text', 'cf_review_name', __('Имя пользователя'))
							->set_width(20),
						Field::make('text', 'cf_review_city', __('Страна пользователя'))
							->set_width(20),
						Field::make('text', 'cf_review_rating', __('Оценка'))
							->set_help_text('Rating')
							->set_label('label')
							->set_width(10)
							->set_required(true)
							->set_attribute('type', 'number')
							->set_attribute('min', '0')
							->set_attribute('max', '10'),
						Field::make('date', 'cf_review_date', 'Дата отзыва')
							->set_attribute('placeholder', __('Дата оставления пользователем отзыва'))
							->set_width(20),
						Field::make('text', 'cf_review_ttl', __('Заголовок отзыва'))
							->set_width(20),
						Field::make('textarea', 'cf_review_text', 'Сам отзыв')
							->set_width(100),
					)
				),
			Field::make('separator', 'cf_rit', __('Отзывы изображениями')),
			Field::make('text', 'cf_review_img_title', __('Заголовок перед скринами')),
			Field::make('text', 'cf_review_img_subtitle', __('Подзаголовок')),
			Field::make('complex', 'cf_review_img', __('Повторитель'))
				->set_layout('tabbed-horizontal')
				->add_fields(
					array(
						Field::make('image', 'cf_review_img_item', __('Картинка'))
							->set_value_type('url')
							->set_type('image'),
					)
				),
			Field::make('separator', 'cf_rat', __('Рейтинги')),
			Field::make('text', 'cf_rating_one', __('Оценка Google'))
				->set_help_text('до 5'),
			Field::make('text', 'cf_rating_two', __('Оценка ProvenExpert'))
				->set_help_text('до 5'),
			Field::make('text', 'cf_rating_three', __('Оценка на сайте'))
				->set_help_text('до 5'),
		];
	}
	public static function seoMeta(): array
	{
		return [
			Field::make('text', 'cf_seo_title', __('Заголовок')),
			Field::make('text', 'cf_seo_subtitle', __('Подзаголовок')),
			Field::make('complex', 'cf_seo', __('Блоки SEO (создаются по два)'))
				->set_layout('tabbed-horizontal')
				->add_fields(
					array(
						Field::make('rich_text', 'cf_seo_one', __('Контент левый блок'))
							->set_width(50),
						Field::make('rich_text', 'cf_seo_two', __('Контент левый блок'))
							->set_width(50),
					)
				)
		];
	}
	public static function designMeta(): array
	{
		return [
			Field::make('text', 'cf_design_title', __('Заголовок раздела')),
			Field::make('rich_text', 'cf_design_desc', __('Описание раздела')),
			Field::make('text', 'cf_design_num1', __('Число №1'))
				->set_width(30),
			Field::make('text', 'cf_design_subnum1', __('Описание под числом №1'))
				->set_width(70),
			Field::make('text', 'cf_design_num2', __('Число №2'))
				->set_width(30),
			Field::make('text', 'cf_design_subnum2', __('Описание под числом №2'))
				->set_width(70),
		];
	}
	public static function quotaMeta(): array
	{
		return [
			Field::make('text', 'cf_quota_hltext', __('Выделеный текст в блоке')),
			Field::make('text', 'cf_quota_text', __('Обычный текст в блоке')),
		];
	}
	public static function servicesMeta(): array
	{
		return [
			Field::make('image', 'cf_services_image', __('Картинка'))
				->set_type('image')
				->set_width(20),
			Field::make('text', 'cf_services_title', __('Заголовок'))
				->set_width(80),
			Field::make('complex', 'cf_services', __('Ссылочки (рядом с картинкой)'))
				->add_fields([
					Field::make('text', 'title', __('Заголовок'))
						->set_width(30),
					Field::make('text', 'url', __('Адрес'))
						->set_width(70),
				])
		];
	}
	public static function projectsMeta(): array
	{
		return [
			Field::make('text', 'cf_projects_title', __('Заголовок')),
			Field::make('text', 'cf_projects_desc', __('Текст')),
			Field::make('complex', 'cf_projects', __('Слайдер Projects'))
				->add_fields([
					Field::make('image', 'image', __('Картинка'))
						->set_type('image')
						->set_value_type('url')
						->set_required(true)
						->set_width(20),
					Field::make('text', 'title', __('Заголовок'))
						->set_width(30),
					Field::make('text', 'adress', __('Адрес дома'))
						->set_width(30),
					Field::make('text', 'year', __('Год'))
						->set_width(10),
					Field::make('text', 'url', __('Ссылка')),
				])
		];
	}
	public static function workMeta(): array
	{
		return [
			Field::make('text', 'cf_work_title', __('Заголовок')),
			Field::make('complex', 'cf_work', __('Список'))
				->add_fields([
					Field::make('image', 'image', __('Картинка'))
						->set_type('image')
						->set_value_type('url')
						->set_required(true)
						->set_width(20),
					Field::make('text', 'title', __('Заголовок'))
						->set_width(40),
					Field::make('text', 'url', __('Ссылка'))
						->set_width(40),
					Field::make('text', 'text', __('Текст под картинкой'))
						->set_width(40),
				])
		];
	}
	public static function priceMeta(): array
	{
		return [
			Field::make('text', 'cf_price_title', __('Заголовок прайса')),
			Field::make('text', 'cf_price_subtitle', __('Подаголовок прайса')),
			Field::make('text', 'cf_price_btn', __('Текст на Кнопке')),
			Field::make('complex', 'cf_price', __('Список'))
				->set_max(4)
				->add_fields([
					// Field::make('text', 'title', __('Заголовок'))
					// 	->set_width(40),
					// Field::make('text', 'subtitle', __('Мелким шрифтом'))
					// 	->set_width(40),
					Field::make('text', 'cost', __('Цена'))
						->set_width(40),
					// Field::make('text', 'custom1', __('Изменяющийся пункт'))
					// 	->set_width(40),
				])
		];
	}
	public static function blogMeta(): array
	{
		return [
			Field::make('text', 'cf_blog_title', __('Заголовок')),
			Field::make('text', 'cf_blog_desc', __('Текст')),
		];
	}
	public static function promoMeta(): array
	{
		return [
			Field::make('text', 'cf_promo_title', __('Заголовок Предложений')),
			Field::make('text', 'cf_promo_subtitle', __('Подаголовок Предложений')),
			Field::make('complex', 'cf_promo', __('Список'))
				->add_fields([
					Field::make('text', 'title', __('Заголовок'))
						->set_width(20),
					Field::make('text', 'hashtag', __('Хештеги'))
						->set_width(20),
					Field::make('rich_text', 'text', __('Само предложение'))
						->set_width(50),
					Field::make('image', 'image', __('Картинка'))
						->set_type('image')
						->set_value_type('url')
						->set_width(10),
				])
		];
	}
}