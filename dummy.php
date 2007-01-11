<?php
require(getcwd() . '/framework.config.php');
require(DEVBLOCKS_PATH . 'Devblocks.class.php');
require(APP_PATH . '/api/Application.class.php');

// Teams
CerberusWorkflowDAO::createTeam('Support');
CerberusWorkflowDAO::createTeam('Sales');
CerberusWorkflowDAO::createTeam('Development');
CerberusWorkflowDAO::createTeam('Marketing');

// Address
$address_id = CerberusContactDAO::createAddress('example.user@cerberusdemo.com');

// Mailboxes
CerberusMailDAO::createMailbox('Trial Keys',$address_id);
CerberusMailDAO::createMailbox('Leads',$address_id);
CerberusMailDAO::createMailbox('Hosting Support',$address_id);
CerberusMailDAO::createMailbox('Bugs',$address_id);
CerberusMailDAO::createMailbox('Wishlist',$address_id);

// POP3 Account
CerberusMailDAO::createPop3Account('Default Test Account','cylon.webgroupmedia.com','pop1','poptester');

// Dashboards
$dashboardId = CerberusDashboardDAO::createDashboard("My Dashboard",1);

// Views
$fields = array(
	'view_columns' => serialize(array(
		't_mask',
		't_status',
		't_priority',
		't_last_wrote',
		't_updated_date'
	))
);

$view_id = CerberusDashboardDAO::createView("My Tickets",$dashboardId);
CerberusDashboardDAO::updateView($view_id,$fields);

$view_id = CerberusDashboardDAO::createView("Suggested Tickets",$dashboardId);
CerberusDashboardDAO::updateView($view_id,$fields);

// Agents
CerberusAgentDAO::createAgent('superuser','superuser',1);

?>