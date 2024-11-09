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
        "panel_not_found" => "Panel ':panel' not found.",
        "section_in_panel_not_found" => "Section ':section' in Panel :panel not found.",
        "menu_in_section_panel_not_found" => "Menu ':menu_name' in Section ':section' in Panel ':panel' not found.",
        "button_not_found" => "Button ':button' not found.",
        "alert_type_not_found" => "Alert type ':type' not found.",
        "deletes_method_not_found_in_controller" => "Method 'deletes' in controller ':class' not found.",
        "change_status_method_not_found_in_controller" => "Method 'changeStatus' in controller ':class' not found.",
    ],

    "section" => [
        "dashboard" => [
            "name" => "Dashboard",
            "title" => "Special Reports",
        ],
        "panels" => [
            "name" => "Panels",
            "title" => "Management Panels",
        ],
        "notification" => [
            "title" => "Notification",
            "report" => ":number new report",
            "all" => "View All"
        ],
        "profile" => [
            "title" => "Profile",
            "languages" => "Languages",
            "setting" => "Setting",
            "logout" => "Logout",
        ],
    ],

    "mode" => [
        "light" => "Light",
        "dark" => "Dark",
        "system" => "System",
    ],

    "show_website" => "Show Website",

    "button" => [
        "operation" => "Operation",
        "select_option" => "Choose an option",
        "save" => "Save",
        "save_close" => "Save & Close",
        "save_new" => "Save & New",
        "cancel" => "Cancel",
        "add" => "Add",
        "delete" => "Delete",
        "export" => "Export",
        "import" => "Import",
        "status" => [
            "enable" => "Enable",
            "disable" => "Disable",
        ],
        "block" => "Block",
        "unblock" => "Unblock",
        "bulk" => "Bulk Action",
        "bulk_title" => "Bulk Actions",
        "setting" => "Setting",
        "setting_title" => "Screen Options",
        "help" => "Help",

        "recycle" => "Recycle",
        "edit" => "Edit",
        "realized" => "Realized",

        "are_you_sure" => "Are you sure?",
        "are_you_sure_to_delete" => "Are you sure you want to delete?",
        "yes_deleted" => "Yes, Delete",
        "it_went_well" => "It went well! 😎",
    ],

    "dashboard" => "Dashboard",

    "component" => [
        "list_view" => [
            "title" => "list :name",
            "search" => "Search",
            "filter" => "Filter",
        ],
    ],

    "message" => [
        "status" => [
            "enable" => "Item :count status changed to active.",
            "disable" => "Item :count status changed to inactive.",
        ],
        "delete" => "Item :count deleted successfully.",
    ],

    "modal" => [
        "import" => [
            "title" => "Import File",
            "description" => "Choose the file format you want to import.",
            "formats" => "Allowed formats: :formats",
            "submit" => "Import",
            "route_error" => "Import route not found.",
        ],
        "export" => [
            "title" => "Export File",
            "description" => "Choose the file format you want to export.",
            "submit" => "Export",
            "route_error" => "Export route not found.",
        ],
        "import_export_options" => [
            "json" => [
                "name" => "JSON",
                "description" => "JavaScript Object Notation",
            ],
            "xml" => [
                "name" => "XML",
                "description" => "Extensible Markup Language",
            ],
            "excel" => [
                "name" => "Excel",
                "description" => "Microsoft Excel",
            ],
            "word" => [
                "name" => "Word",
                "description" => "Microsoft Word",
            ],
            "csv" => [
                "name" => "CSV",
                "description" => "Comma Separated Values",
            ],
            "pdf" => [
                "name" => "PDF",
                "description" => "Portable Document Format",
            ],
        ],
    ],

];
