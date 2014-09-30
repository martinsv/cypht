<?php

if (!defined('DEBUG_MODE')) { die(); }

handler_source('imap');
output_source('imap');

/* add stuff to the home page */
add_handler('home', 'load_imap_servers_from_config', true, 'imap', 'load_user_data', 'after');
add_handler('home', 'add_imap_servers_to_page_data',  true, 'imap', 'load_imap_servers_from_config', 'after');
add_output('home', 'display_imap_status', true, 'imap', 'server_status_start', 'after');
add_output('home', 'imap_server_ids', true, 'imap', 'page_js', 'before');

/* servers page data */
add_handler('servers', 'load_imap_servers_from_config',  true, 'imap', 'load_user_data', 'after');
add_handler('servers', 'process_add_imap_server', true, 'imap', 'load_imap_servers_from_config', 'after');
add_handler('servers', 'add_imap_servers_to_page_data', true, 'imap', 'process_add_imap_server', 'after');
add_handler('servers', 'save_imap_servers',  true, 'imap', 'add_imap_servers_to_page_data', 'after');
add_output('servers', 'add_imap_server_dialog', true, 'imap', 'content_section_start', 'after');
add_output('servers', 'display_configured_imap_servers', true, 'imap', 'add_imap_server_dialog', 'after');
add_output('servers', 'imap_server_ids', true, 'imap', 'page_js', 'before');

/* settings page data */
add_handler('settings', 'load_imap_servers_from_config',  true, 'imap', 'load_user_data', 'after');
add_handler('settings', 'add_imap_servers_to_page_data', true, 'imap', 'load_imap_servers_from_config', 'after');
add_output('settings', 'imap_server_ids', true, 'imap', 'page_js', 'before');

/* compose page data */
add_handler('compose', 'load_imap_servers_from_config',  true, 'imap', 'load_user_data', 'after');
add_handler('compose', 'add_imap_servers_to_page_data', true, 'imap', 'load_imap_servers_from_config', 'after');
add_handler('compose', 'imap_process_reply_fields', true, 'imap', 'add_imap_servers_to_page_data', 'after');
add_output('compose', 'imap_server_ids', true, 'imap', 'page_js', 'before');
add_output('compose', 'imap_reply_details', true, 'imap', 'page_js', 'before');

/* search page data */
add_handler('search', 'load_imap_servers_from_config',  true, 'imap', 'load_user_data', 'after');
add_handler('search', 'imap_message_list_type', true, 'imap', 'message_list_type', 'after');
add_handler('search', 'add_imap_servers_to_page_data', true, 'imap', 'load_imap_servers_from_config', 'after');
add_output('search', 'imap_server_ids', true, 'imap', 'page_js', 'before');

/* message list pages */
add_handler('message_list', 'load_imap_servers_from_config', true, 'imap', 'load_user_data', 'after');
add_handler('message_list', 'imap_bust_cache',  true, 'imap', 'load_imap_servers_from_config', 'after');
add_handler('message_list', 'imap_message_list_type', true, 'imap', 'message_list_type', 'after');
add_handler('message_list', 'add_imap_servers_to_page_data',  true, 'imap', 'imap_bust_cache', 'after');
add_output('message_list', 'imap_server_ids', true, 'imap', 'page_js', 'before');

/* message view page */
add_handler('message', 'load_imap_servers_from_config', true, 'imap', 'load_user_data', 'after');
add_handler('message', 'imap_message_list_type', true, 'imap', 'message_list_type', 'after');
add_handler('message', 'add_imap_servers_to_page_data',  true, 'imap', 'load_imap_servers_from_config', 'after');
add_output('message', 'imap_server_ids', true, 'imap', 'page_js', 'before');

/* page not found */
add_handler('notfound', 'load_imap_servers_from_config', true, 'imap', 'load_user_data', 'after');
add_handler('notfound', 'add_imap_servers_to_page_data',  true, 'imap', 'load_imap_servers_from_config', 'after');
add_output('notfound', 'imap_message_list', true, 'imap', 'folder_list_end', 'before');
add_output('notfound', 'imap_server_ids', true, 'imap', 'page_js', 'before');

/* folder list */
add_handler('ajax_hm_folders', 'load_imap_servers_from_config',  true, 'imap', 'load_user_data', 'after');
add_handler('ajax_hm_folders', 'load_imap_folders',  true, 'imap', 'load_imap_servers_from_config', 'after');
add_handler('ajax_hm_folders', 'add_imap_servers_to_page_data',  true, 'imap', 'load_imap_servers_from_config', 'after');
add_output('ajax_hm_folders', 'filter_imap_folders',  true, 'imap', 'folder_list_content_start', 'before');

/* ajax server setup callback data */
add_handler('ajax_imap_debug', 'login', false, 'core');
add_handler('ajax_imap_debug', 'load_user_data',  true, 'core');
add_handler('ajax_imap_debug', 'load_imap_servers_from_config',  true);
add_handler('ajax_imap_debug', 'imap_connect', true);
add_handler('ajax_imap_debug', 'imap_delete', true);
add_handler('ajax_imap_debug', 'imap_forget', true);
add_handler('ajax_imap_debug', 'imap_save', true);
add_handler('ajax_imap_debug', 'save_imap_cache',  true);
add_handler('ajax_imap_debug', 'save_imap_servers',  true);
add_handler('ajax_imap_debug', 'save_user_data',  true, 'core');
add_handler('ajax_imap_debug', 'date', true, 'core');

/* ajax message content */
add_handler('ajax_imap_message_content', 'login', false, 'core');
add_handler('ajax_imap_message_content', 'load_user_data', true, 'core');
add_handler('ajax_imap_message_content', 'load_imap_servers_from_config',  true);
add_handler('ajax_imap_message_content', 'imap_message_content',  true);
add_handler('ajax_imap_message_content', 'save_imap_cache',  true);
add_handler('ajax_imap_message_content', 'save_imap_servers',  true);
add_handler('ajax_imap_message_content', 'date', true, 'core');
add_output('ajax_imap_message_content', 'filter_reply_content', true);
add_output('ajax_imap_message_content', 'filter_message_headers', true);
add_output('ajax_imap_message_content', 'filter_message_body', true);
add_output('ajax_imap_message_content', 'filter_message_struct', true);

/* ajax unread callback data */
add_handler('ajax_imap_unread', 'login', false, 'core');
add_handler('ajax_imap_unread', 'load_user_data', true, 'core');
add_handler('ajax_imap_unread', 'message_list_type', true, 'core');
add_handler('ajax_imap_unread', 'imap_message_list_type', true);
add_handler('ajax_imap_unread', 'load_imap_servers_from_config',  true);
add_handler('ajax_imap_unread', 'imap_unread',  true);
add_handler('ajax_imap_unread', 'save_imap_cache',  true);
add_handler('ajax_imap_unread', 'save_imap_servers',  true);
add_handler('ajax_imap_unread', 'save_user_data',  true, 'core');
add_handler('ajax_imap_unread', 'date', true, 'core');
add_output('ajax_imap_unread', 'filter_unread_data', true);

/* ajax status callback data */
add_handler('ajax_imap_status', 'login', false, 'core');
add_handler('ajax_imap_status', 'load_user_data', true, 'core');
add_handler('ajax_imap_status', 'load_imap_servers_from_config',  true);
add_handler('ajax_imap_status', 'imap_status',  true);
add_handler('ajax_imap_status', 'save_imap_cache',  true);
add_handler('ajax_imap_status', 'save_imap_servers',  true);
add_handler('ajax_imap_status', 'save_user_data',  true, 'core');
add_handler('ajax_imap_status', 'date', true, 'core');
add_output('ajax_imap_status', 'filter_imap_status_data', true);

/* ajax flagged callback data */
add_handler('ajax_imap_flagged', 'login', false, 'core');
add_handler('ajax_imap_flagged', 'load_user_data', true, 'core');
add_handler('ajax_imap_flagged', 'message_list_type', true, 'core');
add_handler('ajax_imap_flagged', 'imap_message_list_type', true);
add_handler('ajax_imap_flagged', 'load_imap_servers_from_config',  true);
add_handler('ajax_imap_flagged', 'imap_flagged',  true);
add_handler('ajax_imap_flagged', 'save_imap_cache',  true);
add_handler('ajax_imap_flagged', 'save_imap_servers',  true);
add_handler('ajax_imap_flagged', 'date', true, 'core');
add_output('ajax_imap_flagged', 'filter_flagged_data', true);

/* ajax message action callback */
add_handler('ajax_message_action', 'load_imap_servers_from_config',  true, 'imap', 'load_user_data', 'after');
add_handler('ajax_message_action', 'imap_message_action', true, 'imap', 'load_imap_servers_from_config', 'after');
add_handler('ajax_message_action', 'save_imap_cache',  true, 'imap', 'imap_message_action', 'after');
add_handler('ajax_message_action', 'save_imap_servers',  true, 'imap', 'save_imap_cache', 'after');

/* expand folder */
add_handler('ajax_imap_folder_expand', 'login', false, 'core');
add_handler('ajax_imap_folder_expand', 'load_user_data', true, 'core');
add_handler('ajax_imap_folder_expand', 'load_imap_servers_from_config',  true);
add_handler('ajax_imap_folder_expand', 'imap_folder_expand',  true);
add_handler('ajax_imap_folder_expand', 'save_imap_cache',  true);
add_handler('ajax_imap_folder_expand', 'save_imap_servers',  true);
add_handler('ajax_imap_folder_expand', 'date', true, 'core');
add_output('ajax_imap_folder_expand', 'filter_expanded_folder_data', true);

/* select folder */
add_handler('ajax_imap_folder_display', 'login', false, 'core');
add_handler('ajax_imap_folder_display', 'load_user_data', true, 'core');
add_handler('ajax_imap_folder_display', 'message_list_type', true, 'core');
add_handler('ajax_imap_folder_display', 'imap_message_list_type', true);
add_handler('ajax_imap_folder_display', 'load_imap_servers_from_config',  true);
add_handler('ajax_imap_folder_display', 'imap_folder_page',  true);
add_handler('ajax_imap_folder_display', 'save_imap_cache',  true);
add_handler('ajax_imap_folder_display', 'save_imap_servers',  true);
add_handler('ajax_imap_folder_display', 'date', true, 'core');
add_output('ajax_imap_folder_display', 'filter_folder_page', true);

/* search results */
add_handler('ajax_imap_search', 'login', false, 'core');
add_handler('ajax_imap_search', 'load_user_data', true, 'core');
add_handler('ajax_imap_search', 'message_list_type', true, 'core');
add_handler('ajax_imap_search', 'imap_message_list_type', true);
add_handler('ajax_imap_search', 'load_imap_servers_from_config',  true);
add_handler('ajax_imap_search', 'imap_search',  true);
add_handler('ajax_imap_search', 'save_imap_cache',  true);
add_handler('ajax_imap_search', 'save_imap_servers',  true);
add_handler('ajax_imap_search', 'date', true, 'core');
add_output('ajax_imap_search', 'filter_imap_search', true);

/* combined inbox */
add_handler('ajax_imap_combined_inbox', 'login', false, 'core');
add_handler('ajax_imap_combined_inbox', 'load_user_data', true, 'core');
add_handler('ajax_imap_combined_inbox', 'message_list_type', true, 'core');
add_handler('ajax_imap_combined_inbox', 'imap_message_list_type', true);
add_handler('ajax_imap_combined_inbox', 'load_imap_servers_from_config',  true);
add_handler('ajax_imap_combined_inbox', 'imap_combined_inbox',  true);
add_handler('ajax_imap_combined_inbox', 'save_imap_cache',  true);
add_handler('ajax_imap_combined_inbox', 'save_imap_servers',  true);
add_handler('ajax_imap_combined_inbox', 'date', true, 'core');
add_output('ajax_imap_combined_inbox', 'filter_combined_inbox', true);

/* allowed input */
return array(
    'allowed_pages' => array(
        'ajax_imap_debug',
        'ajax_imap_status',
        'ajax_imap_unread',
        'ajax_imap_flagged',
        'ajax_imap_folder_expand',
        'ajax_imap_folder_display',
        'ajax_imap_combined_inbox',
        'ajax_imap_search',
        'ajax_unread_count',
        'ajax_imap_message_content',
        'ajax_imap_save_folder_state',
        'ajax_imap_message_action'
    ),

    'allowed_get' => array(
        'imap_server_id' => FILTER_VALIDATE_INT,
    ),

    'allowed_post' => array(
        'server_port' => FILTER_VALIDATE_INT,
        'server' => FILTER_SANITIZE_STRING,
        'username' => FILTER_SANITIZE_STRING,
        'password' => FILTER_SANITIZE_STRING,
        'imap_server_id' => FILTER_VALIDATE_INT,
        'imap_server_ids' => FILTER_SANITIZE_STRING,
        'imap_user' => FILTER_SANITIZE_STRING,
        'imap_pass' => FILTER_SANITIZE_STRING,
        'imap_delete' => FILTER_SANITIZE_STRING,
        'imap_connect' => FILTER_SANITIZE_STRING,
        'imap_remember' => FILTER_VALIDATE_INT,
        'imap_folder_ids' => FILTER_SANITIZE_STRING,
        'imap_forget' => FILTER_SANITIZE_STRING,
        'imap_save' => FILTER_SANITIZE_STRING,
        'submit_imap_server' => FILTER_SANITIZE_STRING,
        'new_imap_address' => FILTER_SANITIZE_STRING,
        'new_imap_port' => FILTER_VALIDATE_INT,
        'new_imap_name' => FILTER_SANITIZE_STRING,
        'tls' => FILTER_VALIDATE_BOOLEAN,
        'folder' => FILTER_SANITIZE_STRING,
        'force_update' => FILTER_VALIDATE_BOOLEAN,
        'formatted_unread_data' => FILTER_UNSAFE_RAW,
        'formatted_combined_inbox' => FILTER_UNSAFE_RAW,
        'formatted_flagged_data' => FILTER_UNSAFE_RAW,
        'imap_folder_state' => FILTER_UNSAFE_RAW,
        'imap_msg_uid' => FILTER_VALIDATE_INT,
        'imap_msg_part' => FILTER_SANITIZE_STRING,
    )
);

?>
