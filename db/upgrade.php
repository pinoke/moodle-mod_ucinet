<?php 
function xmldb_ucinet_upgrade($oldversion) {    
	global $CFG;     
	$result = TRUE; 
	   /* if ($oldversion < XXXXXXXXXX) {

        // Define table ucinet to be created.
        $table = new xmldb_table('ucinet');

        // Adding fields to table ucinet.
        $table->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);

        // Adding keys to table ucinet.
        $table->add_key('primary', XMLDB_KEY_PRIMARY, array('id'));

        // Conditionally launch create table for ucinet.
        if (!$dbman->table_exists($table)) {
            $dbman->create_table($table);
        }

        // ucinet savepoint reached.
        upgrade_mod_savepoint(true, XXXXXXXXXX, 'ucinet');
    }
	    if ($oldversion < XXXXXXXXXX) {

        // Define table ucinet to be dropped.
        $table = new xmldb_table('ucinet');

        // Conditionally launch drop table for ucinet.
        if ($dbman->table_exists($table)) {
            $dbman->drop_table($table);
        }

        // ucinet savepoint reached.
        upgrade_mod_savepoint(true, XXXXXXXXXX, 'ucinet');
    }
	    if ($oldversion < XXXXXXXXXX) {

        // Define table ucinet to be renamed to NEWNAMEGOESHERE.
        $table = new xmldb_table('ucinet');

        // Launch rename table for ucinet.
        $dbman->rename_table($table, 'NEWNAMEGOESHERE');

        // ucinet savepoint reached.
        upgrade_mod_savepoint(true, XXXXXXXXXX, 'ucinet');
    }
   */
	return $result;
}
