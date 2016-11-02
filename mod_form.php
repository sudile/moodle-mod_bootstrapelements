<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Version details
 *
 * @package    mod
 * @subpackage bootstrap
 * @copyright  2014 Birmingham City University <michael.grant@bcu.ac.uk>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 *
 */

defined('MOODLE_INTERNAL') || die;

require_once($CFG->dirroot.'/course/moodleform_mod.php');

class mod_bootstrapelements_mod_form extends moodleform_mod {

    function definition() {
        GLOBAL $CFG;
        
        $mform = $this->_form;

        $mform->addElement('header', 'generalhdr', get_string('general'));

        $mform->addElement('text', 'title', get_string('formtitle', 'mod_bootstrapelements'));
        $mform->setType('title', PARAM_RAW);
        $mform->addRule('title', null, 'required', null, 'client');

        $this->add_intro_editor(true, get_string('formcontent', 'mod_bootstrapelements'));

        $mform->addElement('select', 'bootstraptype', get_string('bootstraptype', 'mod_bootstrapelements'), array(0 => get_string('modal', 'mod_bootstrapelements'), 1 => get_string('toggle', 'mod_bootstrapelements'), 2 => get_string('enhancedlabel', 'mod_bootstrapelements'), 3 => get_string('blockquote', 'mod_bootstrapelements')));
        
        $mform->addElement('text', 'bootstrapicon', get_string('bootstrapicon', 'mod_bootstrapelements'));
        $mform->setType('bootstrapicon', PARAM_TEXT);
                
        $form_html = '<link href="'.$CFG->wwwroot.'/mod/bootstrapelements/css/fontawesome-iconpicker.min.css" rel="stylesheet" type="text/css">';
        $form_html .= '<script type="text/javascript" src="'.$CFG->wwwroot.'/mod/bootstrapelements/js/fontawesome-iconpicker.min.js"></script>';
        $form_html .= '<script type="text/javascript">$(function(){ $("#id_bootstrapicon").iconpicker({placement: "right", selectedCustomClass: "label label-success"}); });</script>';
           
        $mform->addElement('html', $form_html);
        $this->standard_coursemodule_elements();
        $this->add_action_buttons(true, false, null);

    }

}
