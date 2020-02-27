<?php

include ("../../../inc/includes.php");

$new_project = PluginDuplicataAction::save($_POST);
echo json_encode([
    "new_project_id" => $new_project->getID()
]);

$new_ticket = PluginChildticketmanagerAction::save($_POST);
echo json_encode([
   "new_ticket_id" => $new_ticket->getID()
]);