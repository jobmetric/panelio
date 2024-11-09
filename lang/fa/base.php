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
        "panel_not_found" => "پنل ':panel' موجود نیست.",
        "section_in_panel_not_found" => "بخش ':section' در پنل ':panel' موجود نیست.",
        "menu_in_section_panel_not_found" => "منو ':menu_name' در بخش ':section' در پنل ':panel' موجود نیست.",
        "button_not_found" => "دکمه ':button' موجود نیست.",
        "alert_type_not_found" => "نوع هشدار ':type' موجود نیست.",
    ],

    "section" => [
        "dashboard" => [
            "name" => "داشبورد",
            "title" => "گزارشات ویژه",
        ],
        "panels" => [
            "name" => "پنل ها",
            "title" => "پنل های مدیریتی",
        ],
        "notification" => [
            "title" => "اطلاع رسانی",
            "report" => ":number گزارش جدید",
            "all" => "مشاهده همه"
        ],
        "profile" => [
            "title" => "پروفایل",
            "languages" => "زبان ها",
            "setting" => "تنظیمات",
            "logout" => "خروج",
        ],
    ],

    "mode" => [
        "light" => "روشن",
        "dark" => "تاریک",
        "system" => "سیستم",
    ],

    "show_website" => "نمایش وب سایت",

    "button" => [
        "operation" => "عملیات",
        "select_option" => "یک گزینه انتخاب کنید",
        "save" => "ذخیره",
        "save_close" => "ذخیره و بستن",
        "save_new" => "ذخیره و جدید",
        "cancel" => "انصراف",
        "add" => "افزودن",
        "delete" => "حذف",
        "export" => "خروجی",
        "import" => "بارگذاری",
        "status" => [
            "enable" => "فعال",
            "disable" => "غیر فعال",
        ],
        "block" => "محروم",
        "unblock" => "عدم محرومیت",
        "bulk" => "کار دسته جمعی",
        "bulk_title" => "کار دسته جمعی",
        "setting" => "تنظیمات",
        "setting_title" => "تنظیمات نمایش",
        "help" => "راهنما",
        "help_title" => "راهنمای صفحه",

        "recycle" => "بازیافت",
        "edit" => "ویرایش",
        "realized" => "متوجه شدم",

        "are_you_sure" => "آیا مطمئن هستید؟",
        "are_you_sure_to_delete" => "آیا می‌خواهید این اطلاعات را حذف کنید؟ این عملیات قابل برگشت نیست!",
        "yes_deleted" => "بله، حذف شود",
        "it_went_well" => "به خیر گذشت! 😎",
    ],

    "dashboard" => "داشبورد",

    "component" => [
        "list_view" => [
            "title" => "لیست :name",
            "search" => "جستجو",
            "filter" => "فیلتر",
            "delete_filters" => "حذف فیلترها",
        ],
    ],

    "message" => [
        "status" => [
            "enable" => "تعداد :count مورد فعال شد.",
            "disable" => "تعداد :count مورد غیر فعال شد.",
        ],
        "delete" => "تعداد :count مورد حذف شد.",
    ],

    "modal" => [
        "import" => [
            "title" => "بارگذاری داده با فایل",
            "description" => "لطفا فایل خود را انتخاب کنید.",
            "formats" => "فرمت های مجاز: :formats",
            "submit" => "بارگذاری",
            "route_error" => "مسیر ورودی یافت نشد.",
        ],
        "export" => [
            "title" => "خروجی فایل",
            "description" => "لطفا یک فرمت خروجی انتخاب کنید.",
            "submit" => "خروجی",
            "route_error" => "مسیر خروجی یافت نشد.",
        ],
        "import_export_options" => [
            "json" => [
                "name" => "JSON",
                "description" => "خروجی فایل JSON",
            ],
            "xml" => [
                "name" => "XML",
                "description" => "خروجی فایل XML",
            ],
            "excel" => [
                "name" => "Excel",
                "description" => "خروجی فایل Excel",
            ],
            "word" => [
                "name" => "Word",
                "description" => "خروجی فایل Word",
            ],
            "csv" => [
                "name" => "CSV",
                "description" => "خروجی فایل CSV",
            ],
            "pdf" => [
                "name" => "PDF",
                "description" => "خروجی فایل PDF",
            ],
        ],
    ],

];
