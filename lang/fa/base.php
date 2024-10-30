<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Base Panelio Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during Panelio for
    | various messages that we need to display to the user.
    |
    */

    "exceptions" => [
        "panel_not_found" => "پنل :panel موجود نیست.",
        "section_in_panel_not_found" => "بخش :section در پنل :panel موجود نیست.",
        "menu_in_section_panel_not_found" => "منو :menu_name در بخش :section در پنل :panel موجود نیست.",
        "button_not_found" => "دکمه :button موجود نیست.",
    ],

    'section' => [
        'dashboard' => [
            'name' => 'داشبورد',
            'title' => 'گزارشات ویژه',
        ],
        'panels' => [
            'name' => 'پنل ها',
            'title' => 'پنل های مدیریتی',
        ],
        'notification' => [
            'title' => 'اطلاع رسانی',
            'report' => ':number گزارش جدید',
            'all' => 'مشاهده همه'
        ],
        'profile' => [
            'title' => 'پروفایل',
            'languages' => 'زبان ها',
            'setting' => 'تنظیمات',
            'logout' => 'خروج',
        ],
    ],

    'mode' => [
        'light' => 'روشن',
        'dark' => 'تاریک',
        'system' => 'سیستم',
    ],

    'show_website' => 'نمایش وب سایت',

    'button' => [
        'operation' => 'عملیات',
        'select_option' => 'یک گزینه انتخاب کنید',
        'save' => 'ذخیره',
        'save_close' => 'ذخیره و بستن',
        'save_new' => 'ذخیره و جدید',
        'cancel' => 'انصراف',
        'add' => 'افزودن',
        'export' => 'خروجی',
        'import' => 'بارگذاری',
        'status' => [
            'enable' => 'فعال',
            'disable' => 'غیر فعال',
        ],
        'block' => 'محروم',
        'unblock' => 'عدم محرومیت',
        'bulk' => 'کار دسته جمعی',
        'bulk_title' => 'کار دسته جمعی',
        'setting' => 'تنظیمات',
        'setting_title' => 'تنظیمات نمایش',
        'help' => 'راهنما',
        'help_title' => 'راهنمای صفحه',

        'delete' => 'حذف',
        'recycle' => 'بازیافت',
        'edit' => 'ویرایش',
        'realized' => 'متوجه شدم',
    ],

    'dashboard' => 'داشبورد',

    'component' => [
        'list_view' => [
            'title' => 'لیست :name',
            'search' => 'جستجو',
            'filter' => 'فیلتر',
            'delete_filters' => 'حذف فیلترها',
        ],
    ],

    'message' => [
        'status' => [
            'enable' => 'تعداد :count مورد فعال شد.',
            'disable' => 'تعداد :count مورد غیر فعال شد.',
        ],
    ],

    'modal' => [
        'import' => [],
        'export' => [
            'title' => 'خروجی فایل',
            'description' => 'لطفا یک فرمت خروجی انتخاب کنید.',
            'submit' => 'خروجی',
            'route_error' => 'مسیر خروجی یافت نشد.',
        ],
        'import_export_options' => [
            'json' => [
                'name' => 'JSON',
                'description' => 'خروجی فایل JSON',
            ],
            'xml' => [
                'name' => 'XML',
                'description' => 'خروجی فایل XML',
            ],
            'excel' => [
                'name' => 'Excel',
                'description' => 'خروجی فایل Excel',
            ],
            'word' => [
                'name' => 'Word',
                'description' => 'خروجی فایل Word',
            ],
            'csv' => [
                'name' => 'CSV',
                'description' => 'خروجی فایل CSV',
            ],
            'pdf' => [
                'name' => 'PDF',
                'description' => 'خروجی فایل PDF',
            ],
        ],
    ],

];
