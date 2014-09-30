<?php

if (!defined('DEBUG_MODE')) { die(); }

class Hm_Output_contacts_page_link extends Hm_Output_Module {
    protected function output($input, $format) {
        $res = '<li class="menu_contacts"><a class="unread_link" href="?page=contacts">'.
            '<img class="account_icon" src="'.$this->html_safe(Hm_Image_Sources::$people).'" alt="" width="16" height="16" /> '.$this->trans('Contacts').'</a></li>';
        if ($format == 'HTML5') {
            return $res;
        }
        $input['formatted_folder_list'] .= $res;
        return $input;
    }
}

class Hm_Output_contacts_content extends Hm_Output_Module {
    protected function output($input, $format) {
        return '<div class="contacts_content"><div class="content_title">Contacts</div></div>';
    }
}

?>
