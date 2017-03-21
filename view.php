<?php
/**
 * Prints a particular instance of ucinet
 *
 * You can have a rather longer description of the file as well,
 * if you like, and it can span multiple lines.
 *
 * @package    mod
 * @subpackage ucinet
 * @copyright  2014 Sun Yu
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once("../../config.php");
require_once("lib.php");
require_once("locallib.php");

$id = optional_param('id', 0, PARAM_INT);  //course_module ID, or
$n  = optional_param('n', 0, PARAM_INT);  // ucinet instance ID - it should be named as the first character of the module

if ($id) {
    $cm         = get_coursemodule_from_id('ucinet', $id, 0, false, MUST_EXIST);
    $course     = $DB->get_record('course', array('id' => $cm->course), '*', MUST_EXIST);
    $ucinet  = $DB->get_record('ucinet', array('id' => $cm->instance), '*', MUST_EXIST);
} elseif ($n) {
    $ucinet  = $DB->get_record('ucinet', array('id' => $n), '*', MUST_EXIST);
    $course     = $DB->get_record('course', array('id' => $ucinet->course), '*', MUST_EXIST);
    $cm         = get_coursemodule_from_instance('ucinet', $ucinet->id, $course->id, false, MUST_EXIST);
} else {
    error('You must specify a course_module ID or an instance ID');
}

require_login($course, true, $cm);
$context = get_context_instance(CONTEXT_MODULE, $cm->id);

add_to_log($course->id, 'ucinet', 'view', "view.php?id={$cm->id}", $ucinet->name, $cm->id);

/// Print the page header

$PAGE->set_url('/mod/ucinet/view.php', array('id' => $cm->id));
$PAGE->set_title(format_string($ucinet->name));
$PAGE->set_heading(format_string($course->fullname));
$PAGE->set_context($context);

// other things you may want to set - remove if not needed
//$PAGE->set_cacheable(false);
//$PAGE->set_focuscontrol('some-html-id');
//$PAGE->add_body_class('ucinet-'.$somevar);

// Output starts here
echo $OUTPUT->header();

if ($ucinet->intro) { // Conditions to show the intro can change to look for own settings or whatever
    echo $OUTPUT->box(format_module_intro('ucinet', $ucinet, $cm->id), 'generalbox mod_introbox', 'ucinetintro');
}

// Replace the following lines with you own code
echo $OUTPUT->heading(get_string('notice', 'ucinet'));
$courseid=$course->id;

$nodeurl =$CFG->wwwroot.'/mod/ucinet/edgeoutput.php';
echo "<form action='$nodeurl' method='post'>";
echo "<input type='hidden' name='ucinet_Data' value='$courseid'>";
echo "<input type='submit'  value='Export ucinet Nodes Data' >";
echo "</form>";


// Finish the page
echo $OUTPUT->footer();


