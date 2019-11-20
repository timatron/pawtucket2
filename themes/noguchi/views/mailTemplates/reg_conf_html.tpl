<?php
/* ----------------------------------------------------------------------
 * default/views/mailTemplates/reg_conf_html.tpl
 * ----------------------------------------------------------------------
 *
 * Software by Whirl-i-Gig (http://www.whirl-i-gig.com)
 * Copyright 2009-2010 Whirl-i-Gig
 *
 * For more information visit http://www.CollectiveAccess.org
 *
 * This program is free software; you may redistribute it and/or modify it under
 * the terms of the provided license as published by Whirl-i-Gig
 *
 * CollectiveAccess is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTIES whatsoever, including any implied warranty of 
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  
 *
 * This source code is free and modifiable under the terms of 
 * GNU General Public License. (http://www.gnu.org/copyleft/gpl.html). See
 * the "license.txt" file for details, or visit the CollectiveAccess web site at
 * http://www.CollectiveAccess.org
 *
 * ----------------------------------------------------------------------
 */
include("email_header.tpl");

if($this->request->config->get("dont_approve_logins_on_registration")){
	$vs_active_message = _t("<p>Your account will be activated after review.</p>");
}

print _t("<p>Thank you for registering for \"%1\". ".$vs_active_message."</p>

<p>As a registered user you can create your own sets from the collection.</p>

<p>If you wish to download materials, please email <b><a href='mailto:archives@noguchi.org'>archives@noguchi.org</a></b>.</p>


", $this->request->config->get("app_display_name"));

include("email_footer.tpl");

?>