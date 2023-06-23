<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class UserMeta
{
    public function __construct()
    {
        add_action('carbon_fields_register_fields', [$this, 'addFields']);
    }

    public function addFields()
    {
        Container::make('user_meta', 'carbon_fields_container_user_meta', 'Настройки пользователя')
            ->add_fields([
                Field::make('image', 'cf_user_avatar', 'Фотография пользователя')
                    ->set_value_type('url')
						  ->set_width(10),
                Field::make('rich_text', 'cf_user_short', 'Описание пользователя'),
                Field::make('text', 'cf_user_title', 'Должность'),
            ])
        ;
    }
}

new UserMeta();