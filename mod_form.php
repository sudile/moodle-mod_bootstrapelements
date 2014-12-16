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

require_once ($CFG->dirroot.'/course/moodleform_mod.php');

class mod_bootstrap_mod_form extends moodleform_mod {

    function definition() {

        $mform = $this->_form;

        $mform->addElement('header', 'generalhdr', get_string('general'));
        
        $mform->addElement('text', 'title', 'Title');
        $mform->setType('title', PARAM_RAW);
        $mform->addRule('title', null, 'required', null, 'client');
        
        $this->add_intro_editor(true, 'Content');
        
        $mform->addElement('select', 'bootstraptype', 'Element Type', array(0=>'Modal', 1=>'Toggle', 2=>'Enhanced Label'));  
        
        $this->standard_coursemodule_elements();

//-------------------------------------------------------------------------------
// buttons
        $this->add_action_buttons(true, false, null);

    }

}
