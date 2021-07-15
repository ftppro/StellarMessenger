<?php
// https://www.tokenup.app/policies_FilesOnStellar.php
// If URL doesn't use "www", or is http: instead of https:, then redirect to https: with "www" URL
$gsHttpOrHttps = isset($_SERVER['HTTPS']) ? "https" : "http";
if (substr($_SERVER['SERVER_NAME'],0,3) != "www") {
	header("Location: https://www." . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']);
	exit;
} else {
	if ($gsHttpOrHttps == "http") {
		header("Location: https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']);
		exit;
	}
}
?>
<html><head><title>TokenUp.app - Terms Of Use</title>
<style>
BODY {color:black;font-family:verdana;font-size:10px}
TD {color:black;font-family:verdana;font-size:10px}

.big_orange {color:#995500;font-size:14px;font-weight:bold}
.green {color:#006400;font-size:12px;font-weight:bold}
.navy {color:navy;font-size:10px;font-weight:bold}
.big_navy {color:navy;font-size:12px;font-weight:bold}

A:link {color:black}
A:visited {color:black}
A:hover {color:red}

A.blue:link {color:blue}
A.blue:visited {color:blue}
A.blue:hover {color:red}
A.teal:link {color:teal}
A.teal:visited {color:teal}
A.teal:hover {color:red}
A.navy:link {color:navy;font-size:10px;font-weight:bold}
A.navy:visited {color:navy;font-size:10px;font-weight:bold}
A.navy:hover {color:red;font-size:10px;font-weight:bold}
A.blue_big:link {color:blue;font-size:12px;font-weight:bold}
A.blue_big:visited {color:blue;font-size:12px;font-weight:bold}
A.blue_big:hover {color:red;font-size:12px;font-weight:bold}

.bigtitle {color:purple;font-weight:bold;font-size:12px}
.bldcell {color:navy;font-size:10px;font-weight:bold}
A.boldlink:link {font-weight:bold;color:blue;font-size:11px}
A.boldlink:visited {font-weight:bold;color:blue;font-size:11px}
A.boldlink:hover {font-weight:bold;color:red;font-size:11px}
A.orange:link {color:#995500;font-size:14px;font-weight:bold}
A.orange:visited {color:#995500;font-size:14px;font-weight:bold}
A.orange:hover {color:red;font-size:14px;font-weight:bold}
.divh {visibility : hidden;}

</style>
</head>
<body topmargin=0 leftmargin=0 marginwidth=0 marginheight=0><form><center>
<table cellspacing=5 cellpadding=0 width=770>
	<tr>
		<td align=center>
			<span class=big_orange>Terms Of Use</span> <font size=2>for</font> <span class=big_navy>TokenUp.app
			<hr>
		</td>
	</tr>
	<tr>
		<td>
<table cellpadding=0 cellspacing=0 border=0>
	<tr>		
		<td>
<style>
	
	.plain, .header, .sub-header{
		font-family: Times New Roman;
		font-size: 14px;
	}
	
	.header{
		font-size: 18px;
		font-weight: 900;
	}
	
	.sub-header{
		font-weight: 900;
	}
</style>

<div class="plain">	
	<p>
		<b>THE FOLLOWING DESCRIBES THE TERMS ON WHICH TokenUp.app OFFERS ACCESS TO OUR SERVICES.</b>
	</p>
	
	<p>
		This is the User Agreement (the "Agreement") for TokenUp.app (the "Site").
		This Agreement describes the terms and conditions applicable to your use of our services available under the 
		domain and sub-domains of the Site and the general principles for the websites of our 
		subsidiaries. We may amend this Agreement at any time by posting the amended terms on the Site.
		This Agreement may not be otherwise amended except in a writing signed by an authorized representative of
		TokenUp.app.
		If you do not agree to be bound by the terms and conditions of this Agreement, 
		do not use or access our services.
	</p>
	
	<p>
		<ol>
			<li>
				<span class="sub-header">Terms of Usage:</span><br>
				<span class="sub-header">1.1 Membership Eligibility:</span> 
				Our services are available only to, and may only be used by individuals who can form legally binding contracts under applicable law. 
				Without limiting the foregoing, our services are not available to children 
				(persons under the age of 18) or to temporarily or indefinitely suspended members.
				If you do not qualify, please do not use the Site. 
				If you are a business entity, you represent that you have the authority to 
				bind the entity to this Agreement.<br>
				<span class="sub-header">1.2 Right To Terminate Usage:</span> 
				TokenUp.app reserves the right to terminate any user's membership and their access to the Site,
				for any reason whatsoever. The following types of content, or links to this type of content,
				are not allowed: Pornography, obscenity, racism, violence, pirated programs,
				or any other illegal activity. You may not submit images or sound files that are protected by another party's copyright.
			</li>

			<li>
				<span class="sub-header">Electronic Communications:</span><br>
				When you visit TokenUp.app or send e-mails to us, you are
				communicating with us electronically. You consent to receive communications
				from us electronically. We will communicate with you by e-mail or by posting
				notices on the Site. You agree that all agreements, notices, disclosures and
				other communications that we provide to you electronically satisfy any legal
				requirement that such communications be in writing. 
			</li>
			<li>
				<span class="sub-header">Disclaimer Of Warranties And Limitation Of Liability:</span><br>
				We, our subsidiaries, officers, directors, employees and our suppliers provide the Site and 
				services "as is" and without any warranty or condition, expressed, implied or statutory. 
				We, our subsidiaries, officers, directors, employees and our suppliers specifically disclaim any 
				implied warranties of title, merchantability, fitness for a particular purpose and non-infringement.
				<br><br>
				The Site allows you to download files that have been uploaded by other users. These files are stored on the blockchain, and not on the Site's server. 
				Therefore, TokenUp.app is not responsible for files that appear on the Site, and the Site does not warrant that those files are safe. 
				It is strongly recommended that you do not download files that may contain viruses, especially files that contain executable code.
				<br><br>
				We make no representations or warranties of any kind, expressed or implied, 
				as to the operation of the Site or the information, content, materials, or products included 
				on the Site. You expressly agree that your use of the Site is at your sole risk. 

				We do not warrant that the Site, its servers, or e-mail sent from us are free of 
				viruses or other harmful components. 
				We will not be liable for any damages of any kind arising from the use of the Site,
				including, but not limited to direct, indirect, incidental, punitive, and consequential damages. 

				In no event shall we, our subsidiaries, officers, directors, employees or our 
				suppliers be liable for lost profits or any special, incidental or consequential damages 
				arising out of or in connection with the Site, our services, or this agreement 
				(however arising, including negligence).
			</li>
			<li>
				<span class="sub-header">Indemnity:</span><br>
				You agree to indemnify and hold us and (as applicable) our parent, subsidiaries, affiliates, officers, 
				directors, agents, and employees, harmless from any claim or demand, including reasonable attorneys' 
				fees, made by any third party due to or arising out of your breach of this Agreement or the 
				documents it incorporates by reference, or your violation of any law or the rights of a third party. 
			</li>
			<li>
				<span class="sub-header">Legal Compliance:</span><br>
				You shall comply with all applicable domestic and international laws, statutes, ordinances and 
				regulations regarding your use of our service. 
			</li>
			<li>
				<span class="sub-header">No Agency:</span><br>
				You and TokenUp.app are independent contractors, and no agency, partnership, joint venture, 
				employee-employer or franchiser-franchisee relationship is intended or created by this Agreement. 
			</li>
			<li>
				<span class="sub-header">Copyrights:</span><br>
				All content included on the Site, such as text, graphics, logos,
				button icons, images, audio clips, digital downloads, data compilations, and
				software, is the property of TokenUp.app or its content suppliers and protected
				by United States and international copyright laws. The compilation of all
				content on the Site is the exclusive property of TokenUp.app and protected by
				U.S. and international copyright laws.
				No part of this program may be copied, reproduced, translated, or reduced to any
				electronic or machine readable form without the prior written consent of TokenUp.app.
				This copyright does not include data that is created or uploaded by a user.  
			</li>
			
			<li>
				<span class="sub-header">Trademarks:</span><br>
				"TokenUp.app" and other marks indicated on the Site are registered trademarks of
				TokenUp.app or its subsidiaries, in the United States and other countries.
				All graphics, logos, page headers, button icons, scripts, and service names appearing on the Site
				are trademarks or trade dress of TokenUp.app or its subsidiaries.
				TokenUp.app's trademarks and trade dress may not be used in connection with any product 
				or service that is not TokenUp.app's, in any manner that is likely to cause confusion among 
				customers, or in any manner that disparages or discredits TokenUp.app.
				All other trademarks not owned by TokenUp.app or its subsidiaries that appear on the Site 
				are the property of their respective owners, who may or may not be affiliated with, connected to, 
				or sponsored by TokenUp.app or its subsidiaries.			
			</li>
			<li>
				<span class="sub-header">Evaluation Version:</span><br>
				A new user may be invited to use an Evaluation Membership, which is only intended to demonstrate
				the features of TokenUp.app.
				The Evaluation Membership may be terminated at any time by TokenUp.app, at which time
				the user will be unable to access their Administration Website.
			</li>

			<li>
				<span class="sub-header">General:</span><br>
				This Agreement shall be governed in all respects by the laws of the State of Tennessee
				as such laws are applied to agreements entered into and to be performed entirely within Tennessee 
				between Tennessee residents. 
				Each party hereby irrevocably consents to the exclusive jurisdiction of the courts of the State of Tennessee
				and the federal courts situated in the State of Tennessee in connection with any action arising 
				between the parties. 
				We do not guarantee continuous, uninterrupted or secure access to our 
				services, and operation of the Site may be interfered with by numerous factors outside of our control.
				If any provision of this Agreement is held to be invalid or unenforceable, such provision shall be 
				struck and the remaining provisions shall be enforced. 
				Headings are for reference purposes only and in no way define, limit, construe or describe the 
				scope or extent of such section. 
				Our failure to act with respect to a breach by you or others 
				does not waive our right to act with respect to subsequent or similar breaches. 
				This Agreement sets forth the entire understanding and agreement between us with respect to 
				the subject matter hereof. 
			</li>
		</ol>
	</p>
</div>
		</td>
	</tr>
</table>

		</td>	
	</tr>
</table></center></form>
	<span class=divh>
<?php include_once '/www/htdocs/hiddenlinks.php';?>
</span>
</body></html>
